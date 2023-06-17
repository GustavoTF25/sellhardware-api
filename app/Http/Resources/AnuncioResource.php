<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnuncioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identify' => $this->id,
            'quantidade' => $this->quantidade,
            'condicao_produto' => $this->condicao_produto,
            'status_anuncio' => $this->status_anuncio,
            'descricao' => $this->descricao,
            'media' => $this->media,
            'id_usuario' =>$this->id_usuario,
            'id_produto' => $this->id_produto
        ];
    }
}
