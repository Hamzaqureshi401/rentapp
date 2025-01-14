<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Routes for static pages

Route::get('/about', function () {
    return view('about'); // About Us page
})->name('about');

Route::get('/services', function () {
    return view('services'); // Services page
})->name('services');

Route::get('/testimonials', function () {
    return view('testimonials'); // Testimonials page
})->name('testimonials');

Route::get('/blog', function () {
    return view('blog'); // Blog page
})->name('blog');

Route::get('/contact', function () {
    return view('contact'); // Contact page
})->name('contact');

Auth::routes();


Route::middleware(['auth', 'super_admin'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('/reservations/{reservation}', [App\Http\Controllers\ReservationController::class, 'update'])->name('reservations.update');
// Routes for editing and deleting reservations
Route::get('/reservations/{reservation}/edit', [App\Http\Controllers\ReservationController::class, 'edit'])->name('reservations.edit');
Route::delete('/reservations/{reservation}', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservations.destroy');
Route::resource('users', UserController::class);
});