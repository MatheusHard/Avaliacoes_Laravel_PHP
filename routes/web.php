<?php

use App\Exports\CidadesExport;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/cidades', 'ControllerCidade@indexView');
Route::get('/cidades/novo', 'ControllerCidade@create');
Route::post('/cidades', 'ControllerCidade@store');
Route::get('cidades/apagar/{id}', 'ControllerCidade@destroy');   
Route::get('cidades/editar/{id}', 'ControllerCidade@edit');  
Route::post('/cidades/{id}', 'ControllerCidade@update');





Route::get('avaliacoes', 'ControllerAvaliacao@indexView');
Route::get('/avaliacoes/novo', 'ControllerAvaliacao@create');
Route::get('avaliacoes/mostrar/{id}', 'ControllerAvaliacao@show');


/**************************ROTAS EXCEL**************************/

Route::get('/excel/cidades', 'ControllerExcel@exportCidades');
Route::get('/excel/avaliacoes/{id}', 'ControllerExcel@exportAvaliacoes');











