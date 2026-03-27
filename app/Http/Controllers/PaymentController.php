<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class PaymentController extends Controller
{
    public function index(){

    $carts = Cart::where('user_id',Auth::user()->id)->get();

    return view('site.payment.index',compact('carts'));
    }

    public function initiate(Request $request){

    if(Auth::check()){
    

    $method = $request->method;

    if($method == 'esewa'){

    return redirect()->away("https://esewa.com.np");
    }
    elseif($method == 'khalti'){

    return redirect()->away("https://khalti.com");
    }
    elseif($method == 'fonepay'){

    return redirect()->away("https://fonepay.com");
    }

    return redirect()->back()->with('error', 'Invalid payment method');
    
    }else{
          return redirect()->route('get.login.page')->with('error', 'Please login to proceed with payment');
    }
    }
}
