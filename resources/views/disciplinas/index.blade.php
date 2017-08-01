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
                </tr>
            </thead>
            <tbody>
               @foreach ($disciplinas as $disciplina)
                    <tr>
                        <td><a href="{{ route('cursos.disciplinas.edit', [$disciplina->curso->id, $disciplina->id]) }}">{{ $disciplina->disciplina }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection