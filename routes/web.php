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

Route::get('/conseguirLugaresGuipuzkoa', function () {
    
    $response = Http::get('https://www.el-tiempo.net/api/json/v2/provincias/20/municipios');

    if ($response->successful()) {
        
        $data = $response->json();

            $filteredData = collect($data['municipios'])
            ->whereIn('CODIGOINE', ['20030000000','20029000000','20018000000','20071000000','20069000000','20045000000'])
            ->all();

        
        return response()->json($filteredData);
    } else {
        
        return response()->json(['error' => 'No se pudo obtener la información de las provincias'], 500);
    }
});
