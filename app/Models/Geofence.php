<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Geofence extends Model
{
    protected $fillable = [
        'ship_id',
        'latitude',
        'longitude',
        'radius',
    ];

    // Relationships

    // A geofence belongs to a ship
    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }
}
