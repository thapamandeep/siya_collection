<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
   public function addCart(Request $request){

    $data = $request->validate([
        'quantity'=>'requird|integer|min:1',
    ]);

    if($data['quantity']>$product->quantity){

    return redirect()->back()->with('error','you can not add cart because stock is not avilable this product');
    }

    $total_cost = $product['cost'] * $data['quantity'];

    $carts = new Cart();
    $carts->user_id = Auth::user()->id;
    $carts->product_id = $product->id;
    $carts->quantity = $data['quantity'];
    $carts->total_cost = $total_cost;

    $carts->save();
    
    return redirect()->back()->with('success','your product has been added in cart');
   }
}
