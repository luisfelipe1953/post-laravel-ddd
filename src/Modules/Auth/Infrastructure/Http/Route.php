<?php

namespace Src\Modules\Auth\Infrastructure\Http;

use Illuminate\Support\Facades\Route;
use Src\Modules\Auth\Infrastructure\Http\Controllers\RegisterController;

Route::post('/register', RegisterController::class);
