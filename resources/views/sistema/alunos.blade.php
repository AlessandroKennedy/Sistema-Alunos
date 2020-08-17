@extends('layouts/app')
@section('title','Overview')

@section('sidebar')
<div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <br>
                <div class="navi">
                    <ul>
                        <li ><a href="{{route('sistema')}}"><i class="fa fa-tachometer" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                        <li class="active"><a href="{{route('sistema.alunos')}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Alunos</span></a></li>
                        <li><a href="{{route('sistema.cursos')}}"><i class="fa fa-book" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cursos</span></a></li>
                    </ul>
                </div>
            </div>
            <h3 class="text-center text-info">Pesquisar aluno</h3>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <div class="col-md-6 ">
                <div class="user-dashboard">



            <form id="search-form" class="form" action="{{route('sistema.pesquisaAlunos')}}" method="get">
            <div class="form-group">
                                <label for="estado" class="text-info">Pesquisar por:</label>
                                <select  name="modoPesquisa" id="modoPesquisa">
                                            <option value="id">id do aluno</option>
                                            <option value="matricula">Código de matrícula</option>
		                        </select>
                <input type="text" name="pesquisa" id="pesquisa"  class="form-control" placeholder="pesquisar aluno.." />
            </div>
                <input type="submit" name="submit" class="btn btn-info btn-md" value="Pesquisar">
                <a href="{{route('sistema.formAlunos')}}" class="btn btn-info btn-md">Cadastrar novo aluno</a>
           </form>
<br><br><br><br>

@if(isset($aluno))
 <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">

                        <img src="{{ url('storage/' . $aluno->image) }}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            {{$aluno->name}}</h4>
                        <small><cite title="cidade">{{$aluno->cidade}}-{{$aluno->estado}} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class=""></i>{{$aluno->bairro}} - {{$aluno->rua}} Nº {{$aluno->numero}} - complemento: {{$aluno->complemento}}
                            <br />
                            <i class=""> Matrícula: {{$aluno->matricula}}</i> <i class=""> Curso: {{$aluno->curso}}</i>
                            <br />
                            <i class="">@if($aluno->situacao == 1) aluno ativo @else aluno inativo @endif</i></br><i class=""> Turma: {{$aluno->turma}}</i> </br> <i class=""> Data de matrícula: {{$aluno->dataMatricula}}</i>
                            <br />
                            <a class="btn btn-info btn-md" href="{{route('sistema.formEditAluno',['aluno'=>$aluno->id])}}"><b>Editar aluno</b></a>
                            <a  class="btn btn-info btn-md" href="{{route('sistema.deleteAluno',['aluno'=>$aluno->id])}}"><b>Excluir aluno</b></a>
                        <div class="btn-group">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@else
<div class="well well-sm">
<h3>Aluno não encontrado...</h3>
</div>
@endif


            </div>






        </div>
@endsection
