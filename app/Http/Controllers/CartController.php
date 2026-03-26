<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderUpdateStatus;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Size;
use App\Models\Color;

class CartController extends Controller
{
   public function addCart(Request $request, Product $product){

    $data = $request->validate([
        'quantity'=>'required|integer|min:1',
           'size_id'  => 'required|exists:sizes,id',
           'color_id'  => 'required|exists:colors,id',
    ]);

    if($data['quantity']>$product->quantity){

    return redirect()->back()->with('error','you can not add cart because stock is not avilable this product');
    }

    $total_cost = $product['cost'] * $data['quantity'];

    $carts = new Cart();
    $carts->user_id = Auth::user()->id;
    $carts->product_id = $product->id;
    $carts->size_id = $data['size_id'];
    $carts->color_id = $data['color_id'];
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
public function purchase(Request $request)
{
    // User को cart fetch
    $carts = Cart::where('user_id', Auth::id())->get();

    foreach ($carts as $cart) {

        // ✅ Load product
        $product = Product::find($cart->product_id);
        if (!$product) {
            return back()->with('error', 'Product not found');
        }

        // ✅ Total product quantity check
        if ($product->quantity < $cart->quantity) {
            return back()->with('error', 'Product stock not available');
        }

        // ✅ Pivot table check (size + color)
        $stockItem = \DB::table('product_size_color')
            ->where('product_id', $cart->product_id)
            ->where('size_id', $cart->size_id)
            ->where('color_id', $cart->color_id)
            ->first();

        if (!$stockItem) {
            return back()->with('error', 'Selected size/color not available');
        }

        if ($stockItem->quantity < $cart->quantity) {
            return back()->with('error', 'Selected stock not sufficient');
        }

        // ✅ Reduce pivot table stock
        \DB::table('product_size_color')
            ->where('product_id', $cart->product_id)
            ->where('size_id', $cart->size_id)
            ->where('color_id', $cart->color_id)
            ->update([
                'quantity' => $stockItem->quantity - $cart->quantity,
            ]);

        // ✅ Reduce total product quantity
        $product->quantity -= $cart->quantity;
        $product->save();

        // ✅ Reduce size-specific quantity (if sizes table has quantity)
        if ($cart->size_id) {
            $size = Size::find($cart->size_id);
            if ($size && $size->quantity >= $cart->quantity) {
                $size->quantity -= $cart->quantity;
                $size->save();
            }
        }

        // ✅ Create order
        $order = new Order();
        $order->user_id = $cart->user_id;
        $order->product_id = $cart->product_id;
        $order->size_id = $cart->size_id;
        $order->color_id = $cart->color_id;
        $order->quantity = $cart->quantity;
        $order->status = 'pending';
        $order->save();

        // ✅ Send email
        Mail::to(Auth::user()->email)->send(new OrderUpdateStatus($order));
    }

    // ✅ Clear cart
    Cart::where('user_id', Auth::id())->delete();

    return back()->with('success', 'Order placed successfully');
}
}
