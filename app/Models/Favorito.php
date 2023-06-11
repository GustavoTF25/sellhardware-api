<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favorito';

    protected $fillable = [
        'id_usuario',
        'id_anuncio'
    ];

}
