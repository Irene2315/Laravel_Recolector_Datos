<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProvinciaController;
 

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

Route::get('/conseguirProvincias', function () {
    // Realizar la solicitud GET
    $response = Http::get("https://www.el-tiempo.net/api/json/v2/provincias");

    
    if ($response->successful()) {
        // Obtener el contenido de la respuesta en formato JSON
        $data = $response->json();

        $filteredData = collect($data['provincias'])->where('CODAUTON', '16')->all();

        // Puedes hacer algo con los datos filtrados aquí
        return response()->json($filteredData);
    } else {
        // Manejar el caso en el que la solicitud no fue exitosa
        return response()->json(['error' => 'No se pudo obtener la información de las provincias'], 500);
    }
});





