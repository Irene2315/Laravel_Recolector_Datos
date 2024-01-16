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

//Route::get('/api/migrar-provincias', [ProvinciaController::class, 'migrarDatosDesdeAPI']);




Route::get('/conseguirLugares', function () {
    // Realizar la solicitud GET
    $response = Http::get('https://www.el-tiempo.net/api/json/v2/provincias/48/municipios');

    // Verificar si la solicitud fue exitosa (código de estado 200)
    if ($response->successful()) {
        // Obtener el contenido de la respuesta en formato JSON
        $data = $response->json();

            $filteredData = collect($data['municipios'])
            ->whereIn('CODIGOINE', ['48020000000', '48017000000'])
            ->all();

        // Puedes hacer algo con los datos aquí, por ejemplo, devolverlos como respuesta
        return response()->json($filteredData);
    } else {
        // Manejar el caso en el que la solicitud no fue exitosa
        return response()->json(['error' => 'No se pudo obtener la información de las provincias'], 500);
    }
});

