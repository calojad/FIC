@extends('layouts.app')
@section('contentHeader')
    <h1>
        {{config('app.name','FIC')}}
        <small>Clientes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Mantenimiento</a></li>
        <li><a>Clientes</a></li>
        <li><a>Crear</a></li>
    </ol>
@endsection
@section('content')
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Cliente</h3>
        </div>
        <div class="box-body">
            <div class="content">
                {!! Form::open(['route' => 'clientes.store']) !!}
                @include('clientes.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection