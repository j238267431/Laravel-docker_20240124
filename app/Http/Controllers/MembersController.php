<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;
class MembersController extends Controller
{
    public function index()
    {
        // echo 1;
        $members = Members::all();
        return view('welcome', ['members' => $members]);
    }
}
