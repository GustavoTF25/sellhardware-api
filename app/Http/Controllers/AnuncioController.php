<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnuncioRequest;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Http\Resources\AnuncioResource;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $user = auth()->user()->id;
        //$request['id_usuario'] = Auth()->user()->id;
            //$data = $request->produto()->id;
        //$AnuncioData = $request->user()->id; 
        
        $AnuncioData = $request->all();  
        $AnuncioData['id_usuario'] = $user;    
        $anuncio = Anuncio::create($AnuncioData);
        //echo $AnuncioData;
        return new AnuncioResource($anuncio);
     }


    /**
     * Display the specified resource.
     */
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anuncio $anuncio)
    {
        //
    }
}
