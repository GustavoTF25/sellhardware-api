<?php

//use App\Http\Controllers\AuthController;
//use App\Http\Controllers\Auth\AuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuscaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnuncioController;




Route::apiResource('/sud', UserController::class); //SUD = Store, Update e Delete de Usuario
Route::post('/login', [AuthController::class, 'auth']);
Route::get('/pesquisa', [BuscaController::class, 'busca']);
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    //-----cadastro de produtos do adm--------
    Route::apiResource('/produtos', ProdutoController::class);
    //Route::patch('/cadproduto/{id}', [ProdutoController::class, 'altprod']);
    //Route::delete('/cadproduto/{id}', [ProdutoController::class, 'delprod']);
    //Route::get('/produtos', [ProdutoController::class, 'showprod']);
    //Route::get('/produtos/{id}', [ProdutoController::class, 'mostrarprod']);
    Route::post('/anunciar', [AnuncioController::class, 'store']);
    });



// Route::delete('/users/{id}', [UserController::class, 'apagar']);
// Route::patch('/users/{id}', [UserController::class, 'update']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);

Route::get('/', function () {
    return response()->json(['Usuario Não Encontrado' => true]);
});



