<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;

use Validator;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('cursos.index')->with('cursos', Curso::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, $id = null)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'          => 'required',
            //'ano'          => 'required',
            /*'documento'     => 'required|numeric',
            'email'         => 'required|email',
            'telefone'      => 'numeric',
            'celular'       => 'numeric',
            
            'logradouro'    => 'required',
            'numero'        => 'required|numeric',
            'bairro'        => 'required',
            'cidade'        => 'required',
            'cep'           => 'required|numeric',*/
        );
        $rules = [];
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('cursos/create')
                ->withErrors($validator);
        } else {
            // store
            $cursos = Curso::findOrNew($id);
            $cursos->fill($request->except('_token'));
            $cursos->save();

            // redirect
            $request->session()->flash('message', 'Curso cadastrado com sucesso');
            return redirect('cursos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        return view('cursos.show')->with('curso', Curso::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return view('cursos.edit')->with('curso', Curso::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->store($request, $id);
        return redirect('cursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
