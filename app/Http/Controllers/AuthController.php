<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request){
        
        $credenciais = $request->only(['email', 'senha']);

    $user = User::where('email', $request->email)->first();
    if(!$user || ! Hash::check($request->senha, $user->senha)){
        throw ValidationException::withMessages([
            'email' => ['O usuário não foi encontrado, confira se o email e a senha estão corretos']]
        );

        
    }

    //logout em outros dispositivos
    //if ($request->has('logout_others_devices'))
    $user->tokens()->delete();

    $token = $user->createToken($request->email)->plainTextToken;
    return response()->json([
        'token' => $token,

    ]);
      
    }

    public function logout(Request $request){
        
        $request->user()->tokens()->delete();
        return response()->json([
            'mensagem' => 'Você foi deslogado do sistema',
    
        ]);
    }
}
