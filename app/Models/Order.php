<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'quantity',
        'user_id',
        'product_id',
    ];

    public function product(){

   return $this->belongsTo(Product::class,'product_id');

}

public function user(){

return $this->belongsTo(User::class,'user_id');
}


}
