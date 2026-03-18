<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

   if(Auth::user()->role_id = 1){

   return redirect()->route('get.dashboard');
   }
   elseif(Auth::user()->role_id == 2){

   return redirect()->route('get.front');
   }else{
      Session::flash('error','user has not found');
      return redirect()->back();
   }
   }
   else{
      Session::flash('error','incorrect password');

      return redirect()->back();
   }
   }
   }


   
}
