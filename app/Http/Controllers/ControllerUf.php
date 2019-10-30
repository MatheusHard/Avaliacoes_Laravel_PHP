<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Uf;


class ControllerUf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function indexView()
    {
       
    }
    
    public function index()
      {

        //$arrayUfs = Uf::all()->sortBy("descricao_uf");
        $arrayUfs = DB::table('ufs')->select('id','descricao_uf')->get();
     
        return response()->json($arrayUfs);    
       
        /*$data = (array('ufs' => $arrayUfs));
        return response()->json($data);    
    */
        //return response($arrayUfs, 200)
          //    ->header('Content-Type', 'application/json');
       }


    public function indexAPIAndroidUfs()
    {

      $arrayUfs = DB::table('ufs')->select('id','descricao_uf')->get();
   
      return response()->json($arrayUfs);    
  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uf = Uf::create($request->all());

        return response()->json($uf, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
