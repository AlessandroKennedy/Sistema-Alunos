<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Aluno;
use App\Curso;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class AlunoController extends Controller
{


    public function showAlunos(Request $request)
    {

        $user = Auth::User();


        return view('sistema.alunos');
    }

    public function pesquisaAlunos(Request $request)
    {


        $user = Auth::User();
        if($request->modoPesquisa == 'id'){
            $aluno = Aluno::where('id','=',$request->pesquisa)->first();
        }else if($request->modoPesquisa == 'matricula'){
            $aluno = Aluno::where('matricula','=',($request->pesquisa))->first();
        }else{
            $aluno = null;
        }

        return view('sistema.alunos',['user'=>$user->name,'aluno'=>$aluno]);
    }



    public function formAlunos()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $cursos = Curso::get();
        $dataAtual = date('yy-m-d');
        return view('sistema.formCreateAlunos',['cursos'=>$cursos,'dataAtual'=>$dataAtual]);

    }


    public function formEditAlunos(Request $request)
    {
        $aluno = Aluno::where('id','=',$request->aluno)->first();
        $cursos = Curso::get();

        return view('sistema.formEditAlunos',['aluno'=>$aluno,'cursos'=>$cursos]);

    }



    public function validateCadastroAluno(Request $request)
    {

        if($request->name == '' || $request->matricula == '' ||  $request->cursos == '' || $request->turma == ''  || $request->dataMatricula == '' || $request->cep == '' || $request->estado == '' || $request->cidade == ''|| $request->bairro == ''|| $request->rua == ''|| $request->complemento == ''|| $request->image == null)
        {
            return redirect()->back()->withInput()->withErrors(['preencha todos os campos']);
        }


            $upload = $request->image->store('alunos');


             $aluno = new Aluno();
             $aluno->name = $request->name;
             $aluno->image = $upload;
             $aluno->matricula = $request->matricula;
             $aluno->curso = $request->cursos;
             $aluno->turma = $request->turma;
             $aluno->dataMatricula = $request->dataMatricula;
             $aluno->cep = $request->cep;
             $aluno->estado = $request->estado;
             $aluno->cidade = $request->cidade;
             $aluno->bairro = $request->bairro;
             $aluno->rua = $request->rua;
             $aluno->numero = $request->numero;
             $aluno->complemento = $request->complemento;
             if($request->situacao == null){
                $aluno->situacao = 0;
            }
             $aluno->save();
             return redirect()->route('sistema.alunos');

    }

    public function validateEditAluno(Request $request)
    {

        if($request->name == '' || $request->matricula == '' ||  $request->cursos == '' || $request->turma == ''  || $request->dataMatricula == '' || $request->cep == '' || $request->estado == '' || $request->cidade == ''|| $request->bairro == ''|| $request->rua == ''|| $request->complemento == ''|| $request->image == null)
        {
            return redirect()->back()->withInput()->withErrors(['preencha todos os campos']);
        }
            $upload = $request->image->store('alunos');

             $aluno = Aluno::find($request->id);
             $aluno->name = $request->name;
             $aluno->image = $upload;
             $aluno->matricula = $request->matricula;
             $aluno->curso = $request->cursos;
             $aluno->cep = $request->cep;
             $aluno->estado = $request->estado;
             $aluno->cidade = $request->cidade;
             $aluno->bairro = $request->bairro;
             $aluno->rua = $request->rua;
             $aluno->numero = $request->numero;
             $aluno->complemento = $request->complemento;
             if($request->situacao == null){
                $aluno->situacao = 0;
             }
             $aluno->save();
             return redirect()->route('sistema.alunos');

    }

    public function  deleteAluno(Request $request)
    {
        $aluno = Aluno::find($request->aluno);
        $aluno->delete();
        return redirect()->route('sistema.alunos');
    }





}
