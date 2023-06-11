<?php

//use App\Http\Controllers\AuthController;
//use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




Route::post('/login', [AuthController::class, 'auth']);
Route::apiResource('/sud', UserController::class); //SUD = Store, Update e Delete
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/cadproduto', [ProdutoController::class, 'cadproduto']);
    //Route::get('/cadproduto', [ProdutoController::class, 'produtos']);
    });

// Route::delete('/users/{id}', [UserController::class, 'apagar']);
// Route::patch('/users/{id}', [UserController::class, 'update']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);

Route::get('/', function () {
    return response()->json(['Sucesso' => true]);
});



