@extends('layouts/app')
@section('title','Overview')

@section('sidebar')
<div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <br>
                <div class="navi">
                    <ul>
                        <li ><a href="{{route('sistema')}}"><i class="fa fa-tachometer" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                        <li ><a href="{{route('sistema.alunos')}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Alunos</span></a></li>
                        <li class="active"><a href="{{route('sistema.cursos')}}"><i class="fa fa-book" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cursos</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10 col-sm-11 display-table-cell v-align">

                <div class="user-dashboard">





              <div class="container">
    <br />




        <div class="dual-list list-right col-md-6">
            <div class="well">
                <div class="row">
                    <div class="col-md-2">

                    </div>

                    <h3 class="text-center text-info">Cursos</h3>

                </div>
                <ul class="list-group">
                @if(count($cursos->all()) == 0)
            Nenhum curso cadastrado
                @endif
                @foreach($cursos->all() as $curso)
                 <li class="list-group-item"><b><h4>{{$curso->name}} | Código: {{$curso->codigo}}</h4> </b>
                 <p><a type="button" href="{{route('sistema.formEditCurso',['curso'=>$curso->id])}}" class="btn  btn-info btn-md "><b>editar</b></a>
                 <a  type="button" href="{{route('sistema.deleteCurso',['curso'=>$curso->id])}}"class="btn btn-info btn-md"><b>excluir</b></a>

                 </li>
                @endforeach

                </ul>

                <a type="button" onClick="confirmExclusao()" href="{{route('sistema.formCursos')}}" class="btn btn-info btn-md"><b>criar novo curso</b></a>
                <a type="button" href="{{route('sistema.formImportCursos')}}"  class="btn btn-info btn-md"><b>importar xml</b></a>
            </div>
        </div>

	</div>
</div>


            </div>
        </div>



@endsection
