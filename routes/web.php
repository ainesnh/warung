<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/menus/{menu}/toggle-status', [AdminMenuController::class, 'toggleStatus'])->name('menus.toggle-status');
    Route::patch('/menus/{menu}/toggle-special', [AdminMenuController::class, 'toggleSpecial'])->name('menus.toggle-special');
    Route::patch('/menus/{menu}/deactivate', [MenuController::class, 'deactivate'])->name('menus.deactivate');
    Route::resource('menus', AdminMenuController::class)->except(['show']);
    Route::patch('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
    Route::patch('/users/{user}/archive', [UserController::class, 'archive'])->name('users.archive');
    Route::patch('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::resource('users', UserController::class);
});
