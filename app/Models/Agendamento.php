<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamento';

    protected $fillable = [
        'funcionario_id',
        'cliente_id',
        'servico_id',
        'horario_id',
        'dataAgendamento',
        'horarioInicial',
        'horarioFinal',
        'statusServico',
    ];




    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }


}

