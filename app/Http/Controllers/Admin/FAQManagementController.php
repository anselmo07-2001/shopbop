<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FAQManagementController extends Controller
{
    public function index() {
        return view("admin.panels.faq.index");
    }

    public function create() {
        return view("admin.panels.faq.create");
    }

    public function store(Request $request) {
        $request->merge([
            'title' => trim($request->title),
            'content' => trim($request->content),
        ]);

        $validated_data = $request->validate([
            "title" => "required|string|max:255",
            "content" => "required|string|min:5",
        ],
        [
            'title.required' => 'Please enter a title.',
            'content.min' => 'Content must be at least 5 characters long.',
        ]);

        Faq::create($validated_data);

        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ created successfully!');

    }
}
