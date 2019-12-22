<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable = [

        'radioSim_1', 'radioNao_1',
        
        'radioMuito_2','radiobom_2', 'radioRegular_2','radioRuim_2',
    
        'radioSeguro_3','radioPoucoSeguro_3','radioInseguro_3',

        'radioExcessiva_4','radioRazoavel_4','radioInsuficiente_4',

        'radioMuito_5','radiobom_5','radioRegular_5','radioRuim_5',
    
        'radioMuito_6','radiobom_6','radioRegular_6','radioRuim_6',

        'radioMuito_7','radiobom_7','radioRegular_7','radioRuim_7',

        'radioMuito_8','radiobom_8','radioRegular_8','radioRuim_8',

        'radioMuito_9','radiobom_9','radioRegular_9','radioRuim_9',

        'radioMuito_10','radiobom_10','radioRegular_10','radioRuim_10',

        'descricao', 'datahora', 'profissional_id'

    ];
}
