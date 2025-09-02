<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillablen = [
        "full_name",
        "email",
        "phone_number",
        "password",
        "role",
        "status",
        "remember_token"
    ];

}
