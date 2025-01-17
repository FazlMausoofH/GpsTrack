<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

/**
 * Format response.
 */

class LoggerFormatter
{
    public static function logInfo($message, $request)
    {
        $logData = [
            'message' => $message,
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
        ];
    
        Log::channel('custom')->info(json_encode($logData));   
    }
    public static function logError($message, $th)
    {
        $logData = [
            'message' => $message,
            'error' => $th->getMessage(),
            'ip' => request()->ip(),
            'url' => request()->fullUrl(),
        ];
    
        Log::channel('custom')->error(json_encode($logData));   
    }
    

}