@extends('layouts.app')

@section('title', 'Cadastro de professores')

@section('content')
    <h1 class="text-center">@yield('title')</h1>
    <br> 
    <form method="POST" action="{{ route('professores.store') }}">
        {{ csrf_field() }}
        <div class="form-group col-sm-6">
            <label for="Nome">Nome</label>
            {{-- Form::text('nome', 'nome') --}}
            <input type="text" name="nome" class="form-control" id="Nome" placeholder="Nome" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="Matrícula">Matrícula</label>
            <input type="text" name="matricula" class="form-control" id="Matrícula" placeholder="Matrícula" maxlength="10">
        </div>
        <div class="form-group col-sm-3">
            <label for="Telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="Telefone" placeholder="(XX)XXXX-XXXX" required maxlength="13">
        </div>
        <div class="form-group col-sm-3">
            <label for="Telefone">WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control" id="WhatsApp" placeholder="(XX)XXXXX-XXXX" required maxlength="13">
        </div>
        <div class="form-group col-sm-6">
            <label for="Email">Endereço e-mail</label>
            <input type="email" name="email" class="form-control" id="Email" placeholder="seuemail@dominio.com" required maxlength="100">
        </div>
        <div class="form-group col-sm-12">                
            <button type="submit" class="btn btn-default">Salvar</button> 
        </div>            
    </form>
@endsection