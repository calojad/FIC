<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="facturas-table">
    <thead>
    <tr>
        <th>N° Factura</th>
        <th>Cliente</th>
        <th>Subtotal</th>
        <th>Iva</th>
        <th>Descuento</th>
        <th>Total</th>
        <th>Usuario</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($facturas as $factura)
        <tr>
            <td>{!! $factura->num_factura !!}</td>
            <td>{!! $factura->cliente->razon_social !!}</td>
            <td>{!! $factura->subtotal !!}</td>
            <td>{!! $factura->iva !!}</td>
            <td>{!! $factura->descuento !!}</td>
            <td>{!! $factura->total !!}</td>
            <td>{!! $factura->usuario->username!!}</td>
            <td>
                <div class='btn-group'>
                    <a href="" class='btn btn-success btn-xs' title="Ver Detalle"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="" class='btn btn-warning btn-xs' title="Cambiar estado"><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>