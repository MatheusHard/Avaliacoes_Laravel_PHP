<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cidade;
use App\Uf;


class ControllerCidade extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
               
        $arrayCidades = DB::table('cidades')
            ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
            ->select('cidades.id', 'cidades.descricao_cidade', 'cidades.uf_id', 'ufs.descricao_uf')
            ->get();

        return json_encode($arrayCidades);
    
    }
    
    public function indexView()
    {
               
        $arrayCidades = DB::table('cidades')
            ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
            ->select('cidades.id', 'cidades.descricao_cidade', 'cidades.uf_id', 'ufs.descricao_uf')
            ->get();

        return view('cidades', compact(['arrayCidades']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayUfs = Uf::all()->sortBy("descricao_uf");
        return view('novacidade',  compact(['arrayUfs']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cidade = new Cidade();
      $cidade->descricao_cidade = $request->input('descricao_cidade');
      $cidade->uf_id = $request->input('uf_id');
      $cidade->save();
      return json_encode($cidade);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cidade = Cidade::find($id);
        if(isset($cidade)){
           return json_encode($cidade);
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
        $arrayUfs = Uf::all()->sortBy("descricao_uf");
        $cidade = Cidade::find($id);

        if(isset($cidade)){
        return view('editarcidade', compact(['cidade'], ['arrayUfs']));
        }
    return view('cidades');
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
      $cidade = Cidade::find($id);
      
      if(isset($cidade)){
          $cidade->descricao_cidade = $request->descricao_cidade;
          $cidade->uf_id = $request->uf_id;
          $cidade->save();
          return json_encode($cidade);
        }

        return response('Cidade não encontrada!!!', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidade = Cidade::find($id);
        if(isset($cidade)){
            $cidade->delete();
            return response('OK', 200);
        }
        return response('Cidade não encontrada!!!', 404);
    }

    /******API******/

    public function indexAPIJsonCidades()
    {
        $arrayUfs = Uf::all()->sortBy("descricao_uf");
               
        $arrayCidades = DB::table('cidades')
            ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
            ->select('cidades.id', 'cidades.descricao_cidade', 'cidades.uf_id', 'ufs.descricao_uf')
            ->get();

        return json_encode($arrayCidades);
        }

       


}
