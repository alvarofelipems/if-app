<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Professor;
use App\Instituicao;

class ProfessoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professor::where('instituicao_id', session('instituicao_id'))->get();
        return view('professores.index')->with('professores', $professores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$instituicao = Instituicao::findOrFail($request->input('instituicao_id'));
        $professor = new Professor;
        //$professor->instituicao_id = Instituicao::fist()->id;//aponta a primeira instituição cadastrada no banco.
        //$professor->instituicao_id = $instituicao->id;
        $professor->instituicao_id = $request->session()->get('instituicao_id');
        $professor->nome = $request->input('nome');
        $professor->matricula = $request->input('matricula');
        $professor->telefone = $request->input('telefone');
        $professor->whatsapp = $request->input('whatsapp');
        $professor->email = $request->input('email');
        //dd($professor);
        
        $professor->save();
        $request->session()->flash('success', 'Professor cadastrado com sucesso');
        return redirect()->route('professores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.edit')->with('professor', $professor);
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
        $professor = Professor::findOrFail($id);
        $professor->nome = $request->input('nome');
        $professor->matricula = $request->input('matricula');
        $professor->email = $request->input('email');
        $professor->telefone = $request->input('telefone');
        $professor->whatsapp = $request->input('whatsapp');
        $professor->save();
        
        $request->session()->flash('success', 'Professor editado com sucesso');
        return redirect()->route('professores.index');
        
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
