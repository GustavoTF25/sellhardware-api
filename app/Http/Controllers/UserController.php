<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController extends Controller{

   /**
    * Retorna todos os usuários cadastrados no sistema
    */
public function index(){
    $users = User::all();
    return UserResource::collection($users);
 }

 /**
  * Adciona/Guarda o usuário novo no banco
  */
 public function store(StoreUpdateUserRequest $request){
    //$data = $request::all();
    $data = $request->all();
    //dd($data);
    $data['senha'] = Hash::make($request->senha);
    //dd($data);
    $user = User::create($data);
    return new UserResource($user);
 }
 /**
  * Retorna um usuário especifico por ID
  */
 public function show(string $id){
   $user = User::findOrFail($id);
   return new UserResource($user);
 }

 /**
  * Edita/Atualiza um determinado usuário no sistema
  */
public function edit(StoreUpdateUserRequest $request, string $id){
   $user = User::findOrFail($id);
   $data = $request->validated();
   //se o usuário desejar passar a senha para ser alterada
   if($request->senha)
   $data['senha'] = bcrypt($request->senha);
   $user->update($data);
   return new UserResource($user);
}

/**
 * Apaga um usuário especifico por ID
 */
public function destroy(string $id){
   $user = User::findOrFail($id);
   $user->delete();
   return response()->json([], 204);
}

}
