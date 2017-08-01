@extends('layouts.app')

@section('title', 'Cadastro de horarios')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br> 
    <form method="POST" action="{{ route('turmas.horarios.store', $turma->id) }}">
        {{ csrf_field() }}
        <div class="form-group col-sm-12">
            <label for="Nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="Nome" placeholder="Nome">
        </div>
        <div class="form-group col-sm-12">
            {{ Form::label('grade_id', 'Horários') }}
            {{ Form::select('grade_id', $grades->pluck('grade_id','id'), old('grade_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o horário']) }}
        </div>
        
        <div class="form-group col-sm-12">                
            <button type="submit" class="btn btn-default">Salvar</button> 
        </div>            
    </form>
@endsection