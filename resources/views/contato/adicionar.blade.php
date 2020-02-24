@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <!--Código para rastrear a navegação do usuário e poder informar onde ele está-->
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('contato.index') }}">Contatos</a></li>
                    <li class="active">Adicionar Novos Contatos</li>
                </ol>

                <div class="panel-body">
                <!--Criando o formulário para adicionar novos contatos-->
                    <form action="{{ route('contato.salvar') }}" method="post">
                        <!--Necessário para garantir a segurança. Não permite requisição fora do site -->
                        {{ csrf_field() }} 

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <!--Criando o campo nome-->
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do Contato">
                                @if($errors->has('nome'))
                                    <span class='help-block'>
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <!--Criando o campo email-->
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="E-mail do Contato">
                                @if($errors->has('email'))
                                    <span class='help-block'>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('endereco') ? 'has-error' : '' }}">
                            <!--Criando o campo endereço-->
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Endereço do Contato">
                                @if($errors->has('endereco'))
                                    <span class='help-block'>
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <!--Adicionando um botão para inserir o novo contato-->
                        <button class="btn btn-success">
                        <span class="glyphicon glyphicon-user"> </span>
                            Inserir Novo Contato
                        </button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection