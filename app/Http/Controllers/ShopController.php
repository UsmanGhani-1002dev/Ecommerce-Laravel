<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::where('status','1')->get();
        $brands = Brand::where('status','1')->get();
        $products = Product::where('status','1')->orderBy('created_at','desc')->paginate(12);
        return view('shop.index', compact('products', 'categories', 'brands'));
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $relatedProducts = Product::where('category_id', $product->category_id)
                                    ->where('id','!=', $product->id)
                                    ->where('status', '1')
                                    ->orderBy('created_at','desc')
                                    ->take(6)
                                    ->get();
        return view('shop.details', compact('product','relatedProducts'));
    }
}
