@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <!--Código para rastrear a navegação do usuário e poder informar onde ele está-->
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('contato.index') }}">Contatos</a></li>
                    <li><a href="{{ route('contato.detalhe', $contato->id) }}">Detalhe do Contato</a></li>
                    <li class="active">Adicionar Novo Telefone</li>
                </ol>

                <div class="panel-body">
                <!--Criando o formulário para adicionar novos contatos-->
                    <form action="{{ route('telefone.salvar', $contato->id) }}" method="post">
                        <!--Necessário para garantir a segurança. Não permite requisição fora do site -->
                        {{ csrf_field() }} 

                        <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                            <!--Criando o campo título do telefone-->
                            <label for="titulo">Título (Celular/Comercial/De Parente/De Vizinho/Residencial)</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Título do Telefone">
                                @if($errors->has('titulo'))
                                    <span class='help-block'>
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                            <!--Criando o campo número do telefone-->
                            <label for="numero">Número do Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Número do Telefone">
                                @if($errors->has('telefone'))
                                    <span class='help-block'>
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                        </div>

                       

                        <!--Adicionando um botão para inserir o novo contato-->
                        <button class="btn btn-success">
                            <span class="glyphicon glyphicon-earphone"> </span>
                            Inserir Novo Telefone
                        </button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection