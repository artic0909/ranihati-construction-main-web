<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminController::class, 'loginView'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.verify');

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');

    // Carousel =================================================================>
    Route::get('/carousel', [AdminController::class, 'carousel'])->name('carousel');
    Route::post('/carousel/store', [AdminController::class, 'carouselStore'])->name('carousel.store');
    Route::put('/carousel/update/{id}', [AdminController::class, 'carouselUpdate'])->name('carousel.update');
    Route::delete('/carousel/delete/{id}', [AdminController::class, 'carouselDelete'])->name('carousel.delete');

    // Work =================================================================>
    Route::get('/work', [AdminController::class, 'work'])->name('work');
    Route::post('/work/store', [AdminController::class, 'workStore'])->name('work.store');
    Route::put('/work/update/{id}', [AdminController::class, 'workUpdate'])->name('work.update');
    Route::delete('/work/delete/{id}', [AdminController::class, 'workDelete'])->name('work.delete');

    // Project =================================================================>
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::post('/projects/store', [AdminController::class, 'projectStore'])->name('projects.store');
    Route::put('/projects/update/{id}', [AdminController::class, 'projectUpdate'])->name('projects.update');
    Route::delete('/projects/delete/{id}', [AdminController::class, 'projectDelete'])->name('projects.delete');

    // Services =================================================================>
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::post('/services/store', [AdminController::class, 'serviceStore'])->name('services.store');
    Route::put('/services/update/{id}', [AdminController::class, 'serviceUpdate'])->name('services.update');
    Route::delete('/services/delete/{id}', [AdminController::class, 'serviceDelete'])->name('services.delete');

    
    Route::get('/facts', [AdminController::class, 'facts'])->name('facts');
    Route::get('/about', [AdminController::class, 'about'])->name('about');
    Route::get('/clients', [AdminController::class, 'clients'])->name('clients');
    Route::get('/faqs', [AdminController::class, 'faqs'])->name('faqs');
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('testimonials');
    Route::get('/blogs', [AdminController::class, 'blogs'])->name('blogs');
    Route::get('/enquiry', [AdminController::class, 'enquiry'])->name('enquiry');
    Route::get('/job-enquiry', [AdminController::class, 'jobEnquiry'])->name('job-enquiry');

});