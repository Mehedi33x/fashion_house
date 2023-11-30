<?php

namespace App\Http\Controllers\backend;

use App\Mail\CustomerVerifyMail;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
            Log::debug('User Login successfull with Email:' . $request->email);
            return to_route('dashboard');
        } else {
            Log::debug('Someone tried to login with Email:' . $request->email);
            return to_route('admin.login');
        }
    }
    #adminLogout
    public function logout()
    {
        auth('customer')->logout();
        return to_route('admin.login');
    }



    #customer Login
    public function login()
    {

        return view('frontend.pages.auth.login');
        // return view('frontend.pages.auth.reset_mail');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        // dd($request->all());

        $token = Str::random(64);
        $link = Route('web.verify.mail', $token);
        // dd($link);
        $customer = Customer::where('email', $request->email)->first();
        // dd($customer);
        if ($customer) {
            Log::debug('User try to registration with same email:' . $request->email);
            toastr()->error('Already have an account');
            return redirect()->back();
        } else {
            Customer::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "role" => 'customer',
                "email_verify_token" => $token,
            ]);
            Mail::to($request->email)->send(new CustomerVerifyMail($link));
            Log::debug('User Registration successful with Email:' . $request->email);
            toastr()->success('Registration succesful', 'Success');
            return to_route('web.login');
        }
    }
    public function verifyMail($token)
    {
        // dd($token);
        $checkVerify = Customer::where('email_verify_token', $token)->first();
        // dd($checkVerify);
        if ($checkVerify->email_verified_at == null) {
            $checkVerify->update([
                'email_verified_at' => now(),
            ]);
            toastr()->success('Email verification successful');
            return to_route('web.login');
        } else {
            toastr()->error('Email verification failed');
            return to_route('homepage');
        }
    }

    public function do_login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:5",
        ]);
        $credentials = $request->except('_token');
        // dd($credentials);
        if (auth()->guard('customer')->attempt($credentials)) {
            // $user = auth()->user();
            // if ($user->role == 'customer')
            if (auth('customer')->user()->email_verified_at != null) {
                if (auth('customer')->user()->status == 'active') {
                    Log::debug('User login with Email:' . $request->email);
                    toastr()->success('Login successful', 'Success');
                    return to_route('homepage');
                } else {
                    auth('customer')->logout();
                    toastr()->error('Your account has been suspended', 'Error');
                    return redirect()->back();
                }
            }
        } else {
            auth('customer')->logout();
            Log::debug('User Login fail with Email:' . $request->email);
            toastr()->error('Email not verified', 'Error');
            return to_route('web.login');
        }
    }

    #customer_logout
    public function do_logout()
    {
        auth()->guard('customer')->logout();
        return to_route('homepage');
    }
    #forget_password
    public function forget_password()
    {
        return view('frontend.pages.auth.forget_password');
    }
    public function reset_link(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'email' => 'reqired|email',
        ]);
        // dd($validate);
        /* if ($validate->fails()) {
            Toastr::error('Error', 'Invalid Credentials');
            // toastr()->error($validate->getMessageBag());
            return redirect()->back();
        } else {
            dd("Hello");
        } */
        #else part
        $customer = Customer::where('email', $request->email)->first();
        // dd($customer);
        if ($customer) {
            $token = Str::random(64);
            $link = route('web.password.mail', $token);
            // dd($link);
            $customer->update([
                'token' => $token,
                'token_expired_at' => Carbon::now()->addMinutes(5),
            ]);
            // dd("email");
            Mail::to($customer->email)->send(new ResetPasswordMail($link));
            toastr()->success("Reset Link sent to your email");
            return redirect()->back();
        } else {
            toastr()->error("No user found by this email");
            return redirect()->back();
        }
    }
    #customer_mail_logic
    public function passwordResetMail($token)
    {
        $customer = Customer::where('token', $token)->whereDate('token_expired_at', '=', now())->whereTime('token_expired_at', '>=', now())->first();
        // dd($customer);
        if ($customer) {
            //    dd("ok");
            return view('frontend.pages.auth.pass_reset_form', compact('token'));
        } else {
            toastr()->error('Token may Invalid or Expired.Please try again.');
            return to_route('web.forget.password');
        }
    }
    public function resetPassword(Request $request, $token)
    {
        // dd($token);
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            #notWrk
            // 'password' => 'required|min:4|confirmed',
            #wrk
            'password' => 'min:4',
            'password_confirmation' => 'required_with:password|same:password',


        ]);
        // dd($validate);
        if ($validate->fails()) {
            toastr()->error($validate->getMessageBag());
            return redirect()->back();
        } else {
            $customer = Customer::where('token', $token)->whereDate('token_expired_at', '=', now())->whereTime('token_expired_at', '>=', now())->first();
            if ($customer) {
                $customer->update([
                    'password' => bcrypt($request->password),
                ]);
            }
            toastr()->success('Password Reset Successfully');
            return to_route('web.login');
        }
    }
    public function profileView()
    {
        return view('frontend.pages.user.user_profile');
    }
    public function profileEdit()
    {
        return view('frontend.pages.user.edit_profile');
    }
    public function profileStore(Request $request, $id)
    {
        $customer = Customer::find($id);
        // dd($customer);
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'address' => 'required',
            'password' => 'required|min:5',
            'confirm_password' => 'required_with:password|same:password',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
        // dd($validate);
        if ($validate->fails()) {
            toastr()->error($validate->getMessageBag());
            return redirect()->back();
        } else {
            $customer_image = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $customer_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('/customer', $customer_image);
            }
            $customer->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                'contact' => $request->contact,
                "address" => $request->address,
                "image" => $customer_image,
                "password" => bcrypt($request->password),
                "role" => 'customer',
                "status" => 'active'
            ]);
            Log::debug('User profile update successful with Email:' . $request->email);
            toastr()->success('Profile Update succesful', 'Success');
            return to_route('web.profile.view');
        }
    }
}
