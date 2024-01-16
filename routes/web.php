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



//https://api.openweathermap.org/data/2.5/weather?lat=43.3374&lon=-1.7885&appid=6d436ee157588ac7925207ca597a01a9

Route::get('/conseguirPronosticoTiempoReal', function () {
    
    $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=43.3374&lon=-1.7885&appid=6d436ee157588ac7925207ca597a01a9');

    if ($response->successful()) {
        
        $data = $response->json();

        // Acceder a los campos 'wind' y 'main' directamente
        $windData = $data['wind'];
        $mainData = $data['main'];
        $weatherData = $data['weather'];

        // Combinar los datos en un solo array
        $filteredData = [
            'wind' => $windData,
            'main' => $mainData,
            'weather' => $weatherData,
        ];

        return response()->json($filteredData);
    } else {
        
        return response()->json(['error' => 'No se pudo obtener la información del pronóstico del tiempo'], 500);
    }
});