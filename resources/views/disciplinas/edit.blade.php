@extends('layouts.app')

@section('title', 'Alterar cadastro de disciplinas')

@section('content')
       
    @php $disciplina->professores = $disciplina->professores->keyBy('id'); @endphp
    {!! Form::model($disciplina, ['url' => route('cursos.disciplinas.update', [$disciplina->curso->id, $disciplina->id, $disciplina->periodo]), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <h1 class="text-center">@yield('title')</h1>
        <br>
        <div class="form-group">
            <div class="form-group col-md-8">
                <div class="form-group col-md-12">
                    {{ Form::label('disciplina', 'Nome', ['class' => 'control-label']) }}
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome do disciplina']) }}
                </div> 
            </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                    {{ Form::label('periodo', 'Período', ['class' => 'control-label']) }}
                    {{ Form::number('periodo', old('periodo'), ['class' => 'form-control', 'placeholder' => 'Número do Período', 'min'=>'1', 'max'=>'12', 'required']) }}
                </div> 
            </div>
            
            <div class="form-group col-md-12">
                @foreach ($professores as $professor)
                    <label class="col-md-12">
                        {{ Form::checkbox('professores['.$professor->id.']', true, old('professores['.$professor->id.']')), 'required' }} {{ $professor->nome }}
                    </label>
                @endforeach
            </div>
            
            <div class="col-md-12 text-left">
                {!! Html::ul($errors->all()) !!}
                <a href="{{ route('cursos.disciplinas.index', $disciplina->curso->id) }}" class="btn btn-primary">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    {{ Form::close() }}    
@endsection