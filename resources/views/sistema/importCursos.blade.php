@extends('layouts/app')
@section('title','Overview')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


@section('sidebar')


<form id="import-form" class="form" action="{{route('sistema.validateImportCursos')}}" method="post" enctype="multipart/form-data">
@csrf
                            @if($errors->all())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                    </div>
                                    @endforeach
                            @endif
<input type="file" name="xml" >

<input type="submit" name="submit" class="btn btn-info btn-md" value="enviar">
</form>


@endsection
