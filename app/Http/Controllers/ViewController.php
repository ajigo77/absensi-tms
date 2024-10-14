<?php

namespace App\Http\Controllers;

use App\Models\View; // Ensure this is the correct model
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function show($id)
    {
        // Fetch the record by the primary key
        $view = View::where('id_absen', $id)->firstOrFail(); 

        // Pass the variable to the view
        return view('view.show', compact('view')); 
    }
}
