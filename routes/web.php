<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Service\ServiceController;
use App\Models\ReservationService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('home');
});

// Route::get('/home', function () {
//     return view('site.home');
// });

Route::get('/home', [HomeController::class, 'index'])/*->middleware(['auth', 'verified'])*/->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

Route::get('services', [CategoryController::class, 'index'])->name('services');

Route::middleware('auth')->group(function () {
    // Route::get('', );
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('reservation', ReservationController::class);
});

require __DIR__.'/auth.php';




// Route For Test HTML Codes
Route::get('test', function () {
    return view('site.profile.profile');
})->name('dashboard');