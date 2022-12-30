<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addRating(Request $request){
         $star_rating = $request->input('product_rating');
         $product_id = $request->input('product_id');
         $product_rating = Product::where('id',$product_id)->where('status','0')->first();
         if($product_rating){
            $verified_purchase = Order::where('orders.user_id',Auth::id())
                        ->join('order_items','orders.id','order_items.order_id')
                        ->where('order_items.product_id',$product_id)->get();
            if($verified_purchase->count() > 0){
                $exist_rating = Rating::where('user_id',Auth::id())->where('product_id',$product_id)->first();
                if($exist_rating){
                    $exist_rating->star_rating = $star_rating;
                    $exist_rating->update();
                }
                else{
                    Rating::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product_id,
                        'star_rating' => $star_rating
                    ]);
                }
               return redirect()->back()->with('status','Thank you for rating.');
            }
            else{
                return redirect()->back()->with('status','Can Not Rating Product Without Purchase...');
            }
         }
         else{
            return redirect()->back()->with('status','The link You Followed Was Broken...');
         }
    }
}
