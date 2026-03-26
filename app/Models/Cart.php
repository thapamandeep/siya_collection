<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'size_id',
        'color_id',
        'quantity',
        'total_cost',
    ];

    public function user(){

    return $this->belongsTo(User::class,'user_id');
    }

        public function product(){

    return $this->belongsTo(Product::class,'product_id');
    }

    public function size()
{
    return $this->belongsTo(Size::class);
}

public function color()
{
    return $this->belongsTo(Color::class);
}
}
