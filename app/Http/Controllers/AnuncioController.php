<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnuncioRequest;
use App\Http\Resources\AnuncioResource;
use App\Models\User;
use app\Models\Anuncio;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Request; 

class AnuncioController extends Controller
{
    public function store(StoreUpdateAnuncioRequest $request){
        $user = User::auth();
        $idUser = Auth::id();
        $data = $request->all();
        $data = $request->Produto->id;
        $data = $request->User->id;
        $anuncio = Anuncio::created($data);
     return new AnuncioResource($anuncio);
    }
}
