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
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td><a href="{{ route('cursos.edit', $curso->id) }}">{{ $curso->nome }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection