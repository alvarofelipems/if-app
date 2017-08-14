@extends('layouts.app')

@section('title', 'Cadastro de disciplina')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br> 
    <form method="POST" action="{{ route('cursos.disciplinas.store', $curso->id) }}">
        {{ csrf_field() }}
        <div class="form-group col-sm-8">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
        </div>
        <div class="form-group col-sm-4">
            <label for="periodo">Período</label>
            <input type="text" name="periodo" class="form-control" id="periodo" placeholder="Insira o período da disciplina">
        </div>
        <div class="form-group col-sm-12">  
            {!! Html::ul($errors->all()) !!}
            <a href="{{ route('cursos.disciplinas.index', $curso->id) }}" class="btn btn-primary">Cancelar</a>                          
            <button type="submit" class="btn btn-success">Salvar</button> 
        </div>            
    </form>
@endsection