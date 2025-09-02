<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillablen = [
        "full_name",
        "email",
        "phone_number",
        "password",
        "role",
        "status",
    ];

    public function customers() {
        return $this->hasMany(Customer::class);
    }
}
