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

class AuthController extends Controller
{
    public function dashboard()
    {
            $countAlunos = Aluno::count();
            $countCursos = Curso::count();
            return view('sistema.dashboard',['countAlunos'=>$countAlunos,'countCursos'=>$countCursos]);
    }

    public function showLoginForm()
    {

            return view('sistema.formLogin');

    }

    public function validateLogin(Request $request)
    {

        if($request->email == '' || $request->password == '' ){
            return redirect()->back()->withInput()->withErrors(['preencha todos os campos']);
        }
        $credentials = [
            'email' => $request->email,
            'password' => ($request->password)
        ];
        if(Auth::attempt($credentials)){

            return redirect()->route('sistema');

        }

        return redirect()->back()->withInput()->withErrors(['e-mail ou senha incorretos!']);


    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('sistema');


    }

    public function showCreateUserForm()
    {

        return view('sistema.formCreateUser');

    }

    public function validateCreateUser(Request $request)
    {
        if($request->email == '' || $request->password == '' || $request->name == '' ){
            return redirect()->back()->withInput()->withErrors(['preencha todos os campos']);
        }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('sistema.login');

    }








}
