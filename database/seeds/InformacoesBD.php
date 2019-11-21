<?php

use Illuminate\Database\Seeder;
use App\Taxas;

class InformacoesBD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taxas::create([
            'name'      => 'Taxa Carro',
            'valor'     => '5.4'
        ]);
    }
}
