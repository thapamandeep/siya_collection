<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Carts;
use App\Models\Review;
use App\Models\Size;

class Product extends Model
{
   protected $fillable =[
    'name',
    'image',
    'description',
    'quantity',
    'cost',
    'total_cost',
   ];
   
   public function category(){

   return $this->belongsTo(Category::class,'category_id');
   }

   public function carts(){

   return $this->hasMany(Cart::class,'product_id');
   }
   
   public function reviews(){

   return $this->hasMany(Review::class,);
   }

   public function sizes(){

   return $this->belongsToMany(Size::class,);
   }
}
