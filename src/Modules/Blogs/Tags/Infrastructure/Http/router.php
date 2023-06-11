<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Blogs\Tags\Infrastructure\Http\Controllers\{
    TagController
};


Route::get('/tag/{tag}', TagController::class)->name('posts.tag');