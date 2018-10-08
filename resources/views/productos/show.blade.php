@extends('layouts.app')
@section('contentHeader')
    <h1>
        {{config('app.name','FIC')}}
        <small>Productos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Mantenimiento</a></li>
        <li><a>Producto</a></li>
        <li><a>Ver</a></li>
    </ol>
@endsection
@section('content')
    <div class="box box-primary col-md-5 col-md-offset-3">
        <div class="box-header with-border"></div>
        <div class="box-body">
            @include('productos.show_fields')
        </div>
        <div class="box-footer">
            <a href="{!! route('productos.index') !!}" class="btn btn-default">Back</a>
        </div>
    </div>
@endsection