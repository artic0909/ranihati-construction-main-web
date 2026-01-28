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

// Blogs
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');

// Contact
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::post('/enquiry', [FrontendController::class, 'storeEnquiry'])->name('enquiry.store');

// Privacy Policy
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/settings.php';
