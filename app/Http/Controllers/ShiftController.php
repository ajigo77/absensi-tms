<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard-shift', compact('shifts'));
    }

    public function create()
    {
        return view('components.dashboard.create_shift'); // View for creating a shift
    }

    public function store(Request $request)
    {
        $request->validate([
            'shift-name' => 'required|string|max:255',
            'start-time' => 'required|date_format:H:i',
            'end-time' => 'required|date_format:H:i',
            'waktu' => 'required|date_format:H:i', // Ensure this is validated
        ]);

        // Create a new shift
        Shift::create([
            'name' => $request->input('shift-name'),
            'start_time' => $request->input('start-time'),
            'end_time' => $request->input('end-time'),
            'waktu' => $request->input('waktu'), // Ensure this is saved correctly
        ]);

        return redirect()->back()->with('success', 'Shift added successfully!');
    }

    public function edit(Shift $shift)
    {
        return view('components.dashboard.edit_shift', compact('shift')); // View for editing a shift
    }

    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
        ]);

        $shift->update($request->all());
        return redirect()->route('shifts.index')->with('success', 'Shift updated successfully.');
    }

    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();
        return redirect()->route('shifts.index')->with('success', 'Shift deleted successfully.');
    }
}
