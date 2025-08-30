<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopCategory extends Model
{
    protected $fillable = [
        "name",
        "show_on_menu"
    ];

    public function midCategories() {
        return $this->hasMany(MidCategory::class, "top_category_id");
    }
}
