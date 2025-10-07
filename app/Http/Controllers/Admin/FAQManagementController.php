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

    public function destroy(Faq $faq) {
        $faq->delete();
        return back()->with('success', 'FAQ deleted successfully!');
    }

    public function edit(Faq $faq) {
        return view("admin.panels.faq.edit", compact("faq"));
    }

    public function update(Faq $faq, Request $request) {
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

        $faq->update($validated_data);
        return back()->with('success', 'FAQ updated successfully!');
    }
}
