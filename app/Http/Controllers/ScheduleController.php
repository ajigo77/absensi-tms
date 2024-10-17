<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        // Logic to display the list of schedules
    }

    public function create()
    {
        // Logic to show the form for creating a new schedule
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'office' => 'required|string|max:255',
            'wfa' => 'boolean',
            'shift_start' => 'required|date_format:H:i',
            'shift_end' => 'required|date_format:H:i',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function show($id)
    {
        // Logic to display a specific schedule
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific schedule
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific schedule in storage
    }

    public function destroy($id)
    {
        // Logic to remove a specific schedule from storage
    }
}
