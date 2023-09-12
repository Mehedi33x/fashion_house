<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //all-category
    public function allCatgeory()
    {

        $allCategory = Category::all();
        // dd($allCategory);
        return $this->responesewithSuccess($allCategory, 'all-category');
    }

    //single-category
    public function singleCatgeory($id)
    {
        $category = Category::find($id);
        // dd($category);
        if ($category) {
            return $this->responesewithSuccess($category, 'Category found');
        } else {
            return $this->responesewithError('No data found');
        }
    }

    //category-store
    public function createCategory(Request $request)
    {

        // dd($request->all());
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required',

            ]
        );
        dd($validate);


        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => $validate->getMessageBag(),
                'success_code' => 201
            ]);
        }
        $category_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $category_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/category', $category_image);
        }
        // dd($image);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active',
            'image' => $category_image,
        ]);
    }
}
