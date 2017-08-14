@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
<h1 class="text-center">@yield('title')</h1>
   <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ano  de início</th>
                    <th>Semestre de início</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($curso->turmas as $turma)
                    <tr>
                        <td><a href="{{ route('cursos.turmas.show', [$turma->curso->id, $turma->id]) }}">{{ $turma->nome }}</a></td>
                        <td>{{ $turma->ano_ini }}</td>
                        <td>{{ $turma->semestre_ini }}</td>
                        <td>{{ $turma->curso->nome }}</td>
                        <td><a href="{{ route('cursos.turmas.create', [$curso->id]) }}"><i class="glyphicon glyphicon-plus"></i></a>
                        <a href="{{ route('cursos.turmas.edit', [$turma->curso->id, $turma->id]) }}"><i class="glyphicon glyphicon-edit"></i></a> 
                        <a href="{{-- route('cursos.turmas.destroy', [$turma->curso->id, $turma->id])--}}"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{ route('cursos.turmas.create', [$curso->id]) }}" class="btn btn-primary">Adicionar</a>
    </div>
@endsection