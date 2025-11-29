<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PracticeAreaController;
use App\Http\Controllers\TimelineController;

// Categories
Route::get('/categories/list', [CategoryController::class, 'getData'])->name('categories.getData');
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
// Tags
Route::get('/tags/list', [TagController::class, 'getData'])->name('tags.getData');
Route::get('/tags/trash', [TagController::class, 'trash'])->name('tags.trash');
// Practice Areas
Route::get('/practice_areas/list', [PracticeAreaController::class, 'getData'])->name('practice_areas.getData');
Route::get('/practice_areas/trash', [PracticeAreaController::class, 'trash'])->name('practice_areas.trash');
// blogs
Route::get('/blogs/list', [BlogController::class, 'getData'])->name('blogs.getData');
Route::get('/blogs/trash', [BlogController::class, 'trash'])->name('blogs.trash');
// galleries
Route::get('/galleries/list', [GalleryController::class, 'getData'])->name('galleries.getData');
Route::get('/galleries/trash', [GalleryController::class, 'trash'])->name('galleries.trash');

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('practice_areas', PracticeAreaController::class);
Route::resource('blogs', BlogController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('timelines', TimelineController::class);

// frontend starts
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/fn-blogs', function () {
    return view('blogs');
})->name('fn-blogs');
Route::get('/about-me', function () {
    return view('about-me');
})->name('about-me');
Route::get('/practice-areas', function () {
    return view('practice-areas');
})->name('practice-areas');
Route::get('/practice-area-details', function () {
    return view('practice-area-details');
})->name('practice-area-details');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
// frontend ends

Route::get('/backend', function () {
    return view('components.backend.layouts.master');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
