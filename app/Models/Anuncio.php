<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncio';
    //public $timestamps = false;

  

/*public function relacao(){
    return $this->belongsToMany('nome', 'users_id', 'produto_id');


}*/
 

    protected $fillable = [
       'nome_anuncio'
    ];


}
