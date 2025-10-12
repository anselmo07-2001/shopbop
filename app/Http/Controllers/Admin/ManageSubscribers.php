<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class ManageSubscribers extends Controller
{
    public function index() {
        return view("admin.panels.subscribers.index");
    }

    public function destroy(Subscriber $subscriber) {
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber deleted successfully!');
    }

    public function destroyPendingSubscribers() {
        $deletedCount = Subscriber::where("is_verified", false)->delete();
        return redirect()->route('admin.subscribers.index')->with('success', "$deletedCount pending subscribers deleted successfully!");
    }
}
