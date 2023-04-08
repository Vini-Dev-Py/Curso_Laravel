<?php

use App\Http\Controllers\Api\ClienteApiController;
use Illuminate\Support\Facades\Route;

Route::get('/clientes', [ClienteApiController::class, 'GetAll']);
Route::post('/clientes', [ClienteApiController::class, 'Create']);
Route::get('/clientes/$id', [ClienteApiController::class, 'GetById']);
Route::put('/clientes', [ClienteApiController::class, 'Update']);
Route::delete('/clientes/$id', [ClienteApiController::class, 'Delete']);