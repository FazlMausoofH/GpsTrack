<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GpsController extends Controller
{
    public function index(Request $request)
    {
        Log::info('Data GPS(json): ' . json_encode($request->all()));
        return response()->json([
            'message' => 'Data diterima',
            'data' => $request->all(),
        ]);
    }
}
