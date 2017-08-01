@extends('layouts.app')

@section('title', 'Grades')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br>
    @php $diasSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado']; @endphp
    <form id="grade" method="POST" action="{{ route('cursos.turmas.salvarHorario', [$calendario->periodo->turma->curso->id, $calendario->periodo->turma->id, $calendario->periodo->id, $calendario->id]) }}">
        {{ csrf_field() }}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        @foreach($diasSemana as $dia)
                            <th>{{ $dia }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($diasSemana as $key => $dia)
                            <td>
                                <div class="horarios">
                                    @foreach($grade->where('dia_semana', $key) as $horarioGrade)
                                        <div class="row text-center" style="margin:0">
                                            @php $disciplina = @$calendario->horarios->where('grade_id', $horarioGrade->id)->last()->disciplina; @endphp
                                            {!! Form::select('disciplina['.$horarioGrade->id.']', $calendario->periodo->turma->curso->disciplinas->pluck('disciplina', 'id'), @$disciplina->id, ['placeholder' => 'Vago das '. date('H:i', strtotime($horarioGrade->inicio)) .'h até '. date('H:i', strtotime($horarioGrade->fim)) .'h']) !!}
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection

@section('script')
@endsection