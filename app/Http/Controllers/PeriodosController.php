<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Periodo;
use App\Curso;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($curso_id, $turma_id)
    {
        //$turma::where('curso_id', $curso_id)->where('turma_id', $turma_id)->get();
        $turma = Turma::findOrFail($turma_id);
        return view('periodos.index')->with('periodos', $turma->periodos)->with('turma', $turma);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $curso_id, $turma_id)
    {
        foreach($request->input('periodo') ?? [] as $key => $valor) {
            $periodo = Periodo::findOrFail($key);
            $periodo->nome = $valor;
            $periodo->save();
        }
        
        foreach($request->input('novo_periodo') ?? [] as $valor) {
            $periodo = new Periodo;
            $periodo->nome = $valor;
            $periodo->turma_id = $turma_id;
            $periodo->save();
        }
        
        $request->session()->flash('success', 'Periodo cadastrada com sucesso');
        return redirect()->route('cursos.turmas.periodos.index', [$curso_id, $turma_id]);
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
        //
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
        //
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
