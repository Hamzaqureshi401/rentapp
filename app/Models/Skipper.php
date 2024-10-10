<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skipper extends Model
{
    protected $fillable = [
        'name',
        'experience',
        'available',
    ];

    protected $casts = [
        'available' => 'boolean',
    ];

    // Relationships

    // A skipper can be assigned to multiple ships
    public function ships()
    {
        return $this->belongsToMany(Ship::class, 'ship_skipper');
    }
}
