<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash(){
        return view('dashboard');
    }
}
