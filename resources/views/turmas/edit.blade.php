@extends('layouts.app')

@section('title', 'Alterar cadastro de Turma')

@section('content')
    {!! Form::model($turma, ['url' => route('cursos.turmas.update', [$turma->curso->id, $turma->id, $turma->curso->nome]), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <h1 class="text-center">@yield('title')</h1>
        <br>
        <div class="form-group">
        <div class="form-group col-md-12">
            <div class="col-md-6">
                {{ Form::label('Curso'), ['class' => 'control-label'] }}
                {{ Form::select('curso_id', $curso->pluck('nome', 'id'), old('curso_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o curso']) }}
            </div>
         </div>
        <div class="form-group col-md-12">
            <div class="col-md-6">
                {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
                {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome do Completo']) }}
            </div> 
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-6">
                {{ Form::label('ano_ini', 'Ano', ['class' => 'control-label']) }}
                {{ Form::text('ano_ini', old('ano_ini'), ['class' => 'form-control', 'placeholder' => 'Ano de início do curso']) }}
            </div> 
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-6">
                {{ Form::label('semestre', 'Semestre', ['class' => 'control-label']) }}
                {{ Form::text('semestre_ini', old('semestre_ini'), ['class' => 'form-control', 'placeholder' => 'Semestre de início do curso']) }}
            </div> 
        </div>
        </div>
        <div class="col-md-12 text-center">
            {!! Html::ul($errors->all()) !!}
            <button type="submit" class="btn btn-default">Salvar</button>
        </div>
    {{ Form::close() }}
@endsection

