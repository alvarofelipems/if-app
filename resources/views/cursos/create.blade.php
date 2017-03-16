@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'turmas', 'class' => 'form-horizontal']) !!}
        <div class="col-md-6">
            <h1 class="text-center">Dados</h1>

            <div class="form-group">
                {{ Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome']) }}
                </div> 
            </div>
        </div>
        <div class="col-md-12 text-center">
            {!! Html::ul($errors->all()) !!}
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    {{ Form::close() }}
@endsection