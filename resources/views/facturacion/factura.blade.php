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
    <h1 class="white" style="color: white">
        Comercial Ureña
        <small>Factura</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Factura</a></li>
    </ol>
@endsection
@section('content')
    <div class="box box-warning box-solid">

        @include('facturacion.cabecera')

        @include('facturacion.detalle')

        <div class="box-footer">
            <div class="col-xs-offset-8">
                <dl class="dl-horizontal">
                    <dt>Subtotal:</dt>
                    <dd>$ 0.00</dd>
                    <dt>IVA 12%:</dt>
                    <dd>$ 0.00</dd>
                    <dt>Descuento:</dt>
                    <dd>$ 0.00</dd>
                    <dt>TOTAL:</dt>
                    <dd>$ 0.00</dd>
                </dl>
            </div>
        </div>
    </div>
    @include('facturacion.scripts')
@endsection
@section('scripts')
    <!--JqueryUI-->
    {!! Html::script('plugins/jquery-ui-1.12.1/jquery-ui.min.js') !!}
@endsection