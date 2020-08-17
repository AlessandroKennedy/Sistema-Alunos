
@extends('layouts/app')
@section('title','Novo Aluno')

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
                <form id="login-form" class="form" action="{{route('sistema.validateCreateAluno')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if($errors->all())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                    </div>
                                    @endforeach
                            @endif

                            <h3 class="text-center text-info">Cadastrar Aluno</h3>
                            <div class="form-group">
                                <label for="name" class="text-info">Nome:</label><br>
                                <input type="text" name="name" id="name" placeholder="nome completo" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="image" class="text-info">Foto do aluno:</label>
                            <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="matricula" class="text-info">Matrícula:</label><br>
                                <input type="number" name="matricula" id="matricula" placeholder="numero de matricula" class="form-control">
                            </div>
                            <div class="form-group">

                                <label for="cep" class="text-info">Cep:</label><br>
                                <input type="text" name="cep" id="cep" placeholder="Cep" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="cursos" class="text-info">Curso:</label>
                            <select name="cursos" id="cursos">
                               @foreach($cursos->all() as $curso)
                                <option name="curso" >{{$curso->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">

                                <label for="turma" class="text-info">Turma:</label><br>
                                <input type="text" name="turma" id="turme" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dataMatricula" class="text-info">Data da matrícula:</label><br>
                                <input type="date" name="dataMatricula" id="dataMatricula" value="{{$dataAtual}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="estado" class="text-info">Estado:</label><br>
                                <select  name="estado" id="estado">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
		                            </select>
                            </div>

                            <div class="form-group">
                                <label for="cidade" class="text-info">Cidade:</label><br>
                                <input type="text" name="cidade" id="cidade" placeholder="cidade" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="bairro" class="text-info">Bairro:</label><br>
                                <input type="text" name="bairro" id="bairro" placeholder="bairro" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="rua" class="text-info">Rua:</label><br>
                                <input type="text" name="rua" id="rua" placeholder="rua" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="numero" class="text-info">Numero:</label><br>
                                <input type="number" name="numero" id="numero" placeholder="numero" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="complemento" class="text-info">Complemento:</label><br>
                                <input type="text" name="complemento" id="complemento" placeholder="complemento" class="form-control">
                            </div>

                            <div>
                                <input type="checkbox" id="situacao" name="situacao" checked>
                                <label for="scales">Aluno ativo</label>
                            </div>

                            <div class="form-group">
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Cadastrar">
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
