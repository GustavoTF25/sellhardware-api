<?php

namespace App\Http\Controllers;
use App\Http\Controllers\darErro;
use App\Http\Requests\BuscaRequest;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class BuscaController extends Controller
{
    public function busca(Request $request)
    {
        $query = Anuncio::query();



        if ($request->has('titulo')) {
            $query->where('titulo', 'LIKE', '%' . $request->titulo . '%');
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