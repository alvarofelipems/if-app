@extends('layouts.app')

@section('content')
    {!! Form::model($turma, ['route' => ['turmas.update', $turma->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <div class="col-md-6">
            <h1 class="text-center">Dados</h1>

            <div class="form-group">
                {{ Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-8">
                    {{ Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome']) }}
                </div> 
            </div>
        </div>
        <div class="col-md-12 text-center">
            {!! Html::ul($errors->all()) !!}
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    {{ Form::close() }}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#documento').on('keydown', function() {
                $(this).inputmask('remove');
                if ($(this).val().length < 11) {
                    $(this).inputmask('999.999.999-99');
                } else {
                    $(this).inputmask('99.999.999/9999-99');
                }                   
            });
            $('#celular').inputmask('(99) 99999-9999')
            $('#telefone').inputmask('(99) 9999-9999')
            $('#cep').inputmask('99999-999')
        });
    </script>
@endsection