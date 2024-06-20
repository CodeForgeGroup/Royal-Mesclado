<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $hidden = ['senha',];
    protected $fillable = ['nome', 'email', 'senha','tipo_usuario_id','tipo_usuario_type', 'email_verificado_em', 'token_lembrete'];


    public function tipo_usuario(){
        return $this->morphTo('tipo_usuario', 'tipo_usuario_type', 'tipo_usuario_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->token_lembrete = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        });
    }
}
