<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MidCategory extends Model
{
    protected $fillable = [
        "name",
        "top_category_id"
    ];

    public function topCategory() {
        return $this->belongsTo(TopCategory::class, "top_category_id");
    }

    public function endCategories() {
        return $this->hasMany(EndCategory::class, "mid_category_id");
    }
}

