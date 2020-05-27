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


/******************APIS FRONTEND***********************/

//Cidade:
Route::get('/cidades/index', 'ControllerCidade@index');
Route::get('cidades/show/{id}', 'ControllerCidade@show');  
Route::post('/cidades/update/{id}', 'ControllerCidade@update');


//Uf:
Route::resource('/ufs', 'ControllerUf');

//Avaliacoes:
Route::resource('/avaliacoes', 'ControllerAvaliacao');


/***********************PAGINATIONS***********************/

Route::get('/cidades/index_pagination', 'ControllerCidade@indexPagination');

