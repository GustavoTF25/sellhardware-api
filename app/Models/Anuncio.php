<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncio';

    protected $fillable =
    [
        'quantidade',
        'condicao_produto',
        'status_anuncio',
        'descricao',
        'media',
        'id_usuario',
        'id_anuncio',

    ];
}
