<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('welcome');
});

// Shared Dashboard for all authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes (admin + staff)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Accessible by all logged-in users
    Route::get('/items', function () {
        if (auth()->user()->role === 'admin') {
            return view('items.admin');
        } else {
            return view('items.staff');
        }
    })->middleware('auth');});

    // Route InventoryController
Route::middleware(['auth'])->group(function () {
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

    // Show form to create new item
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    // Show single item (View)
    Route::get('/inventory/{id}', [InventoryController::class, 'show'])->name('inventory.show');

    // Show form to edit
    Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');

    // Submit update
    Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
});


// Admin-only routes — you can check role manually in the controller
Route::middleware('auth')->group(function () {
    Route::resource('items', ItemController::class)->except(['index']);
});

require __DIR__.'/auth.php';
