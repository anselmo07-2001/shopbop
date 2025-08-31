<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    protected $fillable = [
        "about_us_title",
        "about_us_content",
        "about_us_meta_title",
        "about_us_meta_keywords",
        "about_us_meta_description"
    ];
}
