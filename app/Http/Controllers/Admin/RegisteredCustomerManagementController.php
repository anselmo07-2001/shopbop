<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class RegisteredCustomerManagementController extends Controller
{
    public function index() {
        return view("admin.panels.registered-customers.index");
    }

    public function updateStatus(Customer $customer) {
        if (!in_array($customer->status, ['active', 'inactive'])) {
            return back()->with('error', 'Invalid status value.');
        }

        $newStatus = $customer->status === 'active' ? 'inactive' : 'active';
        $customer->update(['status' => $newStatus]);
        return back()->with('success', "Customer status updated to {$newStatus}.");
    }
}
