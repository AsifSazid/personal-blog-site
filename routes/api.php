<?php
// routes/api.php
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\GalleryGroupController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\TimelineEventController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\StatsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('blog-posts', BlogPostController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('gallery-groups', GalleryGroupController::class);
Route::apiResource('images', ImageController::class)->only(['store', 'destroy']);
Route::apiResource('timeline-events', TimelineEventController::class);
Route::apiResource('comments', CommentController::class);
Route::get('stats', [StatsController::class, 'index']);