<?php

namespace App\Http\Controllers;

use App\Events\DataUpdated;
use App\Helpers\LoggerFormatter;
use App\Helpers\ResponseFormatter;
use App\Models\Gps;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GpsController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $gps = Gps::all()->toArray(); // Konversi ke array
            event(new DataUpdated($gps));
            // broadcast(new DataUpdated($gps))->toOthers();

            Log::info($gps);
    
            return ResponseFormatter::success($gps, "All gps coordinat fetched successfully");
        } catch (\Throwable $th) {
            // Log error dan kembalikan respon error jika terjadi exception
            LoggerFormatter::logError('Failed to gps coordinat', $th);
            return ResponseFormatter::error(null, "Failed to gps coordinat");
        }
    }
    
    public function create(Request $request): JsonResponse
    {
        try {
            $gps = Gps::create([
                "device_id" => $request->input('deviceId'),
                "latitude" => $request->input('latitude'),
                "longitude" => $request->input('longitude'),
            ]);
    
            // Konversi data menjadi array sebelum dikirim ke event dan response
            // broadcast(new DataUpdated($gps))->toOthers();
            $gpsArray = $gps->toArray();
    
            // Kirim event setelah data berhasil dibuat
            event(new DataUpdated($gpsArray));
    
            // Kembalikan response dengan format array
            return ResponseFormatter::success($gpsArray, "Coordinate created successfully");
        } catch (\Throwable $th) {
            // Log error dan kembalikan respon error jika terjadi exception
            LoggerFormatter::logError('Failed to create coordinate', $th);
            return ResponseFormatter::error(null, "Failed to create coordinate");
        }
    }
      
    public function delete(): JsonResponse
    {
        try {
            // Menghapus semua data
            Gps::truncate();
    
            return ResponseFormatter::success(null, "All coordinates deleted successfully");
        } catch (\Throwable $th) {
            // Log error dan kembalikan respon error jika terjadi exception
            LoggerFormatter::logError('Failed to delete all coordinates', $th);
            return ResponseFormatter::error(null, "Failed to delete all coordinates", 500);
        }
    }
    
}
