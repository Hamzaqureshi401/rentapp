<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipReview extends Model
{
    protected $fillable = ['ship_id', 'user_id', 'rating', 'review'];

    // Relation to ship
    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
