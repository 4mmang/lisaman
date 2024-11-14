<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class, 'id_product');
    }
}
