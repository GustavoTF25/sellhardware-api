<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
 /**Retorna todos os produtos cadastrados no sistema */   
    public function index(){
        $produtos = Produto::all();
        return ProdutoResource::collection($produtos);
    }

    /**
     * Guarda as informações do produto no Banco
     */
    public function store(StoreUpdateProdutoRequest $request){
        $data = $request->all();
        $produto = Produto::create($data); 
        return new ProdutoResource($produto);
    }

    /**
     * Retorna um produto cadastrado por ID
     */
    public function show(string $id){
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }

    /**
     * Atualiza/Edita um produto que já esteja cadastrado
     */
    public function update(Request $request, string $id){
        $produto = Produto::findOrFail($id);
        $data = $request->all();
        $produto->update($data);
        return new ProdutoResource($produto);
    }

    /**
     * Apaga/Destroi um produto que esteja cadastrado no sistema
     */
    public function destroy(string $id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return response()->json([] , Response::HTTP_NO_CONTENT);
        
     }
     
}