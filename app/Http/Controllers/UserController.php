<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('users.index', compact('users')); // Pass users to the view
    }

    public function create()
    {
        // Logic to show the form for creating a new user
    }

    public function store(Request $request)
    {
        // Logic to store a newly created user in storage
    }

    public function show($id)
    {
        // Logic to display a specific user
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific user
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific user in storage
    }

    public function destroy($id)
    {
        // Logic to remove a specific user from storage
    }
}
