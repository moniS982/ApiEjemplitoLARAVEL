<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\RolController;
use App\Http\Controllers\API\CarreraController;
use App\Http\Controllers\API\MateriaController;
use App\Http\Controllers\API\GrupoController;
use App\Http\Controllers\API\AsignacionController;
use App\Http\Controllers\API\InscripcionController;
use App\Http\Controllers\API\CalificacionController;
use App\Http\Controllers\API\UsuarioRolController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return response()->json([
        'status' => 'API funcionando correctamente',
        'proyecto' => '---- '
    ]);
});

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('carreras', CarreraController::class);
Route::apiResource('materias', MateriaController::class);
Route::apiResource('grupos', GrupoController::class);
Route::apiResource('asignaciones', AsignacionController::class);
Route::apiResource('inscripciones', InscripcionController::class);
Route::apiResource('calificaciones', CalificacionController::class);
Route::apiResource('usuario-roles', UsuarioRolController::class);

// Esta ruta debe estar libre para probar la conexión
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json([
            "status" => "Conexión exitosa",
            "database" => DB::connection()->getDatabaseName()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => "Error de conexión",
            "error" => $e->getMessage()
        ], 500);
    }
});