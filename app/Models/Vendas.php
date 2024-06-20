<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';

    protected $fillabel = [
        'nomeVenda',
        'valorVenda',
        'qntVenda',
        'descricaoVenda',
        'idFuncionario'
    ];




    public function rules()
    {
        return [
            'nomeVenda' => 'required',
            'valorVenda'=> 'required',
            'qntVenda'=>'required',
            'descricaoVenda' =>'required',
            'idFuncionario' =>'required'
        ];
    }


    public function feedback(){
        return[
            'required'=>'O campo :attribute precisa ser preenchido'
        ];
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionario');
    }


}
