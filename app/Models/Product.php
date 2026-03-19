<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Carts;

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
}
