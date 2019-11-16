<?php

namespace App\Http\Controllers;

use App\Avaliacao;
use App\Exports\CidadesExport;
use App\Exports\AvaliacoesExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\Request;

class ControllerExcel extends Controller
{

    /**
     * @return BinaryFileResponse
     */
    public function exportCidades()
    {
        return Excel::download(new CidadesExport, 'cidades.xlsx');
    
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function exportAvaliacoes(Request $request){
       // Log::debug('ID CITY'+ $request->id_cidade);
      // echo "FFF"+$request->id_cidade;
        return Excel::download(new AvaliacoesExport($request->id_cidade), 'avaliacoes.xlsx');
       
    }
}
