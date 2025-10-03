<?php

namespace App\Livewire\Admin\Panels\OrderManagement;

use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;

class OrderManagementIndex extends Component
{

    public function render()
    {  
        $orders = Order::with(["product", "payments", "customer"])->get()->groupBy("order_number");
        return view('livewire.admin.panels.order-management.order-management-index', compact("orders"));
    }
}
