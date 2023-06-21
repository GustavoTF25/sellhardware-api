<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Verificação de dados inseridos do usuário
     */
    public function auth(AuthRequest $request){
        
    $credenciais = $request->only(['email', 'senha']);

    $user = User::where('email', $request->email)->first();
    /**
     * Se algum campo for nulo ou a senha não bater, retorna falso
     */
    if(!$user || ! Hash::check($request->senha, $user->senha)){
        
            return response()->json(['response' => false]);

        /*throw ValidationException::withMessages([
            'email' => ['O usuário não foi encontrado, confira se o email e a senha estão corretos']]
        );*/

        
    }else{
        return response()->json(['response' => true]);
    }
    
    return response()->json(['fail' => false]);

    }

    /**
     * Revoga o token do Usuário
     */
    public function logout(Request $request){
        
        $request->user()->tokens()->delete();
        return response()->json([
            'mensagem' => 'Você foi deslogado do sistema',
    
        ]);
    }
}
