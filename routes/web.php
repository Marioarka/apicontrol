<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\DiscapacidadController;
use App\Http\Controllers\AlumnoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('estado', EstadoController::class);
Route::resource('municipio', MunicipioController::class);
Route::resource('estadocivil', EstadoCivilController::class);
Route::resource('discapacidad', DiscapacidadController::class);
Route::resource('alumno', AlumnoController::class);
