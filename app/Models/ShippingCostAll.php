<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCostAll extends Model
{
    protected $table = "shipping_costs_all";

    protected $fillable = [
        "amount"
    ];
}
