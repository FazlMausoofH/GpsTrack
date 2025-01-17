<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    protected $fillable = [
        'device_id', 
        'latitude', 
        'longitude', 
        'created_at', 
        'updated_at',
    ];
    
}
