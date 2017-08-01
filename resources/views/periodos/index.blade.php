@extends('layouts.app')

@section('title', 'Periodos')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br>
    @php $pediodo = ['Periodo']; @endphp
    <form id="perido" method="POST" action="{{ route('cursos.turmas.periodos.store', [$turma->curso->id, $turma->id]) }}">
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
                                    @foreach($grade->where('dia_semana', $key) as $horario)
                                        <div class="row text-center" style="margin:0">
                                            <input type="time" name="horario[{{ $horario->id }}][inicio]" value="{{ $horario->inicio }}"/> -
                                            <input type="time" name="horario[{{ $horario->id }}][fim]" value="{{ $horario->fim }}"/>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row text-center" style="margin:0">
                                    <button class="btn btn-primary btn-sm" style="margin-top:5px" data-diasemana="{{ $key }}">Adicionar</button>
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
    <script>
        var horarioKey = 1;
        $(document).ready(function() {
            $('#grade table button').on('click', function(e) {
                e.preventDefault();
                $(this).parents('td').find('.horarios').append(
                    '<div class="row text-center" style="margin:0">' +
                        '<input type="time" name="new_horario[' + horarioKey + '][inicio]"/> - ' +
                        '<input type="time" name="new_horario[' + horarioKey + '][fim]"/>' +
                        '<input type="hidden" name="new_horario[' + horarioKey + '][dia_semana]" value="' + $(this).data('diasemana') + '"/>' +
                    '</div>'
                );
                $(this).parents('td').find('.horarios input').splice(-2, 1).pop().focus();
                horarioKey++;
            })
        })
    </script>
@endsection