<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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

    public function exportCsv(){
        $subscribers = Subscriber::select('id', 'email', 'is_verified')->get();

        $filename = 'subscribers_' . now()->format('Y-m-d_His') . '.csv';
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['ID', 'Email', 'Status'];

        $callback = function() use ($subscribers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($subscribers as $subscriber) {
                fputcsv($file, [
                    $subscriber->id,
                    $subscriber->email,
                    $subscriber->is_verified
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
