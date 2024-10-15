<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\JsonResponse;

class AbsenController extends Controller
{
    public function getStats(): JsonResponse
    {
        return response()->json(Absen::getStats());
    }
}
