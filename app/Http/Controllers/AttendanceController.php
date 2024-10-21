<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        // Logic to display the list of attendance records
    }

    public function create()
    {
        // Logic to show the form for creating a new attendance record
    }

    public function store(Request $request)
    {
        // Logic to store a newly created attendance record in storage
    }

    public function show($id)
    {
        // Logic to display a specific attendance record
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific attendance record
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific attendance record in storage
    }

    public function destroy($id)
    {
        // Logic to remove a specific attendance record from storage
    }

    public function checkIn(Request $request)
    {
        $userId = $request->user_id;

        // Check if the user is already checked in
        $existingAttendance = Attendance::where('user_id', $userId)
            ->where('type', 'masuk kerja')
            ->whereNull('updated_at') // Ensure they haven't checked out
            ->first();

        if ($existingAttendance) {
            return response()->json(['message' => 'User already checked in.'], 400);
        }

        // Create a new attendance record for check-in
        Attendance::create([
            'user_id' => $userId,
            'type' => 'masuk kerja',
            'shift_id' => $request->shift_id,
            'status' => 'masuk on time', // or other logic to determine status
            'created_at' => now(), // This will be "Waktu Datang"
            // other fields...
        ]);

        return response()->json(['message' => 'Checked in successfully.']);
    }

    public function checkOut(Request $request)
    {
        $userId = $request->user_id;

        // Find the existing attendance record for check-in
        $attendance = Attendance::where('user_id', $userId)
            ->where('type', 'masuk kerja')
            ->whereNull('updated_at') // Ensure they haven't checked out
            ->first();

        if (!$attendance) {
            return response()->json(['message' => 'User not checked in.'], 400);
        }

        // Update the existing record to set the updated_at time
        $attendance->update([
            'updated_at' => now(), // This will be "Waktu Pulang"
            'type' => 'pulang', // Change type to 'pulang'
        ]);

        return response()->json(['message' => 'Checked out successfully.']);
    }
}
