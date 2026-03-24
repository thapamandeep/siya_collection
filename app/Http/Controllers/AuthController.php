<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
   public function loginPage(){

   return view('auth.login');
   }

   public function login(Request $request){

    $data = $request->validate([
        'email'=>'required|string|email',
        'password'=>'required|string|min:6',
    ]);

    $user = User::where('email',$data['email'])->first();

    if($user){

        if(Hash::check($data['password'],$user->password)){

            Auth::login($user);

            if(Auth::user()->role_id == 1){
                return redirect()->route('get.dashboard');
            }
            elseif(Auth::user()->role_id == 2){
                return redirect()->route('get.front');
            }
            else{
                Session::flash('error','Invalid role');
                return redirect()->back();
            }

        }else{
            Session::flash('error','Incorrect password');
            return redirect()->back();
        }

    }else{
        Session::flash('error','User not found');
        return redirect()->back();
    }

   }

    public function logOut(){

    Auth::logout();

    return redirect()->route('get.login.page');
    }

    public function forgotPassword(){

    return view('site.pages.forgot-password');
    }

    public function resetPassword(){

    return view('site.pages.reset-password');
    }

    public function newPassword(Request $request){

    $request->validate([
      'email'=>'required|email|exists:users,email',
    ]);

    $otp = rand(100000,999999);

    $user = User::where('email',$request->email)->first();

    $user->otp = $otp;
    $user->save();

    Mail::to($request->email)->send(new SendOtpMail($otp));

    return redirect()->route('get.reset.password')->with('status','otp has send in your mail');
    }

    public function updatePassword(Request $request){

    $data = $request->validate([
      'otp'=>'required',
      'email'=>'required|email',
      'new_password'=>'required',
      'confirm_password'=>'required|same:new_password',
    ]);

    $user = User::where('email',$data['email'])->first();

    if(!$user){

    return back()->with('error','user has not found');
    }elseif($user->otp != $data['otp']){

    return back()->with('error','invalid otp');
    }

    $user->password = Hash::make($data['new_password']);
    $user->otp = "";
    $user->save();

    Session::flash('success','your user account has been updated');

    return redirect()->route('get.login.page');
    }

    public function contactStore(Request $request){

    $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'message'=>'required',
    ]);

    $data = [
        'name' => $request->name,
        'email'=> $request->email,
        'message'=> $request->message,

    ];
    Mail::to('mgrmandeep07@gmail.com')->send(new ContactUs($data));

    return redirect()->back()->with('success','Thank you for contact with us');
    }
}
   

