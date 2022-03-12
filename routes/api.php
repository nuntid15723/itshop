<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// API Authentication
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

// Public
Route::get('/product', [\App\Http\Controllers\Productcontroller::class, 'Index']);
Route::get('/product/show/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::get('/product/search/{name}',[\App\Http\Controllers\ProductController::class, 'search']);

// Protect
Route::middleware('auth:sanctum')->post('/product/store', [\App\Http\Controllers\ProductController::class, 'store']);
Route::middleware('auth:sanctue')->post('/product/update', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/product/(id)', [\App\Http\Controllers\ProductController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});