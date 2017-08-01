@extends('layouts.app')

@section('title', 'Alterar cadastro de instituição')

@section('content')
    {!! Form::model($instituicao, ['route' => ['instituicoes.update', $instituicao->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <h1 class="text-center">@yield('title')</h1>
        <br>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome da instituição', 'required', 'maxlength' => 18]) }}
                </div> 
            </div>
            <div class="form-group">
                {{ Form::label('cnpj', 'CNPJ', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('cnpj', old('cnpj'), ['class' => 'form-control', 'placeholder' => 'XX.XXX.XXX/XXXX-XX', 'required', 'maxlength' => 15]) }}
                </div> 
            </div>
            <div class="form-group">
                {{ Form::label('ie', 'Insc. Estadual', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('ie', old('ie'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div> 
            </div>
            <div class="form-group">
                {{ Form::label('endereco', 'Endereco', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('endereco', old('endereco'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('numero', 'Número', ['class' => 'col-md-4 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('numero', old('numero'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('complemento', 'Complemento', ['class' => 'col-md-4 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('complemento', old('complemento'), ['class' => 'form-control', 'placeholder' => 'complemento']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('cidade', 'Cidade', ['class' => 'col-md-4 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('cidade', old('cidade'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
            </div>
             <div class="form-group">
                {{ Form::label('uf', 'Estado', ['class' => 'col-md-4 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('uf', old('uf'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('cep', 'CEP', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('cep', old('cep'), ['class' => 'form-control', 'placeholder' => 'XX.XXX-XXX']) }}
                </div> 
            </div>
            <div class="form-group">
                {{ Form::label('telefone', 'Telefone', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('telefone', old('telefone'), ['class' => 'form-control', 'placeholder' => '(XX)XXXX-XXXX']) }}
                </div>
                </div>
            <div class="form-group">
                {{ Form::label('email', 'E-mail', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('email', old('e-mail'), ['class' => 'form-control', 'placeholder' => 'seuemail@dominio.com']) }}
                </div>
                </div> 
            </div> 
        <div class="col-md-12 text-center">
            {!! Html::ul($errors->all()) !!}
            <button type="submit" class="btn btn-default">Salvar</button>
        </div>
    {{ Form::close() }}    
@endsection