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
            'Fabricante' => $this->fabricante,
            'Marca'=> $this->marca,
            'Modelo' => $this->modelo,
            'Categoria' => $this->categoria,
            'Tipo' => $this->tipo,
            'Capacidade' => $this->capacidade, 
            'observacoes' => $this->observacoes
        ];
    }
}
