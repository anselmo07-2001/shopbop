<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "size",
        "color",
        "quantity",
        "unit_price",
        "order_number",
        "product_id",
        "customer_id"
    ];
}
