<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        "full_name",  
        "company_name",  
        "email",  
        "phone_number",  
        "country",  
        "address",  
        "city",  
        "state",  
        "zip",  
        "billing_name",  
        "billing_company_name",  
        "billing_phone_number",  
        "billing_country",  
        "billing_address",  
        "billing_city",  
        "billing_state",  
        "billing_zip",  
        "shipping_name",  
        "shipping_company_name",  
        "shipping_phone_number",  
        "shipping_country",  
        "shipping_address",  
        "shipping_city",  
        "shipping_state",  
        "shipping_zip",
    ];

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
