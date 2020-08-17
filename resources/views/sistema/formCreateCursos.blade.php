
@extends('layouts/app')
@section('title','Novo Curso')

@section('sidebar')

<div class="row display-table-row">
<h3 class="text-center text-info ">Novo Curso</h3>
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <br>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="{{route('sistema.cursos')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="hidden-xs hidden-sm"><b>Voltar</b></span></a></li>

                    </ul>
                </div>
            </div>


            <div class="col-md-10 col-sm-11 display-table-cell v-align">

                <div class="user-dashboard">

                <form id="login-form" class="form" action="{{route('sistema.validateCreateCurso')}}" method="post">
                            @csrf


                            @if($errors->all())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                    </div>
                                    @endforeach
                            @endif

                             <div class="form-group col-md-5 ">
                                <label for="name" class="text-info">Nome:</label><br>
                                <input type="text" name="name" id="name" placeholder="nome do curso" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="codigo" class="text-info">Codigo:</label><br>
                                <input type="number" name="codigo" id="codigo" placeholder="codigo do curso" class="form-control">
                            </div>
                            <div class="form-group">
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Cadastrar">
                            </div>

                        </form>

            </div>
        </div>
@endsection
