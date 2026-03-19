<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_cost',
    ];

    public function user(){

    return $this->belongsTo(User::class,'user_id');
    }

        public function product(){

    return $this->belongsTo(Product::class,'product_id');
    }
}
