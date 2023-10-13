<?php

namespace App\Http\Controllers\backend;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRoleController extends Controller
{
    public function userRole()
    {
        $role=Role::all();
        // dd($role);
        return view('backend.pages.userRole.userRoleTable',compact('role'));
    }
    public function addUserRole()
    {
        return view('backend.pages.userRole.add_role');
    }
    public function storeUserRole(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return to_route('userRole.table');
    }

    public function assignRole(){
        return view('backend.pages.userRole.assign');
    }








}
