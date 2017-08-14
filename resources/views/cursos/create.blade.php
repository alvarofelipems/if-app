@extends('layouts.app')

@section('title', 'Cadastro de Cursos')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br> 
    <form method="POST" action="{{ route('cursos.store') }}">
        {{ csrf_field() }}
        <div class="form-group col-sm-6">
            <label for="Nome">Nome</label>
            {{-- Form::text('nome', 'nome') --}}
            <input type="text" name="nome" class="form-control" id="Nome" placeholder="Nome">
        </div>
        <div class="form-group col-sm-12">  
            <a href="{{ route('cursos.index') }}" class="btn btn-primary">Cancelar</a>             
            <button type="submit" class="btn btn-success">Salvar</button> 
        </div>            
    </form>
@endsection