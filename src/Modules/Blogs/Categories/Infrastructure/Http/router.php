<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Blogs\Categories\Infrastructure\HTTP\Controllers\{
    CategoryIndexController,
    CategoryCreateController,
    CategoryStoreController,
    CategoryEditController,
    CategoryUpdateController,
    CategoryDestroyController,
    CategoryController
};

Route::get('/categories', CategoryIndexController::class)->name('categories.index');
Route::get('/categories/create', CategoryCreateController::class)->name('login'); // cambiar
Route::post('/categories/create', CategoryStoreController::class)->name('categories.store');//cambiar
Route::get('/categories/{id}/edit', CategoryEditController::class)->name('categories.edit');
Route::put('/categories/{id}', CategoryUpdateController::class)->name('categories.update');
Route::delete('/categories/{id}', CategoryDestroyController::class)->name('categories.destroy');

Route::get('/categories/{category}', CategoryController::class)->name('post.category');

