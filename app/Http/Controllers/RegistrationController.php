<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function index()
    {
        return view('registration');
    }

    function register(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|max:50|min:10|email',
            'password' => 'required|alpha|min:8|max:20|confirmed',
            'full_name' => 'required|alpha|min:3|max:30',
            'city' => 'min:3|max:20',
            'country' => 'min:3|max:20',
            'company_name' => 'min:3|max:20',
            'phone' => 'required|min:11|max:20',
            'user_name' => 'required',
            'password_confirmation' => 'required',
        ]);

        //$user = '';

        $customer = Customer::where('email', $req->email)
            ->where('password', $req->password)
            ->first();
        
            if(isset($customer)){
                return redirect('/registration')->with('result', 'email or password is wrong');
            }else{
                $customer = new Customer();

                $customer->full_name = $req->full_name;
                $customer->user_name = $req->user_name;
                $customer->email = $req->email;
                $customer->password = $req->password;
                $customer->city = $req->city;
                $customer->phone = $req->phone;
                $customer->country = $req->country;
                $customer->company_name = $req->company_name;
                $customer->user_type = 'active';
                $customer->save();

                $req->session()->flash('msg', 'invaild username or password');
                return redirect('/login')->with('result', 'email or password is wrong');
            }
    }
}
