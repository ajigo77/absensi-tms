<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class CardShiftController extends Controller
{
    public function cardView(){
        $cards = Shift::all();
        return view('Card.shift', compact('cards'));
    }
}
