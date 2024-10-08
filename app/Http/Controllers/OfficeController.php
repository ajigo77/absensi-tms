<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        // Logic to display the list of offices
    }

    public function create()
    {
        // Logic to show the form for creating a new office
    }

    public function store(Request $request)
    {
        // Logic to store a newly created office in storage
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
