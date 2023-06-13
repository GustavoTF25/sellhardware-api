<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    public function endereco(){
        return $this->belongsTo('App\enderecos', 'id_endereco');
    }
    protected $table = 'produto';
    public $timestamps = false;

    protected $fillable = [
        'componente',
        'fabricante',
        'marca',
        'modelo',
        'categoria',
        'tipo',
        'capacidade',
        'observacoes'
    ];

}
