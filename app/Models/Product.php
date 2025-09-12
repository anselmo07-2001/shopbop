<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'featured_photo' => $this->featured_photo,
            'description' => $this->description,
            'short_description' => $this->short_description,
        ];
    }

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

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    
}
