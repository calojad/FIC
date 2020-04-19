<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $factura->id !!}</p>
</div>

<!-- Num Factura Field -->
<div class="form-group">
    {!! Form::label('num_factura', 'Num Factura:') !!}
    <p>{!! $factura->num_factura !!}</p>
</div>

<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    <p>{!! $factura->cliente_id !!}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{!! $factura->subtotal !!}</p>
</div>

<!-- Iva Field -->
<div class="form-group">
    {!! Form::label('iva', 'Iva:') !!}
    <p>{!! $factura->iva !!}</p>
</div>

<!-- Descuento Field -->
<div class="form-group">
    {!! Form::label('descuento', 'Descuento:') !!}
    <p>{!! $factura->descuento !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $factura->total !!}</p>
</div>

<!-- Usuario Id Field -->
<div class="form-group">
    {!! Form::label('usuario_id', 'Usuario Id:') !!}
    <p>{!! $factura->usuario_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $factura->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $factura->updated_at !!}</p>
</div>

