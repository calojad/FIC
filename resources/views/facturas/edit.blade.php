@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Factura
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($factura, ['route' => ['facturas.update', $factura->id], 'method' => 'patch']) !!}

                        @include('facturas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection