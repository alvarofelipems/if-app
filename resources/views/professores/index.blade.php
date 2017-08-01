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
                </tr>
            </thead>
            <tbody>
                @foreach ($professores as $professor)
                    <tr>
                        <td><a href="{{ route('professores.edit', $professor->id) }}">{{ $professor->nome }}</a></td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ $professor->telefone }}</td>
                        <td>{{ $professor->whatsapp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection