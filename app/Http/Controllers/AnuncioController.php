<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnuncioRequest;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Http\Resources\AnuncioResource;

class AnuncioController extends Controller
{
   //-----------RETORNA TODOS OS ANÚNCIOS CADASTRADOS-----------
    public function listarAnuncios()
    {
        $anuncio = Anuncio::all();
        return AnuncioResource::collection($anuncio);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

//---------------Cadastra determinado anuncio no sistema-----------
    public function store(Request $request){
        
        //$request['id_usuario'] = Auth()->user()->id;
            //$data = $request->produto()->id;
        //$AnuncioData = $request->user()->id; 
        
        $AnuncioData = $request->all(); 
        $user = auth()->user()->id; 
        $AnuncioData['id_usuario'] = $user;
        
            
        $anuncio = Anuncio::create($AnuncioData);
        //echo $AnuncioData;
        return new AnuncioResource($anuncio);
     }


//------------Retorna Um anuncio por ID-------------------
    public function show(Anuncio $anuncio)
    {
        $anuncior = Anuncio::findOrFail($anuncio->id);
        return new AnuncioResource($anuncior);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anuncio $anuncio)
    {
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $data = $request->all();
        $anuncio->update($data);
        return new AnuncioResource($anuncio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();
        return response()->json(['Anuncio Excluido!'], 204);
    }
    
    public function filtrarAnuncio(Request $request)
    {
        $query = Anuncio::query();

        if ($request->has('titulo')) {
            $query->where('titulo', 'LIKE',  $request->titulo . '%');
        }
        $produtos = $query->paginate();
        return $produtos;           
        
    }
}
