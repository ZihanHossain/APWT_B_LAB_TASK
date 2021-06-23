<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $user = User::where('email', $req->email)
            ->where('password', $req->password)
            ->first();
        
            if(isset($user)){
                $req->session()->put('user_name', $user->user_name);
                return redirect('/home');
                if($user->password != $req->password)
                {
                    return redirect('/login')->with('result', 'email or password is wrong');
                }
            }else{
                $req->session()->flash('msg', 'invaild username or password');
                return redirect('/login')->with('result', 'email or password is wrong');
            }
    }
}
