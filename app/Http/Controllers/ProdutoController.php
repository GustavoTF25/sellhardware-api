<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
//use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    
    public function showprod(){
        $produtos = Produto::all();
        return ProdutoResource::collection($produtos);
    }
    public function addproduto(Request $request){
        $data = $request->all();
        $produto = Produto::create($data); 
        return new ProdutoResource($produto);
    }
    public function mostrarprod(string $id){
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }
    public function altprod(Request $request, string $id){
        $produto = Produto::findOrFail($id);
        $data = $request->all();
        $produto->update($data);
        return new ProdutoResource($produto);
    }
    public function delprod(string $id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
        //$msg = ['message'=>'Produto apagado!'];
        return response()->json([], Response::HTTP_NO_CONTENT);
        //return RedirectResponse('')->with('message', 'Produto deletado com Sucesso!');
     }
     
}