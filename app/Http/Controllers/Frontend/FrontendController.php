<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $feature_products = Product::where('trending','0')->take(10)->get();
        $trending_categories = Category::where('popular','1')->take(10)->get();
        return view('frontend.index',[
            'feature_products' => $feature_products,
            'trending_categories' => $trending_categories
        ]);
    }

    public function category(){
        $categories = Category::where('status','0')->get();
       return view('frontend.categories',['categories' => $categories]);
    }
}
