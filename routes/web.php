<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
    
}) ->name('welcome');

// UNE SEULE ROUTE POUR LE DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', ])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les catégories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
        ->name('categories.index');
        


    });
    // LA ROUTE POUR ENREGISTRER LES TÂCHES
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
});

// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TasksController::class);
});

Route::middleware(['auth', ])->group(function () {
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

require __DIR__.'/auth.php';
