<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Role;
use App\Models\Hero;

class UserController extends Controller
{

public function front(){

$products = Product::all();
$roles = Role::all();

$heroes = Hero::all();

return view('site.pages.home', compact('heroes','products','roles'));
}

    public function register(){

    $roles = Role::all();

    return view('register.form', compact('roles'));
    }

    public function storeUser(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'address'=>'required|string|max:500',
            'phone_number'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed|min:6',
            'role_id'=> 'required|integer|exists:roles,id',

        ]);

        $newImage ="";

        if($request->hasFile('image')){
            $file = $request->file('image');
            $newImage = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('photos',$newImage,'public');
        }

        $users = new User();
        $users->name = $data['name'];
        $users->image = $newImage;
        $users->address = $data['address'];
        $users->phone_number = $data['phone_number'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['password']);
        $users->role_id = $data['role_id'];

        $users->save();

        return redirect()->back()->with('success','your form has been submitted successfully');
    }

    // -----------------------profile---------------//

    public function profile(){

    return view('site.pages.profile');
    }

    public function detail(Product $product){

    return view('site.pages.detail',compact('product'));
    }

    public function addCart(Request $request){

    $data = $request->validate([
        'quantity'=>'requird|integer|min:1',
    ]);
    
    }
}
