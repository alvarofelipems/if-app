<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = Grade::where('instituicao_id', session('instituicao_id'))->get();
        return view('grades.index')->with('grade', $grade);
//
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
    public function store(Request $request)
    {
        //Incluir novos horários na grade
        foreach($request->input('new_horario') ?? [] as $inputsHorario) {
            $horario = new Grade;
            $horario->inicio = $inputsHorario['inicio'];
            $horario->fim = $inputsHorario['fim'];
            $horario->dia_semana = $inputsHorario['dia_semana'];
            $horario->instituicao_id = session('instituicao_id');
            
            if ($horario->inicio and $horario->fim)
                $horario->save();
        }
        
        //Salvar Modificações da grade
        foreach($request->input('horario') ?? [] as $horario_id => $inputsHorario) {
            $horario = Grade::find($horario_id);
            $horario->inicio = $inputsHorario['inicio'];
            $horario->fim = $inputsHorario['fim'];
            
            if ($horario->inicio and $horario->fim)
                $horario->save();
            else
                $horario->delete();
        }
        $request->session()->flash('success', 'Grade editada com sucesso');
        return redirect()->route('grade.index');
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
