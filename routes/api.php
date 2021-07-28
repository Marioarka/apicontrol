<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\Api\EstacvController;
use App\Http\Controllers\Api\EstadomxController;
use App\Http\Controllers\Api\AlumnoapiController;
use App\Http\Controllers\AlumnoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|Route::middleware('auth:api')->get('/user', function (Request $request) {
|    return $request->user();
|});
|*/

Route::prefix('/user')->group(function(){
    Route::post('login', 'App\Http\Controllers\AlumnoController@login');
    Route::middleware('auth:api')->get('/estadocvlistado','App\Http\Controllers\Api\EstadocvController@mostrar');
    Route::middleware('auth:api')->get('/guardarestadocv','App\Http\Controllers\Api\EstadocvController@guardar');
    
});

Route::middleware('auth:api')->group(function () {
    Route::resource('estacv', EstacvController::class);
});
Route::middleware('auth:api')->group(function () {
    Route::resource('estadomx', EstadomxController::class);
});
Route::middleware('auth:api')->group(function () {
    Route::resource('alumno', AlumnoapiController::class);
});

 
