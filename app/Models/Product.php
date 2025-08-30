<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "original_price",
        "current_price",
        "quantity",
        "featured_photo",
        "condition",
        "return_policy",
        "total_views",
        "is_featured",
        "is_active",
        "end_category_id"
    ];

    public function endCategory() {
        return $this->belongsTo(EndCategory::class, "end_category_id");
    }
}
