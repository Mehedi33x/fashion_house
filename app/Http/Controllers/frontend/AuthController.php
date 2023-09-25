<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    #customer login
    public function login()
    {
        return view('frontend.pages.auth.login');
    }
    #customer reg
    public function registration()
    {
        return view('frontend.pages.auth.registration');
    }
    ##customer reg
    public function do_registration(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        // dd($request->all());

        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "role"=>'customer'
        ]);

        return to_route('web.login');
    }
}
