@extends('layouts.app')
@section('contentHeader')
    <h1>
        {{config('app.name','FIC')}}
        <small>Facturas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Facturas</a></li>
    </ol>
@endsection
@section('content')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-md-12">
                <a class="btn btn-primary pull-right" style="margin-bottom: 5px" href=""><i class="fa fa-plus"></i>
                    Add New</a>
            </div>
            <div class="col-md-12 table-responsive">
                @include('facturas.table')
            </div>
        </div>
    </div>
    @include('facturas.scripts')
@endsection

