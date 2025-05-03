<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shedule;

class ScheduleController extends Controller
{
    // Show all schedules
    public function index()
    {
        $schedules = Shedule::all();
        return view('admin.schedule.index', compact('schedules'));
    }

    // Show form to create a new schedule
    public function create()
    {
        return view('admin.schedule.create');
    }

    // Store a new schedule
    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'usertype' => 'required|string|in:man,woman', // Ensure usertype is either 'man' or 'woman'
        ]);

        Shedule::create($request->all());

        return redirect()->route('admin.manageSchedule')
            ->with('success', 'Schedule created successfully.');
    }

    // Show form to edit an existing schedule
    public function edit(Shedule $schedule)
    {
        return view('admin.schedule.edit', compact('schedule'));
    }

    // Update an existing schedule
    public function update(Request $request, Shedule $schedule)
    {
        $request->validate([
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'usertype' => 'required|string|in:man,woman', // Validate usertype again during update
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.manageSchedule')
            ->with('success', 'Schedule updated successfully.');
    }

    // Delete a schedule
    public function destroy(Shedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.manageSchedule')
            ->with('success', 'Schedule deleted successfully.');
    }
}
