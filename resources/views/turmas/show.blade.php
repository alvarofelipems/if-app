@extends('layouts.app')

@section('content')
    <div class="form-horizontal">
        <h1>Turma</h1>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $turma->nome }}</p>
            </div>
        </div>
        {{-- Html::link(route('cursos.turmas.edit', $turma->id), 'Editar', ['class' => 'btn btn-success']) --}}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //$('#cep').inputmask('99999-999');
        });
    </script>
@endsection