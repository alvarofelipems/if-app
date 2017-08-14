@extends('layouts.app')

@section('title', 'Periodos')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br>
    <form id="periodo" method="POST" action="{{ route('cursos.turmas.periodos.store', [$turma->curso->id, $turma->id]) }}">
        {{ csrf_field() }}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Periodo do curso {{ $turma->curso->nome}} da turma de {{ $turma->nome}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periodos as $periodo)
                        <tr>
                            <td>
                                <input type="text" name="periodo[{{ $periodo->id }}]" value="{{ $periodo->nome }}"/>
                        @foreach($periodo->calendarios as $key => $calendario)
                                <a href="{{ route('calendario', [$turma->curso->id, $turma->id, $periodo->id, $calendario->id]) }}">
                                    {{ date('d/m/Y', strtotime($calendario->inicio)) }} até {{ date('d/m/Y', strtotime($calendario->fim)) }}
                                    @if ($key, $periodo->calendarios->count()-1),@endif
                                </a>
                        @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row text-left" style="margin:0">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button class="btn btn-primary addField ">Adicionar</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('button.addField').on('click', function(e) {
                e.preventDefault();
                $('#periodo table tbody').append(
                    '<tr><td><input type="text" name="novo_periodo[]"/></td><tr>'
                );
                $('#periodo table tbody input').last().focus();
            });
        });
    </script>
@endsection