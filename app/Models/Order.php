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

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class,  "order_number", "order_number");
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
