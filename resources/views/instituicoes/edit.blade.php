@extends('layouts.app')

@section('title', 'Alterar cadastro de instituição')

@section('content')
    {!! Form::model($instituicao, ['route' => ['instituicoes.update', $instituicao->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <h1 class="text-center">@yield('title')</h1>
        <br>
        <div class="form-group">
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                    {{ Form::label('nome', 'Nome', ['class' => 'col-md-1 control-label']) }}
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome da instituição', 'required', 'maxlength' => 28]) }}
                </div> 
            </div>

            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('cnpj', 'CNPJ', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('cnpj', old('cnpj'), ['class' => 'col-md-1 form-control', 'placeholder' => 'XX.XXX.XXX/XXXX-XX', 'required', 'maxlength' => 25]) }}
            </div> 
            </div> 

            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('ie', 'I.E', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('ie', old('ie'), ['class' => 'form-control', 'placeholder' => 'Inscrição Estadual']) }}
                </div> 
            </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('endereco', 'Endereço', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('endereco', old('endereco'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-group col-md-12">
                {{ Form::label('numero', 'Número', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('numero', old('numero'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-group col-md-12">
                {{ Form::label('complemento', 'Complemento', ['class' => 'col-md-1 control-label']) }}
                {{ Form::text('complemento', old('complemento'), ['class' => 'form-control', 'placeholder' => 'complemento']) }}
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-group col-md-12">
                {{ Form::label('cidade', 'Cidade', ['class' => 'col-md-2 control-label']) }}
                {{ Form::text('cidade', old('cidade'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
            </div>
            <div class="form-group col-md-2">
            <div class="form-group col-md-12">
                {{ Form::label('uf', 'Estado', ['class' => 'col-md-2 control-label']) }}
                {{ Form::text('uf', old('uf'), ['class' => 'form-control', 'placeholder' => '']) }}
            </div>
            </div>
            <div class="form-group col-md-3">
               <div class="form-group col-md-12">
                {{ Form::label('cep', 'CEP', ['class' => 'col-md-2 control-label']) }}
                {{ Form::text('cep', old('cep'), ['class' => 'form-control', 'placeholder' => 'XX.XXX-XXX']) }}
                </div> 
            </div>
            <div class="form-group col-md-3">
                <div class="form-group col-md-12">
                {{ Form::label('telefone', 'Telefone', ['class' => 'col-md-2 control-label']) }}
                {{ Form::text('telefone', old('telefone'), ['class' => 'form-control', 'placeholder' => '(XX)XXXX-XXXX']) }}
                </div>
                </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                {{ Form::label('email', 'Email', ['class' => 'col-md-2 control-label']) }}
                {{ Form::text('email', old('e-mail'), ['class' => 'form-control', 'placeholder' => 'seuemail@dominio.com']) }}
                </div>
                </div> 
            </div> 
        <div class="col-md-12 text-center">
            {!! Html::ul($errors->all()) !!}
            <a href="{{ route('instituicoes.index') }}" class="btn btn-primary">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    {{ Form::close() }}    
@endsection