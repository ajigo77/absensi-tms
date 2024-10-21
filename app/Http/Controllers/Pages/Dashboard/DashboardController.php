<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;

class DashboardController extends Controller
{
    public function dash(){
        $absen = Absen::all();
        return view('dashboard', compact('absen'));
    }
}
