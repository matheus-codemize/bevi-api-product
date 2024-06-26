<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::post('/', [ProductController::class, 'store']);
Route::put('/{id}', [ProductController::class, 'update']);
Route::delete('/{id}', [ProductController::class, 'destroy']);
