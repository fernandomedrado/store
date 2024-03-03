<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('product', ProductController::class)->only([
    'index',
    'store',
    'show',
    'update',
    'destroy',
]);
