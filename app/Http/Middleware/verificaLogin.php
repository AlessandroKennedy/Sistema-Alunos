<?php

namespace App\Http\Middleware;

use Closure;

class verificaLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         if(Auth::check()== true){

            return view('sistema.dashboard',['countAlunos'=>$countAlunos,'countCursos'=>$countCursos]);
        }else{

            return $next($request);
        }

    }
}
