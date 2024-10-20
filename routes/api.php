<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SkipperController;
// use App\Http\Controllers\GeofenceController;
use App\Http\Controllers\ShipReviewController;


// Authentication routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



Route::middleware(['auth:api'])->group(function () {
    
    Route::apiResource('reservations', ReservationController::class);
    Route::get('ships', [ShipController::class, 'index']);
    Route::get('ships/{ship}', [ShipController::class, 'show']);
    Route::get('skippers', [SkipperController::class, 'index']);
    Route::get('skippers/{skipper}', [SkipperController::class, 'show']);
    
    // Skipper routes (admin only)
   Route::middleware(['isAdmin'])->group(function () {
        Route::put('ships/{ship}', [ShipController::class, 'update']);
        Route::delete('ships/{ship}', [ShipController::class, 'destroy']);
        Route::put('skippers/{skipper}', [SkipperController::class, 'update']);
        Route::delete('skippers/{skipper}', [SkipperController::class, 'destroy']);
        Route::post('ships', [ShipController::class, 'store']);   // POST request to create a ship
        Route::post('skippers', [SkipperController::class, 'store']); // POST request to create a skipper
    });
   
    Route::apiResource('ship-reviews', ShipReviewController::class);


    // Geofence routes
    Route::apiResource('geofences', GeofenceController::class);
});



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
