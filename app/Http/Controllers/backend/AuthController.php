<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function adminLogin()
    {
        return view('backend.pages.auth.login');
    }
    public function checkAdmin(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'email' => 'email',
        //     'password' => 'password',
        // ]);
        // if ($validator->fails()) {
        //     $validator->getMessageBag();
        // }
        // dd($request->all());

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->except('_token');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            return to_route('dashboard');
        } else {
            return to_route('admin.login');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return to_route('admin.login');
    }
}
