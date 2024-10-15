<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Logic to store a newly created schedule in storage
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
