<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gps;

class GpsSeeder extends Seeder
{
    public function run()
    {
        $deviceId = "device123"; // Device ID yang sama untuk semua data
        $latitudeBase = -6.208763; // Base latitude
        $longitudeBase = 106.845599; // Base longitude
        $step = 0.00005; // Increment step for each coordinate

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'device_id' => $deviceId,
                'latitude' => $latitudeBase + ($step * $i), // Latitude increases incrementally
                'longitude' => $longitudeBase + ($step * $i), // Longitude increases incrementally
                'created_at' => now()->setTimezone('Asia/Jakarta'),
                'updated_at' => now()->setTimezone('Asia/Jakarta'),
            ];
        }

        // Insert data ke tabel GPS
        Gps::insert($data);
    }
}
