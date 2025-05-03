<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    //
    public function index()
    {
        $times = Time::all();
        return view('admin.time.index', compact('times'));
    }
    public function create()
    {
        return view('admin.time.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required|string|max:255',
        ]);
        Time::create($request->all());
        return redirect()->route('admin.timeManage')
            ->with('success', 'Time created successfully.');
    }
    public function edit($id)
    {
        $time = Time::findOrFail($id);
        return view('admin.time.edit', compact('time'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'time' => 'required|string|max:255',
        ]);
        $time = Time::findOrFail($id);
        $time->update($request->all());
        return redirect()->route('admin.timeManage')
            ->with('success', 'Time updated successfully.');
    }
}
