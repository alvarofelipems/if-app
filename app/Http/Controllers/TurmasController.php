<?php

namespace App\Http\Controllers;

use App\Turma;
use App\Curso;
use App\Horario;
use App\Grade;
use App\Calendario;
use App\Aula;
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
        $curso = Curso::findOrFail($curso_id);
        return view('turmas.index')->with('curso', $curso);
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
        $turma = Turma::findOrFail($turma_id);
        //dd($turma->load('curso.disciplinas'));
        return view('turmas.show')->with('turma', $turma);
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
        //$aulas = Turma::where('turma_id', $turma_id)->get();
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
        
        foreach ($request->input('professores') as $disciplina_id => $professor_id) {
            if ($professor_id) {
                $aula = Aula::firstOrNew([
                    'turma_id' => $turma->id,
                    'disciplina_id' => $disciplina_id,
                ]);
                $aula->professor_id = $professor_id;
                $aula->save();
            } else {
                Aula::destroy([
                    'turma_id' => $turma->id,
                    'disciplina_id' => $disciplina_id,
                ]);
            }
        }
        
        $turma->save();
        $request->session()->flash('success', 'Turma editada com sucesso');
        return redirect()->back();
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
    
    public function horario($curso_id, $turma_id, $calendario_id)
    {
        $calendario = Calendario::findOrFail($calendario_id);
        $grade = Grade::where('instituicao_id', session('instituicao_id'))->get();
        return view('turmas.horario')->with('grade', $grade)->with('calendario', $calendario);
    }
    
    public function salvarHorario(Request $request, $curso_id, $turma_id, $calendario_id)
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
        return redirect()->route('calendario', [$curso_id, $turma_id, $calendario_id]);
    }
}
