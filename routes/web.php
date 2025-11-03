<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

//main page with all events. Authentication is not required
Route::get('/', [EventController::class, 'index'])->name('events.index');

//default routes added by Laravel Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//routes for admin functionality. Requires admin privileges (is_admin = true in the DB)
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/sport', [AdminController::class, 'storeSport'])->name('admin.store.sport');
    Route::post('/admin/team', [AdminController::class, 'storeTeam'])->name('admin.store.team');
    Route::post('/admin/event', [AdminController::class, 'storeEvent'])->name('admin.store.event');
});

require __DIR__.'/auth.php';
