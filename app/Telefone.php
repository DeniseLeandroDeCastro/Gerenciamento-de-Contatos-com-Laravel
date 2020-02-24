<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['titulo', 'telefone'];
    //Criando o relacionamento com Contatos
    public function contato()
    {
        return $this->belongsTo('App\Contato');
    }

}
