<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Aluno;
use App\Curso;
use Symfony\Component\HttpFoundation\Response;

class CursoController extends Controller
{


    public function showCursos()
    {

        $user = Auth::User();
        $cursos = Curso::get();
        return view('sistema.cursos',['user'=>$user->name,'cursos'=>$cursos]);


    }

    public function formCursos()
    {

        return view('sistema.formCreateCursos');


    }

    public function formEditCursos(Request $request)
    {

        $curso = Curso::where('id','=',$request->curso)->first();

        return view('sistema.formEditCursos',['curso'=>$curso]);


    }

    public function validateCadastroCurso(Request $request)
    {

        if($request->name != '' && $request->codigo != '')
        {
             $curso = new Curso();
             $curso->name = $request->name;
             $curso->codigo = $request->codigo;
             $curso->save();
             return redirect()->route('sistema.cursos');
        }else{
            return redirect()->back()->withInput()->withErrors(['Preencha todos os campos']);
        }
    }



    public function validateEditCurso(Request $request)
    {

        if($request->name != '' && $request->codigo != '')
        {
             $curso = Curso::find($request->id);
             $curso->name = $request->name;
             $curso->codigo = $request->codigo;
             $curso->save();
             return redirect()->route('sistema.cursos');
        }else{
         return redirect()->back()->withInput()->withErrors(['Preencha todos os campos']);
        }
    }


    function formImportCursos()
    {
        return view('sistema.importCursos');
    }

    function validateImportCursos(Request $request)
    {

        libxml_use_internal_errors(true);
        $xml = simplexml_load_file($request->file('xml'));

        //$xml = simplexml_load_file($request->file('xml'));
        if(!isset($request->xml)){

            return redirect()->back()->withInput()->withErrors(['Selecione um arquivo xml']);

        }
        if($xml != null)
        {
            foreach($xml->curso as $curso){
            $novoCurso = new Curso();
            $novoCurso->name = $curso->nome;
            $novoCurso->codigo = $curso->codigo;
            $novoCurso->save();
            }
            return redirect()->route('sistema.cursos');
        }else{
            return redirect()->back()->withInput()->withErrors(['arquivo inválido']);
        }
    }

    function deleteCurso(Request $request)
    {
        $curso = Curso::find($request->curso);
        $curso->delete();
        return redirect()->route('sistema.cursos');
    }



}
