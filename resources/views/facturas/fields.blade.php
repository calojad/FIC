<!-- Num Factura <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_factura', 'Num Factura <span class="required">*</span>:') !!}
    {!! Form::text('num_factura', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Id <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id <span class="required">*</span>:') !!}
    {!! Form::number('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal <span class="required">*</span>:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Iva <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iva', 'Iva <span class="required">*</span>:') !!}
    {!! Form::number('iva', null, ['class' => 'form-control']) !!}
</div>

<!-- Descuento <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descuento', 'Descuento <span class="required">*</span>:') !!}
    {!! Form::number('descuento', null, ['class' => 'form-control']) !!}
</div>

<!-- Total <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total <span class="required">*</span>:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario Id <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_id', 'Usuario Id <span class="required">*</span>:') !!}
    {!! Form::number('usuario_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('facturas.index') !!}" class="btn btn-default">Cancel</a>
</div>
