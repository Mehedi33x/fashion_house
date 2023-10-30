<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\Datatables;
use App\Models\SubCategory;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    //backend
    //product list
    public function product_list()
    {
        return view('backend.pages.product.product_list');
    }
    //yajraTable
    public function product_yajratable()
    {
        dd("hello"); {
            $data = Product::select('id', 'name', 'category_id', 'price', 'stock', 'description', 'status')->get();
            dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    //product add
    public function product_add()
    {
        $category = Category::get();
        // dd($category);
        // $subCat = SubCategory::all()->where('category_id');
        // dd($subCat);
        return view('backend.pages.product.add_product', compact('category',));
    }
    //product store
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

    //single product view
    public function product_view($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.pages.product.view_product', compact('product'));
    }

    //product_delete
    public function product_delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return to_route('product.list');
    }



    //frontend

    //all-products view
    public function allProducts()
    {
        $allProducts = Product::with('catData')->latest()->get();
        return view('frontend.pages.product.all_products', compact('allProducts'));
    }
    //single product view
    public function singleProduct()
    {
        return view('frontend.pages.product.single_product');
    }

    //category wise product view
    public function catProducts($id)
    {
        $product = Product::with('catData')->latest()->where('category_id', $id)->get();
        // $product = Category::with('catProducts')->find($id)->get();

        // dd($product);
        // dd($product->toArray());
        return view('frontend.pages.product.category_wiseProduct', compact('product'));
    }
}
