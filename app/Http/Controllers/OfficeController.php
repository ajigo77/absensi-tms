<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::paginate(10);
        return view('kantor', compact('offices'));
    }

    public function create()
    {
        return view('offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'radius' => 'required|numeric',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        Office::create($request->all());

        return response()->json(['success' => 'Office created successfully.']);
    }

    public function show($id)
    {
        // Logic to display a specific office
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific office
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific office in storage
    }

    public function destroy($id)
    {
        // Logic to remove a specific office from storage
    }
}
