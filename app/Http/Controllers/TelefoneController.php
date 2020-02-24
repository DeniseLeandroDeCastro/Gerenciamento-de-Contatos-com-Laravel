<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TelefoneController extends Controller
{
    //Método construtor
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Método para adicionar um novo telefone ao contato na tela de detalhe
    public function adicionar($id)
    {
        $contato = \App\Contato::find($id);
        return view('telefone.adicionar', compact('contato'));
    }

     //Método para salvar o novo telefone recém adicionado ao contato na tela de detalhe
     public function salvar(\App\Http\Requests\TelefoneRequest $request,$id)
     {
         $telefone = new \App\Telefone;
         $telefone->titulo = $request->input('titulo');
         $telefone->telefone = $request->input('telefone');

         //Telefone será adicionado ao contato identificado através do id
         \App\Contato::find($id)->addTelefone($telefone);

         //Messagem que será exibida após a adição do novo telefone ao contato
         \Session::flash('flash_message', [
             'msg'=>"Telefone adicionado com sucesso!",
             'class'=>"alert-success"
         ]);

         //Após a adição do novo telefone, o usuário é redirecionado para a tela de detalhe, caso queira adicionar outro telefone
         return redirect()->route('contato.detalhe',$id); 
     }

    //Método para alterar os dados do telefone
    public function editar($id)
    {
        $telefone = \App\Telefone::find($id);
        if(!$telefone) {
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse telefone cadastrado!",
                'class'=>"alert-danger"
                ]);
                return redirect()->route('contato.detalhe', $telefone->contato->id);
        }
        return view('telefone.editar', compact('telefone'));
    }

      //Método para atualizar os dados do telefone
      public function atualizar(Request $request, $id)
      {
          $telefone = \App\Telefone::find($id);
          $telefone->update($request->all());
         
              \Session::flash('flash_message',[
                  'msg'=>"Telefone atualizado com sucesso!",
                  'class'=>"alert-success"
                  ]);
  
                  return redirect()->route('contato.detalhe', $telefone->contato->id);
      }

      //Método para deletar o telefone do contato
      public function deletar($id)
      {
          $telefone = \App\Telefone::find($id);
          $telefone->delete();
  
          \Session::flash('flash_message',[
              'msg'=>"Telefone deletado com sucesso!",
              'class'=>"alert-success"
          ]);
  
          return redirect()->route('contato.detalhe', $telefone->contato->id);
      }
}
