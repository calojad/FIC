<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="productos-table">
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Producto</th>
        <th>Costo</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->codigo !!}</td>
            <td>{!! $producto->nombre !!}</td>
            <td>{!! $producto->costo !!}</td>
            <td>{!! $producto->precio !!}</td>
            <td>{!! $producto->stock !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>