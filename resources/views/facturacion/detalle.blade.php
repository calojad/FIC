<div class="box-body" style="padding: 0px">
    <div class="box-header bg-yellow color-palette">
        <h3 class="box-title">Detalle</h3>
    </div>
    <div class="col-md-12" style="top: 10px;">
        <input id="prodId" type="hidden" name="prodId">
        <input id="prodPrecio" type="hidden" name="prodPrecio">
        <div class="form-group col-md-3 serequiere">
            <label for="prodCodigo">Codigo:</label>
            <input id="prodCodigo" class="form-control" type="text" name="prodCodigo">
            <span class="help-block"><strong id="spnRequiredCodigo"></strong></span>
            {{--<span id="spnRequiredCodigo" style="color: red"></span>--}}
        </div>
        <div class="form-group col-md-3 serequiere">
            <label for="prodNombre">Producto:</label>
            <input id="prodNombre" class="form-control" type="text" name="prodNombre">
        </div>
        <div class="form-group col-md-2">
            <label for="prodCantidad">Cantidad:</label>
            <input id="prodCantidad" class="form-control" type="number" name="prodCantidad">
        </div>
        <div class="form-group col-md-3">
            <br>
            <a id="btnAddProducto" class="btn btn-primary" style="cursor: pointer">Añadir</a>
        </div>
    </div>
    <div class="content table-responsive">
        <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblDetalle">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Cant.</th>
                <th>P. Unitario</th>
                <th>Descuento</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>