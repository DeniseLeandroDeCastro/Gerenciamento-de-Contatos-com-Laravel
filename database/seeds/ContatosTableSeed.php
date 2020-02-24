<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContatosTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Contato', 10)->create()->each(function($u) {
            $u->telefones()->save(factory('App\Telefone')->make());
        });
    }
}
