<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    //Para poder salvar o novo contato com todos os parâmteros
    protected $fillable = ['foto', 'nome', 'email', 'endereco'];
    
    //Criando o relacionamento com Telefones
    public function telefones()
    {
        return $this->hasMany('App\Telefone');
    }

    public function addTelefone(Telefone $tel)
    {
        return $this->telefones()->save($tel);
    }

    public function deletarTelefones()
    {
        foreach($this->telefones as $tel) {
            $tel->delete();
        }
        return true;
    }
}
