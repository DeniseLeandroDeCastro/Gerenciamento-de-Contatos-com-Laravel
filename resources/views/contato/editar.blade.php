@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <!--Código para rastrear a navegação do usuário e poder informar onde ele está-->
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('contato.index') }}">Contato</a></li>
                    <li class="active">Editar</li>
                </ol>

                <div class="panel-body">
                <!--Criando o formulário para adicionar novos contatos-->
                    <form action="{{ route('contato.atualizar', $contato->id) }}" method="post">
                        <!--Necessário para garantir a segurança. Não permite requisição fora do site -->
                        {{ csrf_field() }} 

                        <!--Necessário p/poder utilizar o método put, que é o de atualização de dados-->
                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <!--Criando o campo id-->
                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="Id do Contato" value="{{$contato->id}}">
                        </div>

                        <div class="form-group">
                            <!--Criando o campo nome-->
                            <label for="nome">Nome</label>
                            <input type="text" name="nome"  id="nome" class="form-control" placeholder="Nome do Contato" value="{{$contato->nome}}">
                        </div>

                        <div class="form-group">
                            <!--Criando o campo email-->
                            <label for="nome">Email</label>
                            <input type="email" name="email"  id="email" class="form-control" placeholder="E-mail do Contato" value="{{$contato->email}}">
                        </div>

                        <div class="form-group">
                            <!--Criando o campo endereço-->
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco"  id="endereco" class="form-control" placeholder="Endereço do Contato" value="{{$contato->endereco}}">
                        </div>

                        <!--Adicionando um botão para inserir o novo contato-->
                        <button class="btn btn-success">
                        <span class="glyphicon glyphicon-erase"> </span>
                            Atualizar
                        </button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection