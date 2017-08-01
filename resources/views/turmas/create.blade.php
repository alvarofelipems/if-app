@extends('layouts.app')

@section('title', 'Cadastro de turmas')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br> 
    <form method="POST" action="{{ route('cursos.turmas.store', $curso->id) }}">
        {{ csrf_field() }}
        <div class="form-group col-sm-6">
            <label for="Nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="Nome" placeholder="Insira o nome da turma" required>
        </div>
        <div class="form-group col-sm-3">
            <label for="Ano">Ano</label>
            <input type="number" name="ano_ini" class="form-control" maxlength="4" id="Ano" placeholder="Insira ano de início" required>
        </div>
        <div class="form-group col-sm-3">
            <label for="Semestre">Semestre</label>
            <input type="text" name="semestre_ini" class="form-control" id="Semestre" placeholder="Insira o semestre de início" required>
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('Curso') }}
            {{ Form::select('curso_id', $curso->pluck('nome', 'id'), old('curso_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o curso']) }}
        </div>
        <div class="form-group col-sm-12">                
            <button type="submit" class="btn btn-default">Salvar</button> 
        </div>            
    </form>
@endsection