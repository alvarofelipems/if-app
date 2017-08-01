@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
<h1 class="text-center">@yield('title')</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ano</th>
                    <th>Semestre</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($turmas as $turma)
                    <tr>
                        <td><a href="{{ route('cursos.turmas.edit', [$turma->curso->id, $turma->id]) }}">{{ $turma->nome }}</a></td>
                        <td>{{ $turma->ano_ini }}</td>
                        <td>{{ $turma->semestre_ini }}</td>
                        <td>{{ $turma->curso->nome }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection