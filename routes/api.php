<?php

use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('services', [ServiceController::class, 'indexApi'])->name('services.index');
Route::delete('reservation/{reservation}', [ReservationController::class, 'destroyApi'])->name('reservation.delete');
