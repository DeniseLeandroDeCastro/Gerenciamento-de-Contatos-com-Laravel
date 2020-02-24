<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use Redirect;
use File;

class ContatoController extends Controller
{
    //Configurando o controller para acesso apenas aos usuários logados no sistema.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //View inicial
    public function index()
    {
        $contatos = \App\Contato::paginate(5); //Paginação
        
        return view('contato.index',compact('contatos'));
    }

    //View para adicionar novos contatos
    public function adicionar()
    {
        return view('contato.adicionar');   
    }

    //Método para adicionar o detalhe do contato
    public function detalhe($id)
    {
        $contato = \App\Contato::find($id);
        return view('contato.detalhe', compact('contato'));
    }

    //Método para salvar o novo contato
    public function salvar(\App\Http\Requests\ContatoRequest $request){
        \App\Contato::create($request->all()); //Requisição p/adicionar um novo contato no banco

        \Session::flash('flash_message',[
                        'msg'=>"Contato adicionado com sucesso!",
                        'class'=>"alert-success"
                        ]);
        return redirect()->route('contato.adicionar');//Retorna à pagina p/adicionar novo contato em branco
    }

    //Método para alterar os dados do contato
    public function editar($id)
    {
        $contato = \App\Contato::find($id);
        if(!$contato) {
            \Session::flash('flash_message',[
                'msg'=>"Registro não pode ser deletado!",
                'class'=>"alert-danger"
                ]);
                return redirect()->route('contato.index');
        }
        return view('contato.editar', compact('contato'));
    }

    //Método para atualizar os dados do contato
    public function atualizar(Request $request, $id)
    {
       \App\Contato::find($id)->update($request->all());
       
            \Session::flash('flash_message',[
                'msg'=>"Contato atualizado com sucesso!",
                'class'=>"alert-success"
                ]);

                return redirect()->route('contato.index');
    }

    //Método para deletar o contato
    public function deletar($id)
    {
        $contato = \App\Contato::find($id);

            if(!$contato->deletarTelefones()) {
                \Session::flash('flash_message',[
                    'msg'=>"Não existe esse contato cadastrado! Deseja cadastrar um novo contato?",
                    'class'=>"alert-danger"
                ]);
                return redirect()->route('contato.adicionar');
            }

        $contato->delete();

        \Session::flash('flash_message',[
            'msg'=>"Contato deletado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('contato.index');
    }

   
}
