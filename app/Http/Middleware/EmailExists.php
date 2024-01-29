<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Members;

class EmailExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $member = Members::where('email', $request->email)
        ->take(1)
        ->get()
        ->toArray();
            
        if(!empty($member)){
            return $next($request);
        } else {
            $newMember = new Members;
            $newMember->email = $request->email;
            $newMember->save();
            return $next($request);
        }
    
    }
}
