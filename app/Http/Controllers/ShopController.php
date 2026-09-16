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
}
