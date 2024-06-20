<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiais extends Model
{
    protected $table = 'materiais';


    protected $fillabel = [
        'fotoMaterial',
        'nomeMaterial',
        'marcaMaterial',
        'fornecedorMaterial',
        'descricaoMaterial',
        'valorVendaMaterial',
        'valorCompraMaterial',
        'estoqueMaterial',
        'statusMaterial'
    ];

}
