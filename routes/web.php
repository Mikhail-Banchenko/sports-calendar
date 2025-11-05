<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

//main page of the application
Route::get('/', [HomeController::class, 'index'])->name('home');

//pages related to events. 1 - list of events, 2 - event details
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

//default routes added by Laravel Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//routes for admin functionality. Requires admin privileges (is_admin = true in the DB)
Route::middleware(['auth', IsAdmin::class])->group(function () {
    //prefix means that all routes inside the group will start with /admin
    Route::prefix('admin')->group(function () {
        //recource includes all CRUD routes for managing events in the admin panel
        Route::resource('events', AdminEventController::class)->names('admin.events');
    });
});

require __DIR__.'/auth.php';
