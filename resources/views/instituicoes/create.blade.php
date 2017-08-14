@extends('layouts.app')

@section('title', 'Cadastro de instituições')
@section('content')
    <h1 class="text-center">@yield('title')</h1>
       <br> 
        <form method="POST" action="{{ route('instituicoes.store') }}">
            {{ csrf_field() }}
            <div class="responsive">
                <div class="form-group col-sm-6">
                    <label for="Razão Social">Razão Social</label>
                    <input type="text" name="nome" class="form-control" id="Razão Social" placeholder="Razão Social" required maxlength="255">
                </div>
                <div class="form-group col-sm-3">
                    <label for="CNPJ">CNPJ</label>
                    <input type="text" name="cnpj" class="form-control" id="CNPJ" placeholder="XX.XXX.XXX/XXXX-XX" required maxlength="18">
                </div>
                <div class="form-group col-sm-3">
                    <label for="Inscrição Estadual">Inscrição Estadual</label>
                    <input type="text" name="ie" class="form-control" id="Inscrição Estadual" placeholder="Inscrição Estadual"required maxlength="15">
                </div>
                <div class="form-group col-sm-6">
                    <label for="Endereço">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="Endereço" placeholder="Endereço" required maxlength="250">
                </div>
                <div class="form-group col-sm-2">
                    <label for="Número">Número</label>
                    <input type="text" name="numero"class="form-control" id="Número" placeholder="Número" required maxlength="5">
                </div>
                <div class="form-group col-sm-4">
                    <label for="Complemento">Complemento</label>
                    <input type="text" name="complemento" class="form-control" id="Complemento" placeholder="Complemento" required maxlength="150">
                </div>         
                <div class="form-group col-sm-4">
                    <label for="Cidade">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="Cidade" placeholder="Cidade" required maxlength="100">
                </div>
                <div class="form-group col-sm-2">
                    <label for="UF">UF</label>
                    <input type="text" name="uf" class="form-control" id="UF" placeholder="UF" required maxlength="2">
                </div>          
                <div class="form-group col-sm-2">
                    <label for="CEP">CEP</label>
                    <input type="number" name="cep" class="form-control" id="CEP" placeholder="XX.XXX-XXX" required maxlength="10">
                </div>
                <div class="form-group col-sm-4">
                    <label for="Telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="Telefone" placeholder="(XX)XXXX-XXXX" required maxlength="13">
                </div>
                <div class="form-group col-sm-6">
                    <label for="Email">Endereço e-mail</label>
                    <input type="email" name="email" class="form-control" id="Email" placeholder="Email" required maxlength="80">
                </div>
                <div class="form-group col-sm-12">                
                <a href="{{ route('instituicoes.index') }}" class="btn btn-primary">Cancelar</a>  
                <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
@endsection        
