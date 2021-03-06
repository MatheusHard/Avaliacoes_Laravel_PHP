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

Route::get('/cidades', 'ControllerCidade@index');
Route::get('/cidades/novo', 'ControllerCidade@create');
Route::post('/cidades', 'ControllerCidade@store');
Route::get('cidades/apagar/{id}', 'ControllerCidade@destroy');   
Route::get('cidades/editar/{id}', 'ControllerCidade@edit');  
Route::post('/cidades/{id}', 'ControllerCidade@update');



//Route::get('/cidades/excel', 'ControllerCidade@export');


Route::get('avaliacoes', 'ControllerAvaliacao@index');
Route::get('/avaliacoes/novo', 'ControllerAvaliacao@create');

//Relatorios Excel:
Route::get('/cidades/excel', function () {
    return Excel::download(new CidadesExport, 'cidades.xlsx');
});




