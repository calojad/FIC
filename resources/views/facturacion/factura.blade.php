@extends('layouts.app')
@section('css')
    <!-- Jquery UI -->
    {!! Html::style('plugins/jquery-ui-1.12.1/jquery-ui.css') !!}
    <style>
        .ui-autocomplete {
            max-height: 180px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
@endsection
@section('contentHeader')
    <h1>
        {{config('app.name','FIC')}}
        <small>Factura</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Factura</a></li>
    </ol>
@endsection
@section('content')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-warning box-solid">
        @include('facturacion.cabecera')
        @include('facturacion.detalle')
        <div class="box-footer">
            <div class="col-md-11">
                <div class="col-md-6 pull-left">
                    <a id="btnGuardarFactura" class="btn btn-primary btnLoader"><i class="fa fa-save"></i> Guardar Factura</a>
                </div>
                <div class="col-md-6">
                    <dl class="dl-horizontal pull-right" style="font-size: 13pt;text-align: right">
                        <dt>Subtotal:</dt>
                        <dd>$ <span id="subtotal">0.00</span></dd>
                        <dt>IVA 12%:</dt>
                        <dd>$ <span id="iva">0.00</span></dd>
                        <dt>Descuento:</dt>
                        <dd>$ <span id="descuento">0.00</span></dd>
                        <dt>TOTAL:</dt>
                        <dd id="totalTotal" class="bg-black" style="padding: 2px"> $ 0.00</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    @include('facturacion.scripts')
@endsection
@section('scripts')
    <!--JqueryUI-->
    {!! Html::script('plugins/jquery-ui-1.12.1/jquery-ui.min.js') !!}
@endsection