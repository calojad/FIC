@extends('layouts.app')
@section('contentHeader')
    <h1>
        {{config('app.name','FIC')}}
        <small>Clientes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Mantenimiento</a></li>
        <li><a>Cliente</a></li>
        <li><a>Editar</a></li>
    </ol>
@endsection
@section('content')
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="content">
                {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'patch']) !!}
                @include('clientes.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection