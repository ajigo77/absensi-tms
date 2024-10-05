<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dash(){
        $usrs = User::limit(10)->get();
        return view('dashboard', compact('usrs'));
    }
}
