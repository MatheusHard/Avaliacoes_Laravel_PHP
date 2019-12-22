<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $fillable = [
        'descricao_profissional', 'cpf_profissional', 'tipo_profissional', 
        'cidade_id'
    ];
}
