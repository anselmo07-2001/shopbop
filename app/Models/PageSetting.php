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
        "about_us_meta_description",
        "bank_detail",
        "footer_copyright",
        "contact_address",
        "contact_email",
        "contact_phone",
        "contact_map_iframe",
        "logo",
        "favicon",
        "show_newsletter",
        "email_subject",
        "email_thankyou_message",
        "forgot_password_message"
    ];
}
