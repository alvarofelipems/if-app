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
                @foreach($instituicoes as $instituicao)
                <tr>
                    <td>{{ Html::link(route('instituicao.show', $cinstituicao->id), $isntituicao->nome) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('instituicoes.create') }}" class="btn btn-primary">Nova</a>
@endsection