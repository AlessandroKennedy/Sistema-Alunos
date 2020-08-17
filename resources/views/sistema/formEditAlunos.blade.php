
@extends('layouts/app')
@section('title','Editar Aluno')

@section('sidebar')
<div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <br>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="{{route('sistema.alunos')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="hidden-xs hidden-sm"><b>Voltar</b></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <div class="user-dashboard">
                <form id="login-form" class="form" action="{{route('sistema.validateEditAluno')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if($errors->all())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                    </div>
                                    @endforeach
                            @endif
                            <h3 class="text-center text-info">Editar Aluno</h3>
                            <div class="form-group">
                                <label for="name" class="text-info">Nome:</label><br>
                                <input type="text" name="name" id="name" value="{{$aluno->name}}" placeholder="nome completo" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="image" class="text-info">Foto do aluno:</label>
                            <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="matricula" class="text-info">Matrícula:</label><br>
                                <input type="number" name="matricula" value="{{$aluno->matricula}}" id="matricula" placeholder="numero de matricula" class="form-control">
                            </div>
                            <div class="form-group">

                                <label for="cep" class="text-info">Cep:</label><br>
                                <input type="text" name="cep" id="cep"value="{{$aluno->cep}}"  placeholder="Cep" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="cursos" class="text-info">Curso:</label>
                            <select name="cursos" id="cursos" >
                               @foreach($cursos->all() as $curso)
                                <option id="{{$curso->name}}" @if($curso->name == $aluno->curso) selected @endif name="{{$curso->name}}" >{{$curso->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">

                            <label for="turma" class="text-info">Turma:</label><br>
                            <input type="text" name="turma" id="turma" value="{{$aluno->turma}}" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="dataMatricula" class="text-info">Data da matrícula:</label><br>
                            <input type="date" name="dataMatricula" id="dataMatricula" value="{{$aluno->dataMatricula}}"  readonly=“true” class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="estado" class="text-info">Estado:</label><br>
                                <select id="estado">
                                            <option value="AC" @if($aluno->estado == 'AC') selected @endif >Acre</option>
                                            <option value="AL" @if($aluno->estado == 'AL') selected @endif >Alagoas</option>
                                            <option value="AP" @if($aluno->estado == 'AP') selected @endif >Amapá</option>
                                            <option value="AM" @if($aluno->estado == 'AM') selected @endif >Amazonas</option>
                                            <option value="BA" @if($aluno->estado == 'BA') selected @endif >Bahia</option>
                                            <option value="CE" @if($aluno->estado == 'CE') selected @endif >Ceará</option>
                                            <option value="DF" @if($aluno->estado == 'DF') selected @endif >Distrito Federal</option>
                                            <option value="ES" @if($aluno->estado == 'ES') selected @endif >Espírito Santo</option>
                                            <option value="GO" @if($aluno->estado == 'GO') selected @endif >Goiás</option>
                                            <option value="MA" @if($aluno->estado == 'MA') selected @endif >Maranhão</option>
                                            <option value="MT" @if($aluno->estado == 'MT') selected @endif >Mato Grosso</option>
                                            <option value="MS" @if($aluno->estado == 'MG') selected @endif >Mato Grosso do Sul</option>
                                            <option value="MG" @if($aluno->estado == 'MG') selected @endif >Minas Gerais</option>
                                            <option value="PA" @if($aluno->estado == 'PA') selected @endif >Pará</option>
                                            <option value="PB" @if($aluno->estado == 'PB') selected @endif >Paraíba</option>
                                            <option value="PR" @if($aluno->estado == 'PR') selected @endif >Paraná</option>
                                            <option value="PE" @if($aluno->estado == 'PE') selected @endif >Pernambuco</option>
                                            <option value="PI" @if($aluno->estado == 'PI') selected @endif >Piauí</option>
                                            <option value="RJ" @if($aluno->estado == 'RJ') selected @endif >Rio de Janeiro</option>
                                            <option value="RN" @if($aluno->estado == 'RN') selected @endif >Rio Grande do Norte</option>
                                            <option value="RS" @if($aluno->estado == 'RS') selected @endif >Rio Grande do Sul</option>
                                            <option value="RO" @if($aluno->estado == 'RO') selected @endif >Rondônia</option>
                                            <option value="RR" @if($aluno->estado == 'RR') selected @endif >Roraima</option>
                                            <option value="SC" @if($aluno->estado == 'SC') selected @endif >Santa Catarina</option>
                                            <option value="SP" @if($aluno->estado == 'SP') selected @endif >São Paulo</option>
                                            <option value="SE" @if($aluno->estado == 'SE') selected @endif >Sergipe</option>
                                            <option value="TO" @if($aluno->estado == 'TO') selected @endif >Tocantins</option>
		                            </select>
                            </div>

                            <div class="form-group">
                                <label for="cidade" class="text-info">Cidade:</label>
                                <input type="text" name="cidade" value="{{$aluno->cidade}}" id="cidade" placeholder="cidade" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="bairro" class="text-info">Bairro:</label>
                                <input type="text" value="{{$aluno->bairro}}" name="bairro" id="bairro" placeholder="bairro" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="rua" class="text-info">Rua:</label>
                                <input type="text" value="{{$aluno->rua}}" name="rua" id="rua" placeholder="rua" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="numero" class="text-info">Numero:</label><br>
                                <input type="number" value="{{$aluno->numero}}"  name="numero" id="numero" placeholder="numero" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="complemento" class="text-info">Complemento:</label><br>
                                <input type="text" value="{{$aluno->complemento}}" name="complemento" id="complemento" placeholder="complemento" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="id" class="text-info">Id:</label><br>
                                <input type="text" value="{{$aluno->id}}"  readonly=“true” name="id" id="id" class="form-control">
                            </div>

                            <div>
                                <input type="checkbox" id="situacao" name="situacao" @if($aluno->situacao == 1) checked @endif >
                                <label for="scales">Aluno ativo</label>
                            </div>

                            <div class="form-group">
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Salvar">
                            </div>
                        </form>
                </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
    $("#cep").focusout(function(){
        $.ajax({
            url: 'https://serviceweb.aix.com.br/aixapi/api/cep/'+$(this).val(),
            dataType: 'json',
            success: function(resposta){
                $("#rua").val(resposta.logradouro);
                $("#bairro").val(resposta.bairro);
                $("#cidade").val(resposta.cidade);
                $("#estado").val(resposta.estado);
            }
        });
    });
</script>

@endsection
