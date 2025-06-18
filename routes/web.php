<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\RoomImage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Get images for the logged-in user, newest first
    $roomImages = RoomImage::where('user_id', auth()->id())
                           ->latest()
                           ->get();

    return view('dashboard', [
        'roomImages' => $roomImages
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


use App\Http\Controllers\RoomImageController;

Route::middleware('auth')->group(function () {
    Route::get('/upload', [RoomImageController::class, 'create'])->name('room-images.create');
    Route::post('/upload', [RoomImageController::class, 'store'])->name('room-images.store');
});


use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route for the main admin dashboard (all uploads)
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Route for the user management page
    Route::get('/users', [AdminController::class, 'users'])->name('users');

    // Route to handle blocking/unblocking a user
    Route::post('/users/{user}/toggle-block', [AdminController::class, 'toggleBlock'])->name('users.toggle-block');

    // Route to export data as CSV
    Route::get('/export', [AdminController::class, 'export'])->name('export');
});


