<?php

use App\Http\Controllers\BookingController;

Route::get('/bookings', [BookingController::class, 'store']);
Route::post('/bookings', [BookingController::class, 'store']);