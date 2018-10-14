<div class="col-md-12" style="min-height: 600px">
    <table id="modalProductos" class="table table-responsive table-striped table-bordered table-hover table-checkable datatable">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{!! $producto->codigo !!}</td>
                <td>{!! $producto->nombre !!}</td>
                <td>{!! $producto->precio !!}</td>
                <td>{!! $producto->stock !!}</td>
                <td>
                    <div align="center">
                        <a class='btn btn-primary btn-xs btnAddProductoModal' title="Seleccionar" producto="{{$producto}}"><i class="fa fa-plus"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('.btnAddProductoModal').on('click',function () {
        var producto = JSON.parse($(this).attr('producto'));
        $('#prodNombre').val(producto.nombre);
        $('#prodCodigo').val(producto.codigo);
        asignarValores(producto);
        addDetalle(producto.id);
    });
    {{-- Funcion para iniciar la tabla --}}
    $(function () {
        $('#modalProductos').DataTable({
            pagingType: "full_numbers",
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            autoWidth: true,
            retrieve: true,
            responsive: true
        });
    });
</script>