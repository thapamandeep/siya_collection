<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Color extends Model
{
  
    protected $fillable = [
        'name',
    ];

      public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size_color')
                    ->withPivot('size_id', 'quantity')
                    ->withTimestamps();
    }
}
