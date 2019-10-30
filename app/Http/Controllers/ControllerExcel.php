<?php

namespace App\Http\Controllers;


use App\Exports\CidadesExport;
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
}
