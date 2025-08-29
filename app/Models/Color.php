<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        "name"
    ];

    public function productColors() {
        return $this->hasMany(ProductColor::class, "color_id");
    }
}
