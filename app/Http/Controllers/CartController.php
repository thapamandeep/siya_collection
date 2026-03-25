<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderUpdateStatus;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
   public function addCart(Request $request, Product $product){

    $data = $request->validate([
        'quantity'=>'required|integer|min:1',
           'size_id'  => 'required|exists:sizes,id',
    ]);

    if($data['quantity']>$product->quantity){

    return redirect()->back()->with('error','you can not add cart because stock is not avilable this product');
    }

    $total_cost = $product['cost'] * $data['quantity'];

    $carts = new Cart();
    $carts->user_id = Auth::user()->id;
    $carts->product_id = $product->id;
    $carts->size_id = $data['size_id'];
    $carts->quantity = $data['quantity'];
    $carts->total_cost = $total_cost;

    $carts->save();
    
    return redirect()->back()->with('success','your product has been added in cart');
   }

   public function showcart(){

   $carts = Cart::with('product')->where('user_id',Auth::user()->id)->get();

   return view('site.pages.cart-collection', compact('carts'));
   }

   public function deleteCart(Cart $cart){

   $cart->delete();

   return redirect()->back()->with('success','your cart has been delete');
   }

   public function purchase(Request $request,){

   $carts = Cart::where('user_id', Auth::user()->id)->get();

   foreach($carts as $cart){

   $orders = new Order();

   $orders->user_id = $cart->user_id;
   $orders->product_id = $cart->product_id;
   $orders->size_id = $cart->size_id;
   $orders->quantity = $cart->quantity;
   $orders->status = 'pending';

   $orders->save();

   $product = Product::find($cart->product_id);

   if($product){

   if($product->quantity>=$cart->quantity){

   $product->quantity -= $cart->quantity;

   $product->save();
   }else{

   return redirect()->back()->with('error','stock not avilable');
   }
   }

   $cart->delete();

   Mail::to(Auth::user()->email)->send(new OrderUpdateStatus($orders));

   }

   return redirect()->back()->with('success','order placed successfully');
   }
}
