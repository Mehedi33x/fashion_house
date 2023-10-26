<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    #adminLogin
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

        if (auth('web')->attempt($credentials)) {
            return to_route('dashboard');
        } else {
            return to_route('admin.login');
        }
    }
    #adminLogout
    public function logout()
    {
        auth('customer')->logout();
        Session::flush();
        return to_route('admin.login');
    }



    #customer Login
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
            'password' => 'required|min:4',
        ]);
        // dd($request->all());

        Customer::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => 'customer'
        ]);
        toastr()->success('Registration succesful', 'Success');
        return to_route('web.login');
    }

    public function do_login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:4",
        ]);
        $credentials = $request->except('_token');
        // dd($credentials);
        if (auth()->guard('customer')->attempt($credentials)) {
            // $user = auth()->user();
            // if ($user->role == 'customer')
            {
                toastr()->success('Login successful', 'Success');
                return to_route('homepage');
            }
        } else {
            toastr()->error('Invalid Information', 'Error');
            return to_route('web.login');
        }
    }


    public function do_logout()
    {
        auth()->guard('customer')->logout();
        Session::flush();
        return to_route('homepage');
    }
}
