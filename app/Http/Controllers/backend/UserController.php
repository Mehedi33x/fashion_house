<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userTable()
    {
        $users = User::with('role')->get();
        // dd($users);
        return view('backend.pages.user.userTable',compact('users'));
    }
    public function addUser()
    {
        $roles = Role::all();
        return view('backend.pages.user.addUser', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);
        if ($validate->fails()) {
            $validate->errors();
        }
        User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'status' => "active",
        ]);
        return to_route('user.table');
    }
}
