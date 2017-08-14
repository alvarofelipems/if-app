@extends('layouts.app')

@section('title', 'Cursos')

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
                @foreach ($cursos as $curso)
                    <tr>
                        <td><a href="{{ route('cursos.turmas.index', $curso->id) }}">{{ $curso->nome }}</a></td>
                        <td><a href="{{ route('cursos.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                        <a href="{{ route('cursos.edit', $curso->id) }}"><i class="glyphicon glyphicon-edit"></i></a> 
                        <a href="{{ route('cursos.destroy', $curso->id) }}"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('cursos.create') }}" class="btn btn-primary">Adicionar</a>
    </div>
@endsection