<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use App\Models\Results;

class ResultsController extends Controller
{


    public function showResultForm()
    {
        return view('sendResults');
    }
    public function addResult(Request $request)
    {
        $member = Members::where('email', $request->email)
            ->take(1)
            ->get();
        foreach($member as $m){
            $result = new Results;
            $result->member_id = $m->id;
            $result->milliseconds = $request->milliseconds;
            $result->save();
        }
            

    }

    public function addNewMember(Request $request){
        echo 'addNewMember';
    }
}
