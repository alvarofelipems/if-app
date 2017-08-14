<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Disciplina;
use App\Curso;
use App\Professor;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($curso_id)
    {
        $curso = Curso::findOrFail($curso_id);
        return view('disciplinas.index')->with('curso', $curso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($curso_id)
    {
        $curso = Curso::where('instituicao_id', session('instituicao_id'))->findOrFail($curso_id);
        $professores = Professor::where('instituicao_id', session('instituicao_id'))->get();
        return view('disciplinas.create')->with('curso', $curso)->with('professores', $professores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $curso_id)
    {
        $curso = Curso::where('instituicao_id', session('instituicao_id'))->findOrFail($curso_id);
        $disciplina = new Disciplina;
        $disciplina->curso_id = $curso->id;
        $disciplina->nome = $request->input('nome');
        $disciplina->periodo = $request->input('periodo');
        
        $disciplina->save();
        
        $request->session()->flash('success', 'Disciplina cadastrada com sucesso');
        return redirect()->route('cursos.disciplinas.index', $curso->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($curso_id, $disciplina_id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($curso_id, $disciplina_id)
    {
        $curso = Curso::where('instituicao_id', session('instituicao_id'))->findOrFail($curso_id);
        $disciplina = Disciplina::findOrFail($disciplina_id);
        
        $professores = Professor::where('instituicao_id', session('instituicao_id'))->get();
        //dd($professores);
        return view('disciplinas.edit')->with('disciplina', $disciplina)->with('professores', $professores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $curso_id, $disciplina_id)
    {
        $curso = Curso::where('instituicao_id', session('instituicao_id'))->findOrFail($curso_id);
        $disciplina = Disciplina::findOrFail($disciplina_id);
        //$disciplina->professor_id = $request->input('professor_id');

        $disciplina->nome = $request->input('nome');
        $disciplina->periodo = $request->input('periodo');
        $disciplina->save();
        
        $disciplina->professores()->sync(array_keys($request->input('professores')));
        
        $request->session()->flash('success', 'Disciplina editada com sucesso');
        
        return redirect()->route('cursos.disciplinas.index', $curso->id);
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
