<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['nomeServico','fotoServico','valorServico','descricaoServico', 'duracaoServico'];

    public function Regras(){
        return[
            'nomeServico' => 'required|unique:servicos,nomeServico,'.$this->id.'|min:3',
            // 'fotoAluno' => 'required'
            'fotoServico' => 'required|file|mimes:png,jpg',
            'duracaoServico' => 'required',
            'descricaoServico' => 'required',
            'valorServico' => 'required'
        ];
    }

    public function Feedback(){
        return[
            'required' => 'O campo :attribute é obrigatório',
            'fotoServico.mimes' => 'O arquivo deve ser uma imagem PNG ou JPG',
            'nomeServico.unique' => 'O nome do serviço já existe',
            'nomeServico.min' => 'O nome do serviço deve ter mais de 3 caracteres'
            ];
        }

        public function servico()
        {
            return $this->hasMany(Agendamento::class, 'servico_id');
        }
}
