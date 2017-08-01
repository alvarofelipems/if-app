<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Instituicao;

class InstituicoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		return view('instituicoes.index')->with('instituicoes', Instituicao::all());
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
		return view('instituicoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */        
    public function store(Request $request)
	{
        $instituicao = new Instituicao;
        $instituicao->nome = $request->input('nome');
        $instituicao->cnpj = $request->input('cnpj');
        $instituicao->ie = $request->input('ie');
        $instituicao->endereco = $request->input('endereco');
        $instituicao->numero = $request->input('numero');
        $instituicao->complemento = $request->input('complemento');
        $instituicao->cidade = $request->input('cidade');
        $instituicao->uf = $request->input('uf');
        $instituicao->cep = $request->input('cep');
        $instituicao->telefone = $request->input('telefone');
        $instituicao->email = $request->input('email');
        $instituicao->save();
        return redirect()->route('instituicoes.index');
     }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
	{
		session(['instituicao_id' => $id]);
        return redirect()->route('cursos.index');
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('instituicoes.edit')->with('instituicao', Instituicao::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $instituicao = Instituicao::findOrFail($id);
        $instituicao->nome = $request->input('nome');
        $instituicao->nome = $request->input('nome');
        $instituicao->cnpj = $request->input('cnpj');
        $instituicao->ie = $request->input('ie');
        $instituicao->endereco = $request->input('endereco');
        $instituicao->numero = $request->input('numero');
        $instituicao->complemento = $request->input('complemento');
        $instituicao->cidade = $request->input('cidade');
        $instituicao->uf = $request->input('uf');
        $instituicao->cep = $request->input('cep');
        $instituicao->telefone = $request->input('telefone');
        $instituicao->email = $request->input('email');
        $instituicao->save();
        
        $request->session()->flash('success', 'Os dados da instituição foram alterados');
        return redirect()->route('instituicoes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
