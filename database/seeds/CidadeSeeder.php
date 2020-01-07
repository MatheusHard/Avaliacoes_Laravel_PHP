<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert(['descricao_cidade' =>'ESCOLHA A CIDADE', 'uf_id' => 1]);
        DB::table('cidades')->insert(['descricao_cidade' =>'TOTAL', 'uf_id' => 1]);
        DB::table('cidades')->insert(['descricao_cidade' =>'CABEDELO', 'uf_id' => 15]);
        DB::table('cidades')->insert(['descricao_cidade' =>'PAULISTA', 'uf_id' => 16]);
        DB::table('cidades')->insert(['descricao_cidade' =>'JABOATÃO', 'uf_id' => 16]);
    }
}
