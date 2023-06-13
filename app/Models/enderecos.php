<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enderecos extends Model
{
    use HasFactory;
    
    protected $table = 'endereco';
    public $timestamps = false;

    protected $fillable = [
        'rua',
        'bairro',
        'cidade',
        'estado'
    ];

}
