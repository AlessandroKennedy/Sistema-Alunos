<?php

use Illuminate\Support\Facades\Route;


  Route::get('/', function () {
    return redirect()->route('sistema');
  });

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


//rotas de do sistema




Route::get('/login', 'AuthController@showLoginForm')->name('sistema.login');
Route::get('/createuser', 'AuthController@showCreateUserForm')->name('sistema.createUser');
Route::post('/createuser', 'AuthController@validateCreateUser')->name('sistema.validateCreateUser');
Route::get('/logout', 'AuthController@logout')->name('sistema.logout')->middleware('auth');
Route::post('/login', 'AuthController@validateLogin')->name('sistema.validateLogin');

Route::group(['middleware' => ['auth']], function () {
Route::get('/dashboard', 'AuthController@dashboard')->name('sistema');


//rotas de cursos

Route::prefix('dashboard/')->group(function () {
Route::get('cursos', 'CursoController@showCursos')->name('sistema.cursos');
Route::get('cursos/new', 'CursoController@formCursos')->name('sistema.formCursos');
Route::post('cursos/new', 'CursoController@validateCadastroCurso')->name('sistema.validateCreateCurso');
Route::get('cursos/edit', 'CursoController@formEditCursos')->name('sistema.formEditCurso');
Route::post('cursos/edit', 'CursoController@validateEditCurso')->name('sistema.validateEditCurso');
Route::get('cursos/delete', 'CursoController@deleteCurso')->name('sistema.deleteCurso');
Route::get('cursos/import', 'CursoController@formImportCursos')->name('sistema.formImportCursos');
Route::post('cursos/import', 'CursoController@validateImportCursos')->name('sistema.validateImportCursos');
});

//rotas de alunos

Route::prefix('dashboard/')->group(function () {
Route::get('alunos', 'AlunoController@showAlunos')->name('sistema.alunos');
Route::get('alunos/search', 'AlunoController@pesquisaAlunos')->name('sistema.pesquisaAlunos');
Route::get('alunos/new', 'AlunoController@formAlunos')->name('sistema.formAlunos');
Route::post('alunos/new', 'AlunoController@validateCadastroAluno')->name('sistema.validateCreateAluno');
Route::get('alunos/edit', 'AlunoController@formEditAlunos')->name('sistema.formEditAluno');
Route::post('alunos/edit', 'AlunoController@validateEditAluno')->name('sistema.validateEditAluno');
Route::get('alunos/delete', 'AlunoController@deleteAluno')->name('sistema.deleteAluno');
});

});
