<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category_table
    public function categoryTable()
    {
        $category = Category::paginate(5);
        return view('backend.pages.category.category', compact('category'));
    }
    //category_create_form
    public function categoryAdd()
    {
        return view('backend.pages.category.add_category');
    }
    //category_create
    public function categoryStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $category_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/category', $category_image);
        }
        // dd($image);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active',
            'image' => $category_image,
        ]);
        return to_route('category.table');
    }
    //category_view
    public function categoryView($id)
    {

        $category = Category::findOrFail($id);

        return view('backend.pages.category.view_category', compact('category'));
    }

    //category_delete
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return to_route('category.table');
    }
}
