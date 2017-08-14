@extends('layouts.app')

@section('title', 'Alterar cadastro de Turma')

@section('content')
    {!! Form::model($turma, ['url' => route('cursos.turmas.update', [$turma->curso->id, $turma->id, $turma->curso->nome]), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <h1 class="text-center">@yield('title')</h1>
        <br>
        <div class="form-group">
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                    {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome do Completo']) }}
                </div> 
            </div>
            <div class="form-group col-md-4">
            <div class="form-group col-md-12">
                {{ Form::label('Curso'), ['class' => 'control-label'] }}
                {{ Form::select('curso_id', $curso->pluck('nome', 'id'), old('curso_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o curso']) }}
            </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                    {{ Form::label('ano_ini', 'Ano', ['class' => 'control-label']) }}
                    {{ Form::text('ano_ini', old('ano_ini'), ['class' => 'form-control', 'placeholder' => 'Ano de início do curso']) }}
                </div> 
            </div>
            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                    {{ Form::label('semestre', 'Semestre de início', ['class' => 'control-label']) }}
                    {{ Form::text('semestre_ini', old('semestre_ini'), ['class' => 'form-control', 'placeholder' => 'Semestre de início do curso']) }}
                </div> 
            </div>
            
            <div class="form-group col-sm-12">
            <br>
            <h1><center>Disciplinas ministradas e seus professores</center></h1>
                {{-- dd($turma->curso->disciplinas->sortBy('periodo')->groupBy('periodo')) --}}
                <div class="form-group col-sm-12">
                   @foreach($turma->curso->disciplinas->sortBy('periodo')->groupBy('periodo') as $periodo_id => $disciplinasPorPeriodo)
                    <h4>{{ $periodo_id }}º Período</h4>
                    @foreach($disciplinasPorPeriodo as $disciplina)
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ $disciplina->nome }}</label>
                            <div class="col-sm-10">
                                <div class="form-control  col-sm-12 ">
                                    {!! Form::select(
                                           'professores['.$disciplina->id.']',
                                            $disciplina->professores->pluck('nome', 'id'),
                                            @$turma->aulas->where('disciplina_id', $disciplina->id)->last()->professor_id
                                        )
                                    !!}
                                </div>
                            </div>
                        </div>
                    @endForeach
                @endForeach
                </div>
            </div>

            <div class="form-group col-md-12">
                {!! Html::ul($errors->all()) !!}
                <a href="{{ route('cursos.turmas.index', [$curso->id]) }}" class="btn btn-primary">Cancelar</a>                   
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    {{ Form::close() }}
@endsection

