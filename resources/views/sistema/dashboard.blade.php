@extends('layouts/app')
@section('title','Overview')

@section('sidebar')
<div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <br>



                <div class="navi">
                    <ul>
                        <li class="active"><a href="{{route('sistema')}}"><i class="fa fa-tachometer" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                        <li><a href="{{route('sistema.alunos')}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Alunos</span></a></li>
                        <li><a href="{{route('sistema.cursos')}}"><i class="fa fa-book" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cursos</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10 col-sm-11 display-table-cell v-align">

            <div class="user-dashboard"><b>{{ Auth::user()->name }}</b>




              <a type="button" href="{{route('sistema.logout')}}" class="btn btn-dark"><b>sair</b></a>

              <h1>Painel Administrativo</h1>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                            <div class="sales">
                                <h2>Alunos matriculados: {{$countAlunos}}</h2>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 gutter">

                            <div class="sales report">
                                <h2>Cursos cadastrados: {{$countCursos}}</h2>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection
