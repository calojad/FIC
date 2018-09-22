@extends('layouts.app')
@section('contentHeader')
    <h1 class="white" style="color: white">
        Comercial Ureña
        <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Mantenimiento</a></li>
        <li><a>Usuario</a></li>
        <li><a>Editar</a></li>
    </ol>
@endsection
@section('content')
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="content">
                {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'patch']) !!}
                @include('usuarios.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection