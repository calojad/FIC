@extends('layouts.app')
@section('contentHeader')
    <h1 class="white" style="color: white">
        Comercial Ureña
        <small>Clientes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Mantenimiento</a></li>
        <li><a>Cliente</a></li>
        <li><a>Ver</a></li>
    </ol>
@endsection
@section('content')
    <div class="box box-primary col-md-6 col-md-offset-3">
        <div class="box-header with-border"></div>
        <div class="box-body">
            @include('clientes.show_fields')
        </div>
        <div class="box-footer">
            <a href="{!! route('clientes.index') !!}" class="btn btn-default">Back</a>
        </div>
    </div>
@endsection