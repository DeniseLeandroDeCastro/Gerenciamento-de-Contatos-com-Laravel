@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <!--Código para rastrear a navegação do usuário e poder informar onde ele está-->
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('contato.index') }}">Contatos</a></li>
                    <li><a href="{{ route('contato.detalhe', $telefone->contato->id) }}">Detalhe do Contato</a></li>
                    <li class="active">Editar Telefone</li>
                </ol>

                <div class="panel-body">
                <!--Criando o formulário para editar-->
                <p><b>Contato:</b>{{ $telefone->contato->nome }}</p>
                    <form action="{{ route('telefone.atualizar', $telefone->id) }}" method="post">
                        <!--Necessário para garantir a segurança. Não permite requisição fora do site -->
                        {{ csrf_field() }} 

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <!--Criando o campo título do telefone-->
                            <label for="titulo">Título (Celular/Comercial/De Parente/De Vizinho/Residencial)</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Título do Telefone" value="{{ $telefone->titulo }}">
                        </div>

                        <div class="form-group">
                            <!--Criando o campo número do telefone-->
                            <label for="numero">Número do Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Número do Telefone" value="{{ $telefone->telefone }}">
                        </div>

                        <!--Adicionando um botão para inserir o novo contato-->
                        <button class="btn btn-success">
                        <span class="glyphicon glyphicon-ok"> </span>
                            Atualizar
                        </button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection