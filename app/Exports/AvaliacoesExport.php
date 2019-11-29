<?php

namespace App\Exports;

use App\Avaliacao;
use App\Cidade;
use App\Uf;
use Exception;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;




use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class AvaliacoesExport implements FromCollection
{
    use Exportable;

    protected $id_cidade;

    public function __construct($id_city)
    {
        $this->id_cidade = $id_city;
        
    }
    

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
 
     $this->a = new Avaliacao();
     $arrayAvaliacoes = DB::table('avaliacoes')
     ->join('cidades', 'avaliacoes.id_cidade', '=', 'cidades.id')
     ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
     ->select( 'avaliacoes.id', 'avaliacoes.radioSim_1','avaliacoes.radioNao_1','avaliacoes.radioMuito_2',
     'avaliacoes.radiobom_2','avaliacoes.radioRegular_2','avaliacoes.radioRuim_2','avaliacoes.radioSeguro_3','avaliacoes.radioPoucoSeguro_3',
     'avaliacoes.radioInseguro_3','avaliacoes.radioExcessiva_4','avaliacoes.radioRazoavel_4','avaliacoes.radioInsuficiente_4',
     'avaliacoes.radioMuito_5','avaliacoes.radiobom_5','avaliacoes.radioRegular_5','avaliacoes.radioRuim_5',
     'avaliacoes.radioMuito_6','avaliacoes.radiobom_6','avaliacoes.radioRegular_6','avaliacoes.radioRuim_6',
     'avaliacoes.radioMuito_7','avaliacoes.radiobom_7','avaliacoes.radioRegular_7','avaliacoes.radioRuim_7',
     'avaliacoes.radioMuito_8','avaliacoes.radiobom_8','avaliacoes.radioRegular_8','avaliacoes.radioRuim_8',
     'avaliacoes.radioMuito_9','avaliacoes.radiobom_9','avaliacoes.radioRegular_9','avaliacoes.radioRuim_9',
     'avaliacoes.radioMuito_10','avaliacoes.radiobom_10','avaliacoes.radioRegular_10','avaliacoes.radioRuim_10',
     'avaliacoes.descricao', 'avaliacoes.cpf_agente','avaliacoes.nome_agente','avaliacoes.tipo_agente','avaliacoes.id_cidade',
     'avaliacoes.datahora','avaliacoes.created_at as avaliacoes_created_at','avaliacoes.updated_at as avaliacoes_updated_at',
     'cidades.id as cidade_id', 'cidades.descricao_cidade', 'cidades.created_at as cidades_updated_at', 'cidades.updated_at as cidades_updated_at', 
     'ufs.id as uf_id', 'ufs.descricao_uf', 'ufs.created_at as uf_created_at', 'ufs.updated_at as uf_updated_at')
     ->where('avaliacoes.id_cidade', $this->id_cidade)
     ->get();
     
     //return dd('yeah', $arrayAvaliacoes);
     return $arrayAvaliacoes;
 }


  
}

