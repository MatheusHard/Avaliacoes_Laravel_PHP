<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = [
        'descricao_cidade', 'uf_id'
        ];
}
