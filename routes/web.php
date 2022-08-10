<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', [userController::class, 'index']);
Route::get('/create', [userController::class, 'create']);
Route::get('/edit/{id}', [userController::class, 'edit']);

Route::post('/', [userController::class, 'sort']);
Route::post('/create', [userController::class, 'store'])->middleware('exist');
Route::post('/update/{id}', [userController::class, 'update']);
Route::post('/destroy/{id}', [userController::class, 'destroy']);
