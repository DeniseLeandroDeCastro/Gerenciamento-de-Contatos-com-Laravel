@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <!--Código para rastrear a navegação do usuário e poder informar onde ele está-->
                <ol class="breadcrumb panel-heading">
                    <li class="active">Contato</li>
                </ol>

                <div class="panel-body">
                    <p>
                        <a class="btn btn-primary" href="{{ route('contato.adicionar') }}">
                            <span class="glyphicon glyphicon-plus"> </span>
                        Adicionar
                        </a>
                    </p>
                    <!--Criando a tabela para a exibição dos contatos -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($contatos as $contato)

                            <tr>
                                <th scope="row">{{ $contato->id }}</th>
                                <td>{{ $contato->foto }}</td>
                                <td>{{ $contato->nome }}</td>
                                <td>{{ $contato->email }}</td>
                                <td>{{ $contato->endereco }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('contato.detalhe', $contato->id)}}">
                                        <span class="glyphicon glyphicon-star"></span>
                                        Detalhe
                                    </a>
                                    <a class="btn btn-default" href="{{route('contato.editar', $contato->id)}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        Editar
                                    </a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{route('contato.deletar', $contato->id)}}' : '')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        Deletar
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>

                    <!--Criando a paginação -->
                    <div align="center">
                        {{  $contatos->links()  }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection