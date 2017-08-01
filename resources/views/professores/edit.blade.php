@extends('layouts.app')

@section('title', 'Alterar cadastro de professor')

@section('content')
    {!! Form::model($professor, ['route' => ['professores.update', $professor->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
<h1 class="text-center">@yield('title')</h1>
        <br>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome do Completo']) }}
                </div> 
            </div>
            <div class="form-group">
                {{ Form::label('matricula', 'Matrícula', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('matricula', old('matricula'), ['class' => 'form-control', 'placeholder' => 'Sua matricula aqui']) }}
                </div> 
            </div>
            <div class="form-group">
                {{ Form::label('email', 'E-mail', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'seuemail@dominio.com']) }}
                </div> 
            </div>
            <div class="form-group">
                {{ Form::label('telefone', 'Telefone', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-4">
                    {{ Form::text('telefone', old('telefone'), ['class' => 'form-control', 'placeholder' => '(XX)XXXX-XXXXX']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('whatsapp', 'WhatsApp', ['class' => 'col-md-4 control-label']) }}
                <div class="col-sm-4">
                    {{ Form::text('whatsapp', old('whatsapp'), ['class' => 'form-control', 'placeholder' => '(XX)XXXXX-XXXXX']) }}
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            {!! Html::ul($errors->all()) !!}
            <button type="submit" class="btn btn-default">Salvar</button>
        </div>
    {{ Form::close() }}
@endsection