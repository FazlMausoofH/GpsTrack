<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

// Broadcast::channel('data-channel', function () {
//     return true; // Memberikan izin untuk semua pengguna
// });
Broadcast::channel('data-channel', function ($user) {
    Log::info('User joined data-channel', ['user' => $user]);
    return true; // atau kondisi autentikasi
});
