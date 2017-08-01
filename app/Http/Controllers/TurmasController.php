<?php

namespace App\Http\Controllers;

use App\Turma;
use App\Curso;
use App\Horario;
use App\Grade;
use App\Calendario;
use Illuminate\Http\Request;

class TurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($curso_id)
    {
        $turmas = turma::where('curso_id', $curso_id)->get();
        return view('turmas.index')->with('turmas', $turmas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($curso_id)
    {
        $curso = Curso::where('instituicao_id', session('instituicao_id'))->findOrFail($curso_id);
        return view('turmas.create')->with('curso', $curso);
        
        return view('turmas.create')
            ->with('curso', $curso);
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
        $turma = new Turma;
        $turma->curso_id = $curso->id;
        $turma->nome = $request->input('nome');
        $turma->ano_ini = $request->input('ano_ini');
        $turma->semestre_ini = $request->input('semestre_ini');
        $turma->save();
        $request->session()->flash('success', 'Turma cadastrada com sucesso');
        return redirect()->route('cursos.turmas.index', $curso->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($curso_id, $turma_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($curso_id, $turma_id)
    {
        $curso = Curso::where('instituicao_id', session('instituicao_id'))->findOrFail($curso_id);
        $turma = Turma::findOrFail($turma_id);
        return view('turmas.edit')->with('turma', $turma)->with('curso', $curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $curso_id, $turma_id)
    {
        $curso = Curso::where('instituicao_id', session('instituicao_id'))->findOrFail($curso_id);
        $turma = Turma::findOrFail($turma_id);
        $turma->nome = $request->input('nome');
        $turma->ano_ini = $request->input('ano_ini');
        $turma->semestre_ini = $request->input('semestre_ini');
        $turma->save();
        $request->session()->flash('success', 'Turma editada com sucesso');
        return redirect()->route('cursos.turmas.index', $curso->id);
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
    
    public function horario($curso_id, $turma_id, $periodo_id, $calendario_id)
    {
        $calendario = Calendario::findOrFail($calendario_id);
        $grade = Grade::where('instituicao_id', session('instituicao_id'))->get();
        return view('turmas.horario')->with('grade', $grade)->with('calendario', $calendario);
    }
    
    public function salvarHorario(Request $request, $curso_id, $turma_id, $periodo_id, $calendario_id)
    {
        //dd($request->all());
        foreach ($request->input('disciplina') as $grade_id => $disciplina_id) {
            if ($disciplina_id) {
                $horario = Horario::firstOrNew([
                    'calendario_id' => $calendario_id,
                    'grade_id' => $grade_id,
                ]);
                $horario->disciplina_id = $disciplina_id;
                $horario->save();
                //dd($horario);
            } else {
                Horario::where('calendario_id', $calendario_id)
                    ->where('grade_id', $grade_id)
                    ->delete();
            }
        }
    }
}
