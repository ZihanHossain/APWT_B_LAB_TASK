<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function varify(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|max:255|email',
            'password' => 'required|string|min:8|max:20',
        ]);

        //$user = '';

        $Admin = Admin::where('email', $req->email)
            ->where('password', $req->password)
            ->first();
        
            if(isset($Admin)){
                $req->session()->put('user_name', $Admin->user_name);
                $req->session()->put('user_type', $Admin->user_type);
                if($Admin->password != $req->password)
                {
                    return redirect('/login')->with('result', 'email or password is wrong');
                }
                return redirect('/admin');
            }else{
                echo "asd";
                // $req->session()->flash('msg', 'invaild username or password');
                // return redirect('/login')->with('result', 'email or password is wrong');
            }
    }
}
