@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <!--Código para rastrear a navegação do usuário e poder informar onde ele está-->
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('contato.index') }}">Contato</a></li>
                    <li class="active">Detalhe</li>
                </ol>

                <div class="panel-body">
                   <p>
                   <span class="glyphicon glyphicon-user"></span>
                   <b>Nome: </b> 
                   {{ $contato->nome }}
                   </p>
                   <p>
                   <span class="glyphicon glyphicon-envelope"></span>
                   <b>Email: </b> 
                   {{ $contato->email }}
                   </p>
                   <p>
                   <span class="glyphicon glyphicon-home"></span>
                   <b>Endereço: </b>
                    {{ $contato->endereco }}
                    </p>

                    <!--Criando a tabela para a exibição dos contatos -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Número</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contato->telefones as $telefone)
                            <tr>
                                <th scope="row">{{ $telefone->id }}</th>
                                <td>{{ $telefone->titulo }}</td>
                                <td>{{ $telefone->telefone }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{ route('telefone.editar', $telefone->id) }}"><span class="glyphicon glyphicon-edit"></span>Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{ route('telefone.deletar', $telefone->id) }}' : '')">
                                    <span class="glyphicon glyphicon-trash"></span>
                                        Deletar
                                    </a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>

                    <!--Criando o botão de Adicionar -->
                    <p>
                        <a class="btn btn-primary" href="{{ route('telefone.adicionar', $contato->id)}}">
                            <span class="glyphicon glyphicon-earphone"> </span>
                                Adicionar Novo Telefone
                        </a>
                    </p>
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection