<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customerList()
    {
        $customer = Customer::paginate(5);
        // dd($customer);
        return view('backend.pages.customer.customer_list', compact('customer'));
    }
    public function customerEdit(Request $request,$id)
    {
        $customer=Customer::find($id);
        $request->validate([
            'status'=>'required',
        ]);
        if($customer){
            $customer->update([
                'status'=>$request->status,
            ]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }
}
