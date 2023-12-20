<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PreciosController;
use App\Http\Controllers\RegistroVentasDailyController;
use App\Http\Controllers\RegistroVentasWeeklyController;

// Ruta para iniciar sesión
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/users', [UserController::class, 'index']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/search/{field}/{query}', [UserController::class, 'search']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    Route::get('/clientes', [ClientesController::class, 'index']);
    Route::put('/clientes/{id}', [ClientesController::class, 'update']);
    Route::post('/clientes', [ClientesController::class, 'store']);
    Route::get('/clientes/search/{field}/{query}', [ClientesController::class, 'search']);
    Route::delete('/clientes/{id}', [ClientesController::class, 'destroy']);

    Route::get('/inventario', [InventarioController::class, 'index']); //problema
    Route::put('/inventario/{id}', [InventarioController::class, 'update']);
    Route::post('/inventario', [InventarioController::class, 'store']);
    Route::get('/inventario/search/{field}/{query}', [InventarioController::class, 'search']);
    Route::delete('/inventario/{id}', [InventarioController::class, 'destroy']);

    Route::get('/producto', [ProductoController::class, 'index']);
    Route::put('/producto/{id}', [ProductoController::class, 'update']);
    Route::post('/producto', [ProductoController::class, 'store']);
    Route::get('/producto/search/{field}/{query}', [ProductoController::class, 'search']);
    Route::delete('/producto/{id}', [ProductoController::class, 'destroy']);

    Route::get('/precios', [PreciosController::class, 'index']);
    Route::put('/precios/{id}', [PreciosController::class, 'update']);
    Route::post('/precios', [PreciosController::class, 'store']);
    Route::get('/precios/search/{field}/{query}', [PreciosController::class, 'search']);
    Route::delete('/precios/{id}', [PreciosController::class, 'destroy']);

    Route::post('/registro/daily', [RegistroVentasDailyController::class, 'store']);
    Route::put('/registro/daily/{id}', [RegistroVentasDailyController::class, 'update']);
    Route::delete('/registro/daily/{id}', [RegistroVentasDailyController::class, 'destroy']);
    Route::get('/registro/daily/search/{field}/{query}', [RegistroVentasDailyController::class, 'search']);
    Route::get('/registro/daily/view', [RegistroVentasDailyController::class, 'index']);

    Route::post('/registro/weekly', [RegistroVentasWeeklyController::class, 'store']);
    Route::put('/registro/weekly/{id}', [RegistroVentasWeeklyController::class, 'update']);
    Route::delete('/registro/weekly/{id}', [RegistroVentasWeeklyController::class, 'destroy']);
    Route::get('/registro/weekly/search', [RegistroVentasWeeklyController::class, 'search']);
    Route::get('/registro/weekly/view', [RegistroVentasWeeklyController::class, 'index']);

});

