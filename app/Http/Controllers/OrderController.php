<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderUpdateStatus;
use App\Models\Order;

class OrderController extends Controller
{
    public function markUserProcessing($orderId){

    $order = Order::with('user','product')->findOrFail($orderId);

    $order->status = 'processing';
    $order->save();

    $user = $order->user ?? Auth::user();

    Mail::to($user->email)->send(new OrderUpdateStatus($order));

    return redirect()->back()->with('success','your order has now processing');
    }

     public function markUserShipping($orderId){

    $order = Order::with('user','product')->findOrFail($orderId);

    $order->status = 'shipping';
    $order->save();

    $user = $order->user ?? Auth::user();

    Mail::to($user->email)->send(new OrderUpdateStatus($order));

    return redirect()->back()->with('success','your order has now shipping');
    
}
 public function markUserDelivered($orderId){

    $order = Order::with('user','product')->findOrFail($orderId);

    $order->status = 'delivered';
    $order->save();

    $user = $order->user ?? Auth::user();

    Mail::to($user->email)->send(new OrderUpdateStatus($order));

    return redirect()->back()->with('success','your order has delivered');
    }
}