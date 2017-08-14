<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('instituicoes', 'InstituicoesController');
Route::resource('professores', 'ProfessoresController');
Route::resource('cursos', 'CursosController');
Route::resource('disciplinas', 'DisciplinasController');
Route::resource('cursos.disciplinas', 'DisciplinasController');

Route::resource('cursos.turmas', 'TurmasController');
Route::resource('cursos.turmas.periodos', 'PeriodosController');
Route::get('cursos/{curso_id}/turmas/{turmas_id}/calendarios/{calendario_id}', 'TurmasController@horario')->name('calendario');
Route::post('cursos/{curso_id}/turmas/{turmas_id}/calendarios/{calendario_id}', 'TurmasController@salvarHorario')->name('cursos.turmas.salvarHorario');

Route::resource('turmas.horarios', 'HorariosController');
Route::resource('grade', 'GradesController');
Route::resource('home', 'HomeController');
Route::auth();

