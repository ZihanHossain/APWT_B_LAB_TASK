<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(Request $req)
    {
        $value = $req->session()->get('user_type');
        if ($value == 'admin')
        {
            return view('admin');
        }
        else
        {
            return redirect('/login');
        }
        
    }
}
