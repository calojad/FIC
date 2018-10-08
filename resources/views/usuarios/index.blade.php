@extends('layouts.app')
@section('contentHeader')
    <h1>
        {{config('app.name','FIC')}}
        <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Mantenimiento</a></li>
        <li><a>Usuarios</a></li>
    </ol>
@endsection
@section('content')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            {{--<div class="col-md-12">
                <a class="btn btn-primary pull-right" style="margin-bottom: 5px"
                   href="{!! route('usuarios.create') !!}">Add New</a>
            </div>--}}
            <div class="col-md-12 table-responsive">
                @include('usuarios.table')
            </div>
        </div>
    </div>
    @include('usuarios.scripts')
@endsection

