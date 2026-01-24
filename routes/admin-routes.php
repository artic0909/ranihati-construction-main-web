<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminController::class, 'loginView'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.verify');

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/carousel', [AdminController::class, 'carousel'])->name('carousel');
    Route::get('/work', [AdminController::class, 'work'])->name('work');
});