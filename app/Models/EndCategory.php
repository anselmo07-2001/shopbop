<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EndCategory extends Model
{
    protected $fillable = [
        "name",
        "mid_category_id"
    ];

    public function midCategory() {
        return $this->belongsTo(MidCategory::class, "mid_category_id");
    }

    public function products() {
        return $this->hasMany(Product::class, "end_category_id");
    }
}
