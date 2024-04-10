<?php

namespace App\Http\Controllers\backend;

use App\Models\Role;
use App\Models\Deliverman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DelivermanController extends Controller
{
    //table
    public function deliverManTable()
    {
        $deliverMan = Deliverman::paginate(5);
        return view('backend.pages.deliverMan.deliveryMan_list', compact('deliverMan'));
    }

    //deliverman add form
    public function delivermanAdd()
    {
        $roles = Role::whereNot('name', 'admin')->get();
        return view('backend.pages.deliverMan.add_deliverman', compact('roles'));
    }

    //deliverman create
    public function delivermanStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        // dd($request->all());
        Deliverman::create([
            'id_no' => date('dmy') . '-' . Str::random(5),
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'status' => 'active',
        ]);

        return to_route('deliverman.table');
    }
}
