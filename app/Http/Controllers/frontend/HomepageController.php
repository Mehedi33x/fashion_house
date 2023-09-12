<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(9)->get();
        // dd($products->toArray());
        return view('frontend.pages.homepage.homepage', compact('products'));
    }
}
