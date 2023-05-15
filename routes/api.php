<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\VersiculoController;
use Illuminate\Support\Facades\Route;


Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);

Route::group(['middleware'=>['auth:sanctum']], function(){

    Route::apiResources([
        'versiculo'=>VersiculoController::class,
        'testamento'=>TestamentoController::class,
        'livro'=>LivroController::class
    ]);


});


