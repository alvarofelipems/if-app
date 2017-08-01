@extends('layouts.app')

@section('title', 'Alterar cadastro de disciplinas')

@section('content')
    {!! Form::model($disciplina, ['url' => route('cursos.disciplinas.update', [$disciplina->curso->id, $disciplina->id]), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <h1 class="text-center">@yield('title')</h1>
        <br>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('disciplina', 'Nome', ['class' => 'col-md-4 control-label']) }}
                <div class="col-sm-6">
                    {{ Form::text('disciplina', old('disciplina'), ['class' => 'form-control', 'placeholder' => 'Nome do disciplina']) }}
                </div> 
            </div>
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('professor_id', 'Professor', ['class' => 'col-md-4 control-label']) }}
            <div class="col-sm-8">
                {{ Form::select('professor_id', $professores->pluck('nome', 'id'), old('professor_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o professor']) }}
            </div>
        </div>
        <div class="col-sm-12 text-right">
            {!! Html::ul($errors->all()) !!}
            <button type="submit" class="btn btn-default">Salvar</button>
        </div>
    {{ Form::close() }}    
@endsection