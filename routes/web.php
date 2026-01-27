<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/services', function () {
    return view('frontend.service');
})->name('services');

Route::get('/mission', function () {
    return view('frontend.mission');
})->name('mission');

Route::get('/careers', function () {
    return view('frontend.careers');
})->name('careers');

Route::get('/blogs', function () {
    return view('frontend.blogs');
})->name('blogs');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::post('/enquiry', [FrontendController::class, 'storeEnquiry'])->name('enquiry.store');

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
})->name('blog-details');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
