<?php

//use App\Http\Controllers\AuthController;
//use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuscaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnuncioController;

//----------------------Controle de Usuário----------------------------------
Route::post('/cadastroUsuario', [UserController::class, 'store']);
Route::get('/listarUsuario', [UserController::class, 'index']);
Route::get('/listarUsuario/{id}', [UserController::class, 'show' ]);
Route::delete('/deleteUsuario/{id}', [UserController::class, 'delete']);
Route::put('/alterarUsuario/{id}', [UserController::class, 'update']);
//------------------------------Busca e Login--------------------------------------
Route::post('/login', [AuthController::class, 'auth']);

//----------------------FILTRO DA LISTA DE ANUNCIOS-----------------------
Route::get('/filtroAnuncio', [AnuncioController::class, 'filtrarAnuncio']);
Route::get('filtroAnuncio/{id}',[AnuncioController::class, 'filtrarAnuncioid']);

//---------------------------Mostra todos os anuncios(geral ou ID)----------------------
Route::get('/listarAnuncios/{id}', [AnuncioController::class, 'show']);
Route::get('/listarAnuncios', [AnuncioController::class, 'listarAnuncios']);

//---------------Autenticação------------------------------------
Route::middleware(['auth:sanctum'])->group(function(){
//----------------Logout de Usuário--------------------
     Route::post('/logout', [AuthController::class, 'logout']);
//-------------------------Controle de Produtos-----------------------------------
    Route::post('/cadastroProduto', [ProdutoController::class, 'store']);
    Route::delete('/deleteProduto', [ProdutoController::class, 'delete']);
    Route::put('/alterarProduto', [ProdutoController::class, 'update']);
    Route::get('/listarProdutos', [ProdutoController::class, 'index']);
    Route::get('/listarProdutos/{id}', [ProdutoController::class, 'show']);
//------------------------Controle de Anuncios-----------------------------
    Route::post('/criarAnuncio', [AnuncioController::class, 'store']);

});


//------------------RAIZ-----------------------
Route::get('/', function () {
    return response()->json(['Sucesso' => true]);
});



