<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        // Logic to display the list of offices
    }

    public function create()
    {
        return view('offices.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);

        // Simpan data ke database
        Office::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('offices.index')->with('success', 'Office created successfully.');
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
