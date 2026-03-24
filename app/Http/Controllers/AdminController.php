<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\Hero;
use \App\Models\Order;
use \App\Models\About;

class AdminController extends Controller
{
    public function dasboard(){

    return view('admin.pages.home');
    }

    // =================category====================//

    public function addCategory(){

    return view('admin.category.form');
    }

    public function storeCategory(Request $request){
   
    $data = $request->validate([
    'name'  => 'required|string|max:255', // category name
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', 

    ]);

    $newImage = "";

    if($request->hasFile('image')){
        $file = $request->file('image');
        $newImage = time(). '.'.$file->getClientOriginalExtension();
        $file->storeAs('album', $newImage,'public');
    }

    $category = new Category();
    $category->name = $data['name'];
    $category->image = $newImage;

    $category->save();

    return redirect()->back()->with('success','your category has been add successfully.');
    }

    public function categoryTable(){

    $categories = Category::all();

    return view('admin.category.index', compact('categories'));
    }

    // ------------Product-----------------//

 
   

    public function addProduct(){

    $categories = Category::all();
    return view('admin.product.form',compact('categories'));
    }

   public function storeProduct(Request $request){

   $data = $request->validate([
    'name'=>'required|string|max:20',
    'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    'description'=>'required|string|max:2048',
    'quantity'=>'required|integer|min:1',
    'cost'=>'required|integer',
    'category_id'=>'required|exists:categories,id',
   
   ]);

   $total_cost = $data['quantity'] * $data['cost'];

   $newImage = "";
   if($request->hasFile('image')){
    $file = $request->file('image');
    $newImage = time(). '.'.$file->getClientOriginalExtension();
    $file->storeAs('album',$newImage,'public');
   }

   $products = new Product();
   $products->name = $data['name'];
   $products->image = $newImage;
   $products->description = $data['description'];
   $products->quantity = $data['quantity'];
   $products->cost = $data['cost'];
   $products->total_cost = $total_cost;
   $products->category_id = $data['category_id'];  

   $products->save();

   return redirect()->back()->with('success','your product has been saved successfully');
   }

   public function productIndex(){

   $products = Product::all();

   return view('admin.product.index',compact('products'));
   }

   public function editProduct(Product $product){

   $categories = Category::all();

   return view('admin.product.edit',compact('product','categories'));
   }

   public function updateProduct(Request $request,Product $product){

   $data = $request->validate([
      'name'=>'nullable|string|max:20',
    'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    'description'=>'nullable|string|max:2048',
    'quantity'=>'nullable|integer|min:1',
    'cost'=>'nullable|integer',
    'category_id'=>'nullable|exists:categories,id',
   
   ]);

    $product->name = $data['name'];
    $product->description = $data['description'];
    $product->quantity = $data['quantity'];
    $product->cost = $data['cost'];
    $product->category_id = $data['category_id'];

   if($request->hasFile('image')){

   $file = $request->file('image');
   $newImage = time().'.'.$file->getClientOriginalExtension();
   $file->storeAs('album',$newImage,'public');

   $product->image = $newImage;

   }

   $product->save();

   return redirect()->back()->with('success','your product has been updated successfully');
 
   }
   public function productDelete(Product $product){

   $product->delete();

   return redirect()->back()->with('success','product has been delete');
   }

    // ======================hero section======================//

   public function hero(){

   return view('admin.hero.form');
   }

   public function storeHeroes(Request $request){

   $data = $request->validate([
    'title'=>'required|string|max:255',
    'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp|max:8000',
    'message'=>'required|string|max:2055',
    'discount'=>'nullable|string|max:255',
    'old_image'=>'required',
   ]);

   $newImage = "";
   
   if($request->hasFile('image')){

   $file = $request->file('image');
   $newImage = time().'.'.$file->getClientOriginalExtension();
   $file->storeAs('album',$newImage,'public');
   }

   $heroes = new Hero();
   $heroes->title = $data['title'];
   $heroes->image = $newImage;
   $heroes->message = $data['message'];
   $heroes->discount = $data['discount'];

   $heroes->save();

   return redirect()->back()->with('success','your heroes data has been saved.');

   }

   public function heroTable(){

   $heroes = Hero::all();

   return view('admin.hero.index', compact('heroes'));

   }

   public function editHero(Hero $hero){

   return view('admin.hero.edit', compact('hero'));
   }

 public function updateHero(Request $request, Hero $hero){
    $data = $request->validate([
        'title'=>'required|string|max:255',
        'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:8000',
        'message'=>'required|string|max:2055',
        'discount'=>'nullable|string|max:255',
        'old_image'=>'required',
    ]);

    $hero->title = $data['title'];
    $hero->message = $data['message'];
    $hero->discount = $data['discount'];

    if($request->hasFile('image')){
        $file = $request->file('image');
        $newImage = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('album', $newImage, 'public');
        $hero->image = $newImage;
    } else {
        $hero->image = $data['old_image'];
    }

    $hero->save();  // <-- save always
    return redirect()->back()->with('success','Your hero has been updated successfully');
}

// ----------------------order------------------------//

public function orderIndex(){

 $orders = Order::with('user')->get();

return view('admin.order.index', compact('orders'));
}

public function aboutForm(){

return view('admin.aboutUs.form');
}

public function storeAbout(Request $request){

$data = $request->validate([
    'title'=>'required',
    'description'=>'required|string|max:2055',
    'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:8000',
]);
$newImage = "";

if($request->hasFile('image')){
    
$file = $request->file('image');
$newImage = time().'.'.$file->getClientOriginalExtension();
$file->storeAs('photos',$newImage,'public');
}

$abouts = new About();
$abouts->title = $data['title'];
$abouts->description = $data['description'];
$abouts->image = $newImage;

$abouts->save();

return redirect()->back()->with('success','about data has been saved');
}

public function indexAbout(){
  
$abouts = About::all();

return view('admin.aboutUs.index',compact('abouts'));
}

public function editAbout(About $about){

return view('admin.aboutUs.edit',compact('about'));
}

public function updateAbout(Request $request,About $about){

$data = $request->validate([
    'title'=>'nullable|string|max:255',
    'description'=>'required|string|max:2055',
    'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:8000',
  
]);

$about->title = $data['title'];
$about->description = $data['description'];

if($request->hasFile('image')){
    $file = $request->file('image');
    $newImage = time().'.'.$file->getClientOriginalExtension();
    $file->storeAs('photos',$newImage,'public');
   
    $about->image = $newImage;
}else{
    $about->image = $data['old_image'];
}
$about->save();
return redirect()->back()->with('success','your about us data has been updated');
}
}