<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    // Display all notices
    public function index()
    {
        $notices = Notice::all();
        return view('admin.notice.index', compact('notices'));
    }

    // Show form for creating a new notice
    public function create()
    {
        return view('admin.notice.create');
    }

    // Store a newly created notice
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        Notice::create($request->all());
        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    // Show form for editing the specified notice
    public function edit(Notice $notice)
    {
        return view('admin.notice.edit', compact('notice'));
    }

    // Update the specified notice
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $notice->update($request->all());
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    // Remove the specified notice
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
