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
        <li><a>Editar</a></li>
    </ol>
@endsection
@section('content')
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="content">
                {!! Form::model($producto, ['route' => ['productos.update', $producto->id], 'method' => 'patch']) !!}
                @include('productos.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection