<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller{

public function index(){
      //return[];
    $users = User::all();
    return UserResource::collection($users);

 }

 



 public function store(StoreUpdateUserRequest $request){
   

    //$data = $request::all();
    $data = $request->all();
    $data['senha'] = bcrypt($request->senha);
    //dd($data);
    $user = User::create($data);

    return new UserResource($user);


 }

 public function show(string $id){
  
   //$user = User::find($id);
   //$user = User::where('id', '=' $id)->first();

   $user = User::findOrFail($id);
   return new UserResource($user);

   /*if (!$user){
      return response()->json(['message' => 'usuario nao encontrado'], Response::NOT_FOUND)
   }*/
 }

public function update(StoreUpdateUserRequest $request, string $id){

   $user = User::findOrFail($id);

   $data = $request->validated();
   if($request->senha)
   $data['senha'] = bcrypt($request->senha);

   $user->update($data);

   return new UserResource($user);
}

public function apagar(string $id){
   $user = User::findOrFail($id);
   $user->delete();

   return response()->json([], 204);
}

}
