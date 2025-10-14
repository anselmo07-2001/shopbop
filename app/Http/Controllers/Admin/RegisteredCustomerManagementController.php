<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function destroy(Customer $customer) {   
        $avatar_path = $customer->getRawOriginal("avatar");
     
        if($avatar_path && Storage::disk("public")->exists( $avatar_path)) { 
            Storage::disk("public")->delete($avatar_path);
        }

        $customer->delete();

        return back()->with('success', "Customer deleted successfully.");
    }
}
