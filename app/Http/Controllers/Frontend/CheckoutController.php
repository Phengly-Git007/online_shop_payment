<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $old_carts = Cart::where('user_id',Auth::id())->get();
        foreach($old_carts as $cart){
            if(!Product::where('id',$cart->product_id)->where('quantity','>=',$cart->quantity)->exists()){
                $removeCart = Cart::where('user_id',Auth::id())->where('product_id',$cart->product_id)->first();
                $removeCart->delete();
            }
        }
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart.checkout',['carts' => $carts]);
    }

    public function placeOrder(Request $request){
       $order = new Order();
       $order->user_id = Auth::id();
       $order->first_name = $request->input('first_name');
       $order->last_name = $request->input('last_name');
       $order->email = $request->input('email');
       $order->phone = $request->input('phone');
       $order->address1 = $request->input('address1');
       $order->address2 = $request->input('address2');
       $order->city = $request->input('city');
       $order->state = $request->input('state');
       $order->country = $request->input('country');
       $order->pincode = $request->input('pincode');
       $order-> tracking_no ='Op Shopping-'.rand(1111,9999);
       $order->payment_mode = $request->input('payment_mode');
       $order->payment_id = $request->input('payment_id');
       // total

       $total_amount = 0;
       $cart_total = Cart::where('user_id',Auth::id())->get();
       foreach($cart_total as $cart){
        $total_amount += $cart->products->cost_of_good * $cart->quantity;
       }
       $order->total = $total_amount ;
       $order->save();

       $carts = Cart::where('user_id',Auth::id())->get();
        foreach($carts as $item){
            OrderItem::create([
                'order_id' =>  $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->products->cost_of_good,
            ]);
            // decrease product quantity from product quantity
            $product = Product::where('id',$item->product_id)->first();
            $product->quantity = $product->quantity - $item->quantity;
            $product->update();
        }
        if(Auth::user()->address1 == null){
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $carts = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($carts);
        if($request->input('payment_mode') == 'Paid By PayPal'){
            return response()->json(['status' => 'Paid Online Successfully']);
        }
        return redirect('/cart')->with('status','Product Order Successfully !');
    }

    public function processRazorCheck(Request $request){
        $carts = Cart::where('user_id',Auth::id())->get();
        $total_price = 0;
        foreach($carts as $cart){
            $total_price += $cart->products->cost_of_good * $cart->quantity ;
        }
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pincode  = $request->input('pincode');

        return response()->json([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'pincode' => $pincode,
            'total_price' => $total_price
        ]);
    }
}
