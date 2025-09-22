<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        "country_name"
    ];

    public function customers() {
        return $this->hasMany(Customer::class);
    }

    public function shippingCost() {
        return $this->hasOne(ShippingCost::class);
    }
}
