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
        ->select( 'avaliacoes.id', 'avaliacoes.radioSim_1','avaliacoes.radioNao_1','avaliacoes.radioMuito_2',
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
        try {

            DB::table('avaliacoes')->insert([
               ['radioSim_1' => $request->input('radioSim_1'),
                'radioNao_1' => $request->input('radioNao_1'),
               
                'radioMuito_2' => $request->input('radioMuito_2'),
                'radiobom_2' => $request->input('radiobom_2'),
                'radioRegular_2' => $request->input('radioRegular_2'),
                'radioRuim_2' => $request->input('radioRuim_2'),
               
                'radioSeguro_3' => $request->input('radioSeguro_3'),
                'radioPoucoSeguro_3' => $request->input('radioPoucoSeguro_3'),
                'radioInseguro_3' => $request->input('radioInseguro_3'),
                
                'radioExcessiva_4' => $request->input('radioExcessiva_4'),
                'radioRazoavel_4' => $request->input('radioRazoavel_4'),
                'radioInsuficiente_4' => $request->input('radioInsuficiente_4'),
               
                'radioMuito_5' => $request->input('radioMuito_5'),
                'radiobom_5' => $request->input('radiobom_5'),
                'radioRegular_5' => $request->input('radioRegular_5'),
                'radioRuim_5' => $request->input('radioRuim_5'),

                'radioMuito_6' => $request->input('radioMuito_6'),
                'radiobom_6' => $request->input('radiobom_6'),
                'radioRegular_6' => $request->input('radioRegular_6'),
                'radioRuim_6' => $request->input('radioRuim_6'),

                'radioMuito_7' => $request->input('radioMuito_7'),
                'radiobom_7' => $request->input('radiobom_7'),
                'radioRegular_7' => $request->input('radioRegular_7'),
                'radioRuim_7' => $request->input('radioRuim_7'),

                'radioMuito_8' => $request->input('radioMuito_8'),
                'radiobom_8' => $request->input('radiobom_8'),
                'radioRegular_8' => $request->input('radioRegular_8'),
                'radioRuim_8' => $request->input('radioRuim_8'),
                
                'radioMuito_9' => $request->input('radioMuito_9'),
                'radiobom_9' => $request->input('radiobom_9'),
                'radioRegular_9' => $request->input('radioRegular_9'),
                'radioRuim_9' => $request->input('radioRuim_9'),

                'radioMuito_10' => $request->input('radioMuito_10'),
                'radiobom_10' => $request->input('radiobom_10'),
                'radioRegular_10' => $request->input('radioRegular_10'),
                'radioRuim_10' => $request->input('radioRuim_10'),

                'descricao' => $request->input('descricao'),
                'id_cidade' => $request->input('id_cidade'),
                'nome_agente' => $request->input('nome_agente'),
                'tipo_agente' => $request->input('tipo_agente'),
                'datahora' => $request->input('datahora'),
                'cpf_agente' => $request->input('cpf_agente')

                 ]
            ]);

            return ['insert' => 'ok'];

        } catch(\Exception $erro) {

            return ['insert' => $erro];
        }}
   
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
