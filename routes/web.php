<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', [FrontendController::class, 'index'])->name('home');

// Services
Route::get('/services', [FrontendController::class, 'service'])->name('services');

// Mission
Route::get('/mission', [FrontendController::class, 'mission'])->name('mission');

// Career
Route::get('/careers', [FrontendController::class, 'career'])->name('careers');
Route::post('/careers', [FrontendController::class, 'storeJobEnquiry'])->name('careers.store');





Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::post('/enquiry', [FrontendController::class, 'storeEnquiry'])->name('enquiry.store');

Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/settings.php';
