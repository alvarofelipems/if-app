@extends('layouts.app')

@section('title', 'Instituições')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instituicoes as $instituicao)
                    <tr>
                        <td><a href="{{ route('instituicoes.show', $instituicao->id) }}">{{ $instituicao->nome }}</a></td>
                        <td><a href="{{ route('instituicoes.edit', $instituicao->id) }}"><i class="glyphicon glyphicon-edit"></i></a> <a href="{{ route('instituicoes.destroy', $instituicao->id) }}"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('instituicoes.create', $instituicao->id) }}" class="btn btn-primary">Adicionar</a>
    </div>
@endsection