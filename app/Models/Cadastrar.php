<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastrar extends Model
{
    protected $table = 'cadastrar';

    protected $fillabel = [
        'nomeCadastrar',
        'sobrenomeCadastrar',
        'emailCadastrar',
        'senhaCadastrar',
        'telefoneCadastrar',
        'enderecocadastrar',
    ];

}
