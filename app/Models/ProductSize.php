<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = [
        "size_id",
        "product_id"
    ];

    public function size() {
        return $this->belongsTo(Size::class, "size_id");
    }
}
