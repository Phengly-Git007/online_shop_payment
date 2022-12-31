<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $feature_products = Product::where('trending','1')->take(10)->get();
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

    public function viewCategory($slug){

       if(Category::where('slug',$slug)->exists()){
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->where('status','0')->get();
        return view('frontend.product.index',['products'=>$products,'category'=>$category]);
       }
       else{
        return redirect()->back()->with('status','slug does not exist');
       }
    }

    public function productDetails($cate_slug,$pro_slug){
        if(Category::where('slug',$cate_slug)->exists()){
            if(Product::where('slug',$pro_slug)->exists()){
                $products = Product::where('slug',$pro_slug)->first();
                $rating = Rating::where('product_id',$products->id)->get();
                $rating_sum = Rating::where('product_id',$products->id)->sum('star_rating');
                $user_rating = Rating::where('product_id',$products->id)->where('user_id',Auth::id())->first();
                $reviews = Review::where('product_id',$products->id)->get();
                if($rating->count() > 0){
                    $rating_value = $rating_sum / $rating->count();
                }
                else{
                    $rating_value = 0;
                }

                return view('frontend.product.details',[
                    'products' => $products,
                    'rating' => $rating,
                    'rating_value' => $rating_value,
                    'user_rating' => $user_rating,
                    'reviews' => $reviews
                ]);
            }
            else{
                return redirect('/')->with('status','Product not found');
            }
        }
        else{
            return redirect('/')->with('status','Category not found');
        }
    }
}
