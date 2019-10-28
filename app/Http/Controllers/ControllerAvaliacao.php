<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Avaliacao;


class ControllerAvaliacao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $arrayAvaliacoes = DB::table('avaliacoes')
        ->join('cidades', 'avaliacoes.id_cidade', '=', 'cidades.id')
        ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
        ->select( 'avaliacoes.id',  'avaliacoes.radioSim_1','avaliacoes.radioNao_1','avaliacoes.radioMuito_2',
        'avaliacoes.radiobom_2','avaliacoes.radioRegular_2','avaliacoes.radioRuim_2','avaliacoes.radioSeguro_3','avaliacoes.radioPoucoSeguro_3',
        'avaliacoes.radioInseguro_3','avaliacoes.radioExcessiva_4','avaliacoes.radioRazoavel_4','avaliacoes.radioInsuficiente_4',
        'avaliacoes.radioMuito_5','avaliacoes.radiobom_5','avaliacoes.radioRegular_5','avaliacoes.radioRuim_5',
        'avaliacoes.radioMuito_6','avaliacoes.radiobom_6','avaliacoes.radioRegular_6','avaliacoes.radioRuim_6',
        'avaliacoes.radioMuito_7','avaliacoes.radiobom_7','avaliacoes.radioRegular_7','avaliacoes.radioRuim_7',
        'avaliacoes.radioMuito_8','avaliacoes.radiobom_8','avaliacoes.radioRegular_8','avaliacoes.radioRuim_8',
        'avaliacoes.radioMuito_9','avaliacoes.radiobom_9','avaliacoes.radioRegular_9','avaliacoes.radioRuim_9',
        'avaliacoes.radioMuito_10','avaliacoes.radiobom_10','avaliacoes.radioRegular_10','avaliacoes.radioRuim_10',
        'avaliacoes.descricao','avaliacoes.descricao','avaliacoes.cpf_agente','avaliacoes.nome_agente','avaliacoes.tipo_agente','avaliacoes.id_cidade',
        'avaliacoes.datahora','avaliacoes.created_at as avaliacoes_created_at','avaliacoes.updated_at as avaliacoes_updated_at',
        'cidades.id as cidade_id', 'cidades.descricao_cidade', 'cidades.created_at as cidades_updated_at', 'cidades.updated_at as cidades_updated_at', 
        'ufs.id as uf_id', 'ufs.descricao_uf', 'ufs.created_at as uf_created_at', 'ufs.updated_at as uf_updated_at')
        ->get();

        return json_encode($arrayAvaliacoes);

    }

    public function indexView()
    {               
        return view('avaliacoes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrayAvaliacoes = DB::table('avaliacoes')
        ->join('cidades', 'avaliacoes.id_cidade', '=', 'cidades.id')
        ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
        ->select( 'avaliacoes.id',  'avaliacoes.radioSim_1','avaliacoes.radioNao_1','avaliacoes.radioMuito_2',
        'avaliacoes.radiobom_2','avaliacoes.radioRegular_2','avaliacoes.radioRuim_2','avaliacoes.radioSeguro_3','avaliacoes.radioPoucoSeguro_3',
        'avaliacoes.radioInseguro_3','avaliacoes.radioExcessiva_4','avaliacoes.radioRazoavel_4','avaliacoes.radioInsuficiente_4',
        'avaliacoes.radioMuito_5','avaliacoes.radiobom_5','avaliacoes.radioRegular_5','avaliacoes.radioRuim_5',
        'avaliacoes.radioMuito_6','avaliacoes.radiobom_6','avaliacoes.radioRegular_6','avaliacoes.radioRuim_6',
        'avaliacoes.radioMuito_7','avaliacoes.radiobom_7','avaliacoes.radioRegular_7','avaliacoes.radioRuim_7',
        'avaliacoes.radioMuito_8','avaliacoes.radiobom_8','avaliacoes.radioRegular_8','avaliacoes.radioRuim_8',
        'avaliacoes.radioMuito_9','avaliacoes.radiobom_9','avaliacoes.radioRegular_9','avaliacoes.radioRuim_9',
        'avaliacoes.radioMuito_10','avaliacoes.radiobom_10','avaliacoes.radioRegular_10','avaliacoes.radioRuim_10',
        'avaliacoes.descricao','avaliacoes.cpf_agente','avaliacoes.nome_agente','avaliacoes.tipo_agente','avaliacoes.id_cidade',
        'avaliacoes.datahora', 'avaliacoes.descricao','avaliacoes.created_at as avaliacoes_created_at','avaliacoes.updated_at as avaliacoes_updated_at',
        'cidades.id as cidade_id', 'cidades.descricao_cidade', 'cidades.created_at as cidades_updated_at', 'cidades.updated_at as cidades_updated_at', 
        'ufs.id as uf_id', 'ufs.descricao_uf', 'ufs.created_at as uf_created_at', 'ufs.updated_at as uf_updated_at')
        ->where('avaliacoes.id', $id)
        ->get();

        if(isset($arrayAvaliacoes)){
           return json_encode($arrayAvaliacoes);
          }
          return response('Cidade não encontrada!!!', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
