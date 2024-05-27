<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Service\ServiceController;
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

Route::get('services', [ServiceController::class, 'index'])->name('services');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// Route For Test HTML Codes
Route::get('test', function () {
    return view('auth.reset-password');
})->name('dashboard');