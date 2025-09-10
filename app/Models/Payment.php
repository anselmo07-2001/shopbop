<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        "payment_date",
        "txn_id",
        "paid_amount",
        "card_number_last_4",
        "card_brand",
        "bank_transaction_info",
        "payment_method",
        "payment_status",
        "shipping_status",
        "customer_id",
        "order_number"
    ];

    public function order() {
        return $this->belongsTo(Order::class, "order_number". "order_number");
    }
}
