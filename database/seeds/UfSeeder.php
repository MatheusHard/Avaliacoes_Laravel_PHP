<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('ufs')->insert(['descricao_uf' => '']);
       DB::table('ufs')->insert(['descricao_uf' => 'AC']);
       DB::table('ufs')->insert(['descricao_uf' => 'AL']);
       DB::table('ufs')->insert(['descricao_uf' => 'AP']);
       DB::table('ufs')->insert(['descricao_uf' => 'AM']);
       DB::table('ufs')->insert(['descricao_uf' => 'BA']);
       DB::table('ufs')->insert(['descricao_uf' => 'CE']);
       DB::table('ufs')->insert(['descricao_uf' => 'DF']);
       DB::table('ufs')->insert(['descricao_uf' => 'ES']);
       DB::table('ufs')->insert(['descricao_uf' => 'GO']);
       DB::table('ufs')->insert(['descricao_uf' => 'MA']);
       DB::table('ufs')->insert(['descricao_uf' => 'MG']);
       DB::table('ufs')->insert(['descricao_uf' => 'MS']);
       DB::table('ufs')->insert(['descricao_uf' => 'PA']);
       DB::table('ufs')->insert(['descricao_uf' => 'PB']);
       DB::table('ufs')->insert(['descricao_uf' => 'PE']);
       DB::table('ufs')->insert(['descricao_uf' => 'PI']);
       DB::table('ufs')->insert(['descricao_uf' => 'PR']);
       DB::table('ufs')->insert(['descricao_uf' => 'RJ']);
       DB::table('ufs')->insert(['descricao_uf' => 'RN']);
       DB::table('ufs')->insert(['descricao_uf' => 'RO']);
       DB::table('ufs')->insert(['descricao_uf' => 'RR']);
       DB::table('ufs')->insert(['descricao_uf' => 'RS']);
       DB::table('ufs')->insert(['descricao_uf' => 'SC']);
       DB::table('ufs')->insert(['descricao_uf' => 'SE']);
       DB::table('ufs')->insert(['descricao_uf' => 'SP']);
       DB::table('ufs')->insert(['descricao_uf' => 'TO']);
       
    }
}
