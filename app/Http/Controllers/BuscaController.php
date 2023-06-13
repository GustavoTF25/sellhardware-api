<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\darErro;
//use App\Http\Requests\BuscaRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
//use Illuminate\Contracts\Database\Eloquent\Builder;
//use Illuminate\Http\Client\Request as ClientRequest;
//use Illuminate\Http\Client\RequestException;
//use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Redis;

class BuscaController extends Controller
{
    public function busca(Request $request)
    {
        $query = Produto::query();
        if ($request->has('componente')) {
            $query->where('componente', 'LIKE', '%' . $request->componente . '%');
        }
    
        if ($request->has('modelo')) {
            $query->where('modelo', 'LIKE', '%' . $request->modelo . '%');
        }
    
        if ($request->has('fabricante')) {
            $query->where('fabricante', 'LIKE', '%' . $request->fabricante . '%');
        }
            
        if ($request->has('marca')) {
            $query->where('marca', 'LIKE', '%' . $request->marca . '%');
        }
   
        if ($request->has('tipo')) {
            $query->where('tipo', 'LIKE', '%' . $request->tipo . '%');
        }

        $produtos = $query->paginate();
    
        return $produtos;

            //return response()->json([], Response::HTTP_NOT_FOUND);
        }
    }


//$data = request(Produto::query());
       /* if ($request->has('modelo')) {
            $query = Produto::where('modelo', 'LIKE', '%'.$request->modelo.'%');
            
        }else{
            BuscaController::darErro();
        }
        $produtos = $query->paginate();
        if(empty($produtos->items())){
            return BuscaController::darErro();
        }
    
        //echo $produtos;
        return $produtos->items(); 
    }
    public function darErro(){
    $data = ['message' => 'Item não encontrado'];
    return response()->json($data, Response::HTTP_NOT_FOUND);
    }*/