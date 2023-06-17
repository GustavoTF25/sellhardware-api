<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
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
            'componente' => strtoupper($this->componente),
            'fabricante' => $this->fabricante,
            'marca'=> $this->marca,
            'modelo' => $this->modelo,
            'categoria' => $this->categoria,
            'tipo' => $this->tipo,
            'capacidade' => $this->capacidade
            //'observacoes' => $this->observacoes
        ];
    }
}
