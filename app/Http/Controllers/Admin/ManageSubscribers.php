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
        return redirect()->route('admin.subscribers.index')->with('success', 'Subsriber deleted successfully!');
    }
}
