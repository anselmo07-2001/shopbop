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
        "forgot_password_message",
        "featured_products_limit",
        "latest_products_limit",
        "popular_products_limit",
        "show_service_section", 
        "show_featured_product_section",
        "show_popular_product_section", 
        "show_welcome_product_section", 
        "show_latest_product_section",
        "featured_products_title", 
        "featured_products_subtitle", 
        "latest_products_title", 
        "latest_products_subtitle", 
        "popular_products_title", 
        "popular_products_subtitle", 
        "newsletter_title",
        "meta_title", 
        "meta_keywords",
        "meta_description",
        "business_email",
        "faq_title",
        "faq_subtitle",
        "faq_meta_title",
        "faq_meta_keywords",
        "faq_meta_description",
    ];
}
