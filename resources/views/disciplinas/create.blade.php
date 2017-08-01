@extends('layouts.app')

@section('title', 'Cadastro de disciplina')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br> 
    <form method="POST" action="{{ route('cursos.disciplinas.store', $curso->id) }}">
        {{ csrf_field() }}
        <div class="form-group col-sm-12">
            <label for="Nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="Nome" placeholder="Nome">
        </div>
        <div class="form-group col-sm-12">
            {{ Form::label('professor_id', 'Professor') }}
            {{ Form::select('professor_id', $professores->pluck('nome', 'id'), old('professor_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o professor']) }}
        </div>
        <div class="form-group col-sm-12">                
            <button type="submit" class="btn btn-default">Salvar</button> 
        </div>            
    </form>
@endsection