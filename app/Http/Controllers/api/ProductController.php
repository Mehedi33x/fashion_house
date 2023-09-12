<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    public function allProducts()
    {
        $allProducts = Product::all();
        return $this->responesewithSuccess(ProductResource::collection($allProducts), 'All products');
    }

    //single-Product
    public function singleProduct($id)
    {
        $product = Product::with('catData')->find($id);
        if ($product) {
            return $this->responesewithSuccess(ProductResource::make($product), 'single-product');
        } else {
            return $this->responesewithError('No data found');
        }
    }

    //create Product
    public function createProduct(Request $request)
    {
        // dd($request->all());

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|min:2',
        ]);

        if ($validate->fails()) {
            return $this->responesewithError($validate->getMessageBag());
        }

        $product_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $product_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/product', $product_image);
        }
        $product = Product::create([
            'product_id' => Str::random(10),
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'status' => 'active',
            'image' => $product_image,
        ]);

        return $this->responesewithSuccess($product, 'Product created successfully');
    }

    //edit Product
    public function editProduct(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        if ($product) {
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            return $this->responesewithSuccess($product, 'Data updated successfully');
        }
    }

    //delete Product
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        // dd($product);
        if ($product) {

            $product->delete();
            return $this->responesewithSuccess($product, 'Data deleted successfully');
        } else
            return $this->responesewithError('No data found');
    }
}
