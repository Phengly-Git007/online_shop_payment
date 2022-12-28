<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
       return view('frontend.wishlist.index',['wishlists' => $wishlists]);
    }

    public function addProductToWishlist(Request $request){
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Product::find($product_id)){
                $wishlist = new Wishlist();
                $wishlist->product_id = $product_id;
                $wishlist->user_id = Auth::id();
                $wishlist->save();
                return response()->json(['status'=>' Add To Wishlist Successfully']);
            }
            else{
                return response()->json(['status'=>' Product Not Found']);
            }
        }
        else{
            return response()->json(['status'=>"Login to continue..."]);
        }
    }

    public function removeProductFromWishlist(Request $request){
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $wishlist = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status'=>'Item has been deleted']);
            }
        }
        else{
            return response()->json(['status'=>"Login to continue..."]);
        }
    }
}
