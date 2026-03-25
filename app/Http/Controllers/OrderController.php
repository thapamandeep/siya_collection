<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderUpdateStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;

class OrderController extends Controller
{
    public function markUserProcessing($orderId){

    $order = Order::with('user','product','size')->findOrFail($orderId);

    $order->status = 'processing';
    $order->save();

    $user = $order->user;


        if (!$user) {
            return back()->with('error','User not found for this order');
        }

    Mail::to($user->email)->send(new OrderUpdateStatus($order));

    return redirect()->back()->with('success','your order has now processing');
    }

     public function markUserShipping($orderId){

    $order = Order::with('user','product','size')->findOrFail($orderId);

    $order->status = 'shipping';
    $order->save();

    $user = $order->user;


        if (!$user) {
            return back()->with('error','User not found for this order');
        }

    Mail::to($user->email)->send(new OrderUpdateStatus($order));

    return redirect()->back()->with('success','your order has now shipping');
    
}
 public function markUserDelivered($orderId){

    $order = Order::with('user','product','size')->findOrFail($orderId);

    $order->status = 'delivered';
    $order->save();

    $user = $order->user;


        if (!$user) {
            return back()->with('error','User not found for this order');
        }

    Mail::to($user->email)->send(new OrderUpdateStatus($order));

    return redirect()->back()->with('success','your order has delivered');
    }

    public function myOrder(){

    $orders = Order::where('user_id',Auth::user()->id)->get();

    return view('site.order.my-order',compact('orders'));
    }

    public function review( Product $product){


    return view('site.review.form',compact('product'));
    }

    public function storeReview(Request $request,Product $product){

    $request->validate([
        'rate'=>'required',
        'message'=>'required'
    ]);

    $review = new Review();
    $review->user_id = Auth::user()->id;
    $review->product_id = $product->id;
    $review->rate = $request['rate'];
    $review->message = $request['message'];

    $review->save();

    return redirect()->back()->with('success','your product review has been added');

    }
}