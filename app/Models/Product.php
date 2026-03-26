<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Review;
use App\Models\Color;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'quantity',
        'cost',
        'total_cost',
    ];

    // ✅ Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // ✅ Cart
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

    // ✅ Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

        // sizes relation
    public function sizes()
    {
        return $this->belongsToMany(Size::class,'product_size_color')
                    ->withPivot('color_id','quantity')
                    ->withTimestamps();
    }

    // colors relation
    public function colors()
    {
        return $this->belongsToMany(Color::class,'product_size_color')
                    ->withPivot('size_id','quantity')
                    ->withTimestamps();
    }

    // ✅ MAIN RELATION (IMPORTANT 🔥)
    public function stock()
    {
        return $this->belongsToMany(Color::class, 'product_size_color')
                    ->withPivot('size_id', 'quantity')
                    ->withTimestamps();
    }
}