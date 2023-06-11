<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Http\Response;

class BuscaController extends Controller
{
    public function busca(Request $request)
    {
        $query = Produto::query();

        if ($request->has('modelo')) {
            $query = Produto::where('modelo', 'LIKE', '%' . $request->modelo . '%');
        }
           // Produto::findOrFail($query);
        $produtos = $query->paginate();
    
        return $produtos; 
    }

    
}
