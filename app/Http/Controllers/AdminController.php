<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(Request $req)
    {
        $value = $req->session()->get('user_name');
        if (isset($value))
        {
            return view('admin');
        }
        else
        {
            return redirect('/login');
        }
        
    }
}
