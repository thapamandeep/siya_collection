<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
public function search(Request $request)
{
    $search = $request->search;

    $products =Product::where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->get();

    return view('search.search', compact('products', 'search'));
}


public function categoryProducts($id)
{
    $category = Category::with('products')->findOrFail($id);

    return view('site.pages.category-products', compact('category'));
}

}
