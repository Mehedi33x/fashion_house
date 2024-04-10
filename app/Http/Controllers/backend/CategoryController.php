<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //category_table
    public function categoryTable()
    {
        $category = Category::latest()->paginate(5);
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
    public function categoryEdit($id)
    {
        $category = Category::find($id);
        if ($category) {
            return view('backend.pages.category.category_edit', compact('category'));
        }
    }

    function categoryUpdate(Request $request, $id)
    {
        $validData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validData) {
            $category = Category::find($id);
            if ($category) {

                $category_image = $category->image;
                if ($request->hasFile('image')) {
                    if (file_exists(public_path('uploads/mechanics/' . $category_image))) {
                        // Log::useFiles('path', 'level');
                        // File::delete($oldimage);
                        File::delete(public_path('uploads/mechanics/' . $category_image));
                        $image = $request->file('image');
                        $category_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('/category', $category_image);
                    }
                }
                $category->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status,
                    'image' => $category_image
                ]);
                return to_route('category.table');
            }
        }
    }
    //category_delete
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return to_route('category.table');
    }
}
