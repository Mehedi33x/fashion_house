<?php

namespace App\Http\Controllers\backend;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    public function userRole()
    {
        $role = Role::all();
        // dd($role);
        return view('backend.pages.userRole.userRoleTable', compact('role'));
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

    public function assignRole($id)
    {
        $role = Role::with('permission')->find($id);
        $assignPermission = $role->permission->pluck('permission_id')->toArray();
        // dd($assignPermission);

        $permissions = Permission::all();
        // dd($permissions);
        return view('backend.pages.userRole.assign', compact('permissions', 'role','assignPermission'));
    }
    public function submitRolePermission(Request $request, $role_id)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'permission.*' => 'required',
        ]);
        if ($validate->fails()) {
            $validate->errors();
        }
        // dd($role_id);
        RolePermission::where('role_id', $role_id)->delete();
        foreach ($request->permission as $permission) {
            // dd($permission);
            RolePermission::create([
                'permission_id' => $permission,
                'role_id' => $role_id,
            ]);
        }
        return to_route('userRole.table');
    }
}
