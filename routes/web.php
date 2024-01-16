<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\LugarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/api/migrar-provincias', [ProvinciaController::class, 'migrarDatosProvincia']);

//Route::get('/api/migrar-lugares-Bizkaia', [LugarController::class, 'migrarDatosBizkaia']);

//Route::get('/api/migrar-lugares-Guipuzkoa', [LugarController::class, 'migrarDatosGuipuzkoa']);
