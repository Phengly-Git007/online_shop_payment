<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProductToCart(Request $reuest){
       $product_id = $reuest->input('product_id');
       $quantity = $reuest->input('quantity');

       if(Auth::check()){
            $product = Product::where('id',$product_id)->first();
            if($product){
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status'=> $product->name.'Already Add To Cart ']);
                }
                else{
                    $carts = new Cart();
                    $carts->user_id = Auth::id();
                    $carts->product_id = $product_id;
                    $carts->quantity = $quantity;
                    $carts->save();
                    return response()->json(['status'=>$product->name.'Add To Cart Successfully']);
                }
            }
       }
       else{
        return response()->json(['status'=>'login to continue...']);
       }
    }
}
