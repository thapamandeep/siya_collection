<?php

namespace App\Models;
;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Review extends Model
{
      protected $fillable =[
        'rate',
        'message',
        'product_id',
        'user_id',
        'order_id',
    ];

    public function user()
{
    return $this->belongsTo(User::class,);
}

public function product()
{
    return $this->belongsTo(Product::class,);
}
public function order(){
    return $this->belongsTo(Order::class,);
}
}
