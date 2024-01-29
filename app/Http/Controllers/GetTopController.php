<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use App\Models\Results;

class GetTopController extends Controller
{


    public function showForm()
    {
        return view('getResults');
    }
    public function getResults(Request $request)
    {
        
        $data = [];
        $results = Results::selectRaw("MIN(milliseconds) as milliseconds, member_id, email")
            ->take(10)
            ->groupByRaw('member_id')
            ->join('members', 'members.id', '=', 'results.member_id')
            ->orderByRaw('milliseconds')
            ->get()
            ->toArray();

            $top = [];
            $place = 0;
            foreach ($results as $result){
                $top[]['email'] = preg_replace('/^(..).*(........)$/u', '$1****$2', $result['email']) ;
                $top[]['place'] = $place ;
                $place ++;
                $top[]['milliseconds'] = $result['milliseconds']; 
            }
            $data[]['top'] = $top;
            $self = [];
            
            if(!empty($request->email)){
                
                $resSelf = Results::orderBy('milliseconds', 'ASC')
                    ->where('members.email', '=', $request->email)
                    ->rightJoin('members', 'members.id', '=', 'results.member_id')
                    ->first()
                    ->toArray();

                $resPlace = Results::select('member_id')
                    ->orderBy('milliseconds', 'ASC')
                    ->where('milliseconds', '<=', $resSelf['milliseconds'])
                    ->count('member_id');
  
                $self[]['email'] = $resSelf['email'];
                $self[]['place'] = $resPlace;
                $self[]['milliseconds'] = $resSelf['milliseconds'];
                $data[]['self'] = $self;
            }
            return response()->json([ 'data' => $data ]);

            
    }
}
