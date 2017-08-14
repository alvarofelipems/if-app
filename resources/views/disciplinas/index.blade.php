@extends('layouts.app')

@section('title', 'Disciplinas')

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
               @foreach ($curso->disciplinas as $disciplina)
                    <tr>
                        <td><a href="{{ route('cursos.disciplinas.edit', [$curso->id, $disciplina->id]) }}">{{ $disciplina->nome }}</a></td>
                        <td><a href="{{ route('cursos.disciplinas.create', [$curso->id]) }}"><i class="glyphicon glyphicon-plus"></i></a>
                        <a href="{{ route('cursos.disciplinas.edit', [$curso->id, $disciplina->id]) }}"><i class="glyphicon glyphicon-edit"></i></a> 
                        <a href="{{ route('cursos.disciplinas.destroy', [$disciplina->curso->id, $disciplina->id]) }}"><i class="glyphicon glyphicon-trash"></i></a>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('cursos.disciplinas.create', [$curso->id]) }}" class="btn btn-primary">Adicionar</a>
    </div>
@endsection