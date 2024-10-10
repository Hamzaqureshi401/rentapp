<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Add this if using Laravel Sanctum or Passport
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password', 'role' , 'api_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relationships

    // A user can have many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // A user can send many messages
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'from_user_id');
    }

    // A user can receive many messages
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'to_user_id');
    }

    // If the user is an admin, they can own many ships
    public function ships()
    {
        return $this->hasMany(Ship::class, 'owner_id');
    }
}
