<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ComidaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//USUARIOS MANEJO
Route::post('/login', [UserController::class, 'login']);
Route::get('/users', [UserController::class, 'traertodos']);

// CRUD INGREDIENTES
Route::post('/registro', [UserController::class, 'registro']);
Route::get('/ingredients', [ComidaController::class, 'ingre']);
Route::post('/ingredients', [ComidaController::class, 'crear']);
Route::put('/ingredients/{id}', [ComidaController::class, 'actualiz']);
Route::delete('/ingredients/{id}', [ComidaController::class, 'elimi']);


//Usuario ver y actualizar perfil

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', [UserController::class, 'getProfile']);
    Route::put('/profile', [UserController::class, 'updateProfile']);
});
