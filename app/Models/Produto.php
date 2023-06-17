<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $table = 'produto';
    public $timestamps = false;

    protected $fillable = [
        'componente',
        'fabricante',
        'marca',
        'modelo',
        'categoria',
        'tipo',
        'capacidade'
        
    ];
    public function anuncio()
    {
        return $this->hasMany(related: Anuncio::class, foreignKey: 'id_produto', localKey: 'id');
    }
}
