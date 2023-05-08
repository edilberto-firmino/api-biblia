<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\VersiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request)
{
    return $request->user();
});

Route::post('/register',[AuthController::class, 'register']);

Route::apiResource('versiculo',VersiculoController::class);
Route::apiResource('testamento',TestamentoController::class);
Route::apiResource('livro',LivroController::class);


Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
