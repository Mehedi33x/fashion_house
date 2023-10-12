<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandList()
    {
        $brands=Brand::paginate(5);
        return view('backend.pages.brand.brand_list',compact('brands'));
    }
    public function addBrand()
    {
        return view('backend.pages.brand.add_brand');
    }
    public function storeBrand(Request $request){
        // dd($request->toArray());
        $request->validate([
            "name"=>"required",
            "description"=>"required",
        ]);

        Brand::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        toastr()->success('Brand created successfully','Success');
        return to_route('brand.list');
    }
}
