<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    // Tornando as colunas editáveis e incrementáveis - Processo do dashboard
    protected $fillable = [
        'nomeCliente',
        'fotoCliente',
        'sobrenomeCliente',
        'emailCliente',
        'telefoneCliente',
        'enderecoCliente',
        'qntCortesCliente',
        'statusCliente',
    ];

    // Identificação de usuario - Processo de login
    public function usuario(){
        return $this->morphOne(Usuario::class,'tipo_usuario');
    }
    public function Regras(){
    return[
        // 'nomeFuncionario' => 'required|min:3',
        // 'fotoAluno' => 'required'
    //     'fotoFuncionario' => 'required|file|mimes:png,jpg',
    //     'sobrenomeFuncionario' => 'required',
    //     'numeroFuncionario' => 'required',
    //     'emailFuncionario' => 'required',
    //     'especialidadeFuncionario' => 'required',
    //     'inicioExpedienteFuncionario' => 'required',
    //     'fimExpedienteFuncionario' => 'required',
    //     'cargoFuncionario' => 'required',
    //     'qntCortesFuncionario' => 'required',
    //     'statusFuncionario' => 'required'
    'fotoCliente' => 'required|file|mimes:png,jpg'
    ];
}

public function Feedback(){
    return[
        'required' => 'O campo :attribute é obrigatório',
        'fotoCliente.mimes' => 'O arquivo deve ser uma imagem PNG ou JPG'
        // 'nomeFuncionario.unique' => 'O nome do serviço já existe',
        // 'nomeFuncionario.min' => 'O nome do serviço deve ter mais de 3 caracteres'
        ];
}

public function cliente()
{
    return $this->hasMany(Agendamento::class, 'cliente_id');
}


}
