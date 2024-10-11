<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ReservationController;
 use App\Http\Controllers\SkipperController;
// use App\Http\Controllers\GeofenceController;





Route::middleware(['auth:api'])->group(function () {
    // Ship routes
    Route::Resource('ships', ShipController::class);

    // Reservation routes
    Route::apiResource('reservations', ReservationController::class);

    // Message routes
    Route::apiResource('messages', MessageController::class);

    // Skipper routes (admin only)
        Route::apiResource('skippers', SkipperController::class);
    
    // Geofence routes
    Route::apiResource('geofences', GeofenceController::class);
});

// Authentication routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::get('/clear', function () {
    // Assuming you have authentication and possibly middleware to check user roles
    // Ensure only authorized users can access this route
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');

    return 'Caches cleared successfully!';
}); // Example: using the 'auth' middleware
