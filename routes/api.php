<?php

use Illuminate\Http\Request;
use App\Exports\AvaliacoesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*****************APIS ANDROID*****************/

//Cidades
Route::post('/cidades/index_api', 'ControllerCidade@indexAPIAndroidCidades');
Route::post('/cidades/store_api', 'ControllerCidade@store');

//Ufs
Route::post('/ufs/index_api', 'ControllerUf@indexAPIAndroidUfs');

//Avaliações
Route::post('/avaliacoes/store_api', 'ControllerAvaliacao@store');

/******************APIS BLADE***********************/

Route::resource('/cidades', 'ControllerCidade');
Route::resource('/ufs', 'ControllerUf');
Route::resource('/avaliacoes', 'ControllerAvaliacao');

//Route::post('/excel/avaliacoes', 'ControllerAvaliacao@exportAvaliacoes');

Route::post('/excel/avaliacoes', function (Request $request) {
    return Excel::download(new AvaliacoesExport($request->id_cidade), 'avaliacoes.xlsx');

});

//Relizado o import pra funcionar:
//use Illuminate\Support\Facades\Route;



