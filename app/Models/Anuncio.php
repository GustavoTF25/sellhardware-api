<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncio';
    //public $timestamps = false;

    protected $fillable = [
       'titulo',
       'quantidade',
       'preco',
       'condicao_produto',
       'status_anuncio',
       'descricao',
       'media',
       'observacoes',
       'id_usuario',
       'id_produto'
    ];

    public function user()
    {
        return $this->belongsTo(related: User::class, foreignKey: 'id_usuario' ,ownerKey: 'id');
    }
}
