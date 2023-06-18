<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
//use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class ProdutoController extends Controller
{
    
    public function index(){
        $produtos = Produto::all();
        return ProdutoResource::collection($produtos);
    }
    public function store(Request $request){
        $data = $request->all();
        $produto = Produto::create($data); 
        return new ProdutoResource($produto);
    }
    public function show(string $id){
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }
    public function update(Request $request, string $id){
        $produto = Produto::findOrFail($id);
        $data = $request->all();
        $produto->update($data);
        return new ProdutoResource($produto);
    }
    public function destroy(string $id){
        $produto = Produto::findOrFail($id);
        $produtos = $produto->$id;
        $produto->delete();
        $msg = ['message'=>'Produto apagado!'];
        return response()->json([$produtos], Response::HTTP_NO_CONTENT, $msg, 0);
        //return RedirectResponse()->with('message', 'Produto deletado com Sucesso!');
     }
     
}