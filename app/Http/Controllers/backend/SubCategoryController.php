<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function ViewSubCat()
    {
        $subCat = SubCategory::with('category')->paginate(5);
        // dd($subCat);
        return view('backend.pages.sub_category.view_subCat', compact('subCat'));
    }

    public function addSubCat()
    {
        $category = Category::all();
        // dd($category);
        return view('backend.pages.sub_category.add_subCat');
    }

    public function storeSubCat(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        // dd($request->all());
        $sub_image = '';
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $sub_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/subCategory', $sub_image);
        }
        SubCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'categories_id' => $request->category_id,
            'status' => 'active',
            'image' => $sub_image
        ]);
        return to_route('subCat.table');
    }
    public function deleteSubCat($id)
    {
        $subCat = SubCategory::find($id);
        // dd($subCat);
        $subCat->delete();
        return to_route('subCat.table');
    }
}
