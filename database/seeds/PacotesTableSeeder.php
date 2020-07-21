<?php

use App\Models\Pacote;
use Illuminate\Database\Seeder;

class PacotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pacote::create([
            "nome"          => "Viagem para Floripa",
            "valor"         => "450.00",
            "dataInicio"    => "2018-07-01",
            "dataFim"       => "2018-07-09",
            "site"          => "www.vemprafloripa.com.br",
            "telefone"      => 31444444444,
            "descricao"     => "vem pra Floripa",
            "urlImagem"     => null
        ]);
    }
}
