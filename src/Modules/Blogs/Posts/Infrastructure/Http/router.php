<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers\{
    PostIndexController,
    PostCreateController,
    PostStoreController,
    PostEditController,
    PostUpdateController,
    PostDestroyController,
    PostShowController
};

// middleware
Route::get('/posts', PostIndexController::class)->name('admin.post.index');// cambiar
Route::get('/posts/create', PostCreateController::class)->name('admin.post.create');
Route::post('/posts/create', PostStoreController::class)->name('admin.post.store');
Route::get('/posts/update/{post}', PostEditController::class)->name('admin.post.edit');
Route::put('/posts/update/{id}', PostUpdateController::class)->name('admin.post.update');
Route::delete('/posts/{id}', PostDestroyController::class)->name('admin.post.destroy');


// public
Route::get('/posts/{title}', PostShowController::class)->name('post.show');

