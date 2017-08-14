@extends('layouts.app')

@section('title', 'Editar cadastro de curso')

@section('content')
    {!! Form::model($cursos, ['route' => ['cursos.update', $cursos->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <h1 class="text-center">@yield('title')</h1>
        <br>
         <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome do Completo']) }}
                </div> 
            </div>
        </div>
        
        <div class="col-md-12 text-center">
            {!! Html::ul($errors->all()) !!}
            <a href="{{ route('cursos.index') }}" class="btn btn-primary">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    {{ Form::close() }}    
@endsection