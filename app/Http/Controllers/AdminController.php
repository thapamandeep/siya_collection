<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\Hero;
use \App\Models\Order;
use \App\Models\About;
use \App\Models\Size;
use \App\Models\Color;

class AdminController extends Controller
{
    public function dasboard(){

    $sizes = Size::all();

    return view('admin.pages.home',compact('sizes'));
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

    public function editCategory(Category $category){

    return view('admin.category.edit',compact('category'));
    }

    public function updateCategory(Request $request, Category $category){

    $data = $request->validate([
        'name'=>'required|string',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if($request->hasFile('image')){

    $file = $request->file('image');
    $newImage = time().'.'.$file->getClientOriginalExtension();
    $file->storeAs('album',$newImage,'public');
    }

    $category->name = $data['name'];
    $category->image = $newImage;

    $category->save();

    return redirect()->back()->with('success','category has been updated');
    
    }

public function deleteCategory(Category $category){

$category->delete();

return redirect()->back()->with('success','category has been deleted');
}
    // ------------Product-----------------//

 
   

    public function addProduct(){

    $categories = Category::all();
    $sizes = Size::all();
    $colors = Color::all();
    return view('admin.product.form',compact('categories','sizes','colors'));
    }
public function storeProduct(Request $request)
{
    // ✅ Validation
    $data = $request->validate([
        'name' => 'required|string|max:20',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:7000',
        'description' => 'required|string|max:2048',
        'cost' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'total_cost'=>'nullable',
        'stock' => 'required|array', // stock[size_id][color_id] = quantity
    ]);

    // ✅ Handle image upload
    $newImage = "";
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $newImage = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('album', $newImage, 'public');
    }

    // ✅ Create product
    $product = new Product();
    $product->name = $data['name'];
    $product->image = $newImage;
    $product->description = $data['description'];
    $product->cost = $data['cost'];
    $product->category_id = $data['category_id'];
    $product->quantity = 0; // Will calculate below
    $product->save();

    // ✅ Attach stock (size + color)
    $total_quantity = 0;

    foreach ($data['stock'] as $sizeId => $colors) {
        foreach ($colors as $colorId => $qty) {
            if ($qty > 0) {
                $product->colors()->attach($colorId, [
                    'size_id' => $sizeId,
                    'quantity' => $qty
                ]);
                $total_quantity += $qty;
            }
        }
    }

    // ✅ Optional: Prevent empty stock
    if ($total_quantity == 0) {
        $product->delete();
        return back()->withErrors([
            'stock' => 'At least one size & color must have quantity.'
        ]);
    }

    // ✅ Update total quantity and total cost
    $product->quantity = $total_quantity;
    $product->total_cost = $total_quantity * $data['cost'];
    $product->save();

    return redirect()->back()->with('success', 'Your product has been saved successfully with size & color stock!');
}

   public function productIndex(){

   $products = Product::all();

   return view('admin.product.index',compact('products'));
   }

   public function editProduct(Product $product){
  $sizes = Size::all();
   $categories = Category::all();
   $colors = Color::all();

   return view('admin.product.edit',compact('product','categories','sizes','colors'));
   }
public function updateProduct(Request $request, Product $product)
{
    // ✅ Validate input
    $data = $request->validate([
        'name' => 'nullable|string|max:20',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'description' => 'nullable|string|max:2048',
        'cost' => 'nullable|integer',
        'category_id' => 'nullable|exists:categories,id',
        'stock' => 'nullable|array', // stock[size_id][color_id] = quantity
    ]);

    // -------------------------------
    // 1️⃣ Update basic fields
    // -------------------------------
    if (isset($data['name'])) $product->name = $data['name'];
    if (isset($data['description'])) $product->description = $data['description'];
    if (isset($data['cost'])) $product->cost = $data['cost'];
    if (isset($data['category_id'])) $product->category_id = $data['category_id'];

    // -------------------------------
    // 2️⃣ Update image if uploaded
    // -------------------------------
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $newImage = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('album', $newImage, 'public');
        $product->image = $newImage;
    }

    // -------------------------------
    // 3️⃣ Handle stock (size + color)
    // -------------------------------
    $total_quantity = 0;

    if (isset($data['stock']) && is_array($data['stock'])) {
        // ✅ Remove old pivot entries first
        $product->colors()->detach();

        foreach ($data['stock'] as $sizeId => $colors) {
            foreach ($colors as $colorId => $qty) {
                $qty = (int)$qty;
                if ($qty > 0) {
                    $product->colors()->attach($colorId, [
                        'size_id' => $sizeId,
                        'quantity' => $qty
                    ]);
                    $total_quantity += $qty;
                }
            }
        }
    }

    // -------------------------------
    // 4️⃣ Prevent saving without stock
    // -------------------------------
    if ($total_quantity == 0) {
        return back()->withErrors([
            'stock' => 'At least one size & color must have quantity.'
        ]);
    }

    // -------------------------------
    // 5️⃣ Update total quantity
    // -------------------------------
    $product->quantity = $total_quantity;

    // -------------------------------
    // 6️⃣ Save product
    // -------------------------------
    $product->save();

    return redirect()->back()->with('success', 'Product updated successfully!');
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