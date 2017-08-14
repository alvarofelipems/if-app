@extends('layouts.app')

@section('title', 'Professores')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>WhatsApp</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($professores as $professor)
                    <tr>
                        <td><a href="{{ route('professores.edit', $professor->id) }}">{{ $professor->nome }}</a></td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ $professor->telefone }}</td>
                        <td>{{ $professor->whatsapp }}</td>
                        <td><a href="{{ route('professores.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                        <a href="{{ route('professores.edit', $professor->id) }}"><i class="glyphicon glyphicon-edit"></i></a> 
                        <a href="{{ route('professores.destroy', $professor->id) }}"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('professores.create') }}" class="btn btn-primary">Adicionar</a>
    </div>
@endsection