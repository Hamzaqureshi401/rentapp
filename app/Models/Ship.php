<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
        'owner_id',
        'name',
        'type',
        'length',
        'berths',
        'bathrooms',
        'equipment',
        'crew',
        'route',
        'price_per_week',
        'skipper_required',
    ];

    // Cast JSON fields to arrays
    protected $casts = [
        'equipment' => 'array',
        'crew' => 'array',
        'route' => 'array',
        'skipper_required' => 'boolean',
    ];

    // Relationships

    // A ship belongs to an owner (User)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // A ship can have many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // A ship can have many geofences
    // public function geofences()
    // {
    //     return $this->hasMany(Geofence::class);
    // }

    // A ship can have multiple skippers (if applicable)
    public function skippers()
    {
        return $this->belongsToMany(Skipper::class, 'ship_skipper');
    } 
    public function reviews()
    {
        return $this->hasMany(ShipReview::class);
    }

    // Calculate average rating
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0; // Default to 0 if no reviews
    }
}
