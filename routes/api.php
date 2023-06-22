<?php
/* 

ARQUIVO DE ROTAS/ENDPOINTS SELLHARDWARE


*/

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
Route::put('/alterarUsuario/{id}', [UserController::class, 'edit']);
//------------------------------Login--------------------------------------
Route::post('/login', [AuthController::class, 'auth']);

//----------------------FILTRO DA LISTA DE ANUNCIOS-----------------------
Route::get('/filtrarAnuncio', [AnuncioController::class, 'filtrarAnuncio']);
Route::get('/filtrarAnuncio/{id}',[AnuncioController::class, 'show']);

//---------------------------Mostra todos os anuncios(geral ou ID)----------------------
Route::get('/listarAnuncio/{id}', [AnuncioController::class, 'show']);
Route::get('/listarAnuncio', [AnuncioController::class, 'listarAnuncios']);
Route::post('/criarAnuncio', [AnuncioController::class, 'store']);
Route::post('/cadastroProduto', [ProdutoController::class, 'store']);
//---------------Autenticação------------------------------------
Route::middleware(['auth:sanctum'])->group(function(){
//----------------Logout de Usuário--------------------
     Route::post('/logout', [AuthController::class, 'logout']);
//-------------------------Controle de Produtos-----------------------------------
   
    Route::delete('/deleteProduto', [ProdutoController::class, 'delete']);
    Route::put('/alterarProduto', [ProdutoController::class, 'update']);
    Route::get('/listarProdutos', [ProdutoController::class, 'index']);
    Route::get('/listarProdutos/{id}', [ProdutoController::class, 'show']);
//------------------------Controle de Anuncios-----------------------------


});

//------------------RAIZ-----------------------
Route::get('/', function () {
    return response()->json(['Sucesso' => true]);
});



