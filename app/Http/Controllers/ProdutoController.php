<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    
    public function produtos(){
        $produtos = Produto::all();
        return ProdutoResource::collection($produtos);
    }
    public function cadproduto(Request $request){
        $data = $request->all();
        $produto = Produto::create($data); 
        return new ProdutoResource($produto);
    }
    public function mostrarprod(string $id){
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }
    public function upprod(Request $request, string $id){
        $produto = Produto::findOrFail($id);
        $data = $request->all();
        $produto->update($data);
        return new ProdutoResource($produto);
    }
}