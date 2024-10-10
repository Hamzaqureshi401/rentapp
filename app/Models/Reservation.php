<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'ship_id',
        'start_date',
        'end_date',
        'skipper',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'skipper' => 'boolean',
    ];

    // Relationships

    // A reservation belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A reservation is for a ship
    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }
}
