<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(9)->get();
        // dd($products->toArray());
        return view('frontend.pages.homepage.homepage', compact('products'));
    }
    public function language($lang)
    {
        // dd($lang);
        App::setLocale($lang);
        session()->put('locale', $lang);
        return to_route('homepage');
    }
}
