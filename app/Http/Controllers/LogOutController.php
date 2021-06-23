<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogOutController extends Controller
{
    function index(Request $req)
    {
        $req->session()->flush();
        return redirect('/login'); 
    }
}
