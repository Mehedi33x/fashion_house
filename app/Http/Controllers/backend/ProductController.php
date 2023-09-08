<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    public function product_list()
    {
        $product = Product::with('catData')->paginate(5);
        return view('backend.pages.product.product_list', compact('product'));
    }

    public function product_add()
    {
        $category = Category::get();
        return view('backend.pages.product.add_product', compact('category'));
    }
    public function product_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|min:2',
            // 'image' => 'required',
            // 'description' => 'required',
        ]);

        $product_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $product_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/product', $product_image);
        }

        Product::create([
            'product_id' => Str::random(10),
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'status' => 'active',
            'image' => $product_image,
        ]);
        return to_route('product.list');
    }
}
