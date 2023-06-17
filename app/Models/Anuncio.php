<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncio';
    //public $timestamps = false;

    protected $fillable = [
       'titulo',
       'quantidade',
       'condicao_produto',
       'status_anuncio',
       'media',
       'observacoes'
    ];

    public function user()
    {
        return $this->belongsTo(related: User::class, foreignKey: 'id_usuario' ,ownerKey: 'id');
    }
    public function produto()
    {
        return $this->belongsTo(related: Produto::class, foreignKey: 'id_produto', ownerKey:'id' );
    }
}
