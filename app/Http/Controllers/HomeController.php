<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $new_products = Product::where('status','1')->orderBy('created_at','desc')->take(4)->get();
        $featured_products = Product::where('status','1')->where('featured','1')->orderBy('created_at','desc')->take(8)->get();
        return view('index',compact('new_products','featured_products'));
    }
}
