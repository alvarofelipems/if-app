@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td>{{ Html::link(route('cursos.show', $curso->id), $curso->nome) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary">Nova</a>
@endsection