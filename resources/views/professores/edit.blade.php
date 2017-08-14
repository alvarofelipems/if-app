@extends('layouts.app')

@section('title', 'Alterar cadastro de professor')

@section('content')
    {!! Form::model($professor, ['route' => ['professores.update', $professor->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
<h1 class="text-center">@yield('title')</h1>
        <br>
        <div class="form-group">
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('nome', 'Nome', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome do Completo']) }}
                </div> 
            </div>
           <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('matricula', 'Matrícula', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('matricula', old('matricula'), ['class' => 'form-control', 'placeholder' => 'Sua matricula aqui']) }}
                </div> 
            </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('email', 'Email', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'seuemail@dominio.com']) }}
                </div> 
            </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('telefone', 'Telefone', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('telefone', old('telefone'), ['class' => 'form-control', 'placeholder' => '(XX)XXXX-XXXXX']) }}
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('whatsapp', 'WhatsApp', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('whatsapp', old('whatsapp'), ['class' => 'form-control', 'placeholder' => '(XX)XXXXX-XXXXX']) }}
                </div>
            </div>
        <div class="form-group col-md-12 text-left">
            {!! Html::ul($errors->all()) !!}
            <a href="{{ route('professores.index') }}" class="btn btn-primary">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
        </div>
    {{ Form::close() }}
@endsection