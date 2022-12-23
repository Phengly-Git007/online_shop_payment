<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::where('trending','0')->take(12)->get();
        return view('frontend.index',['products' => $products]);
    }
}
