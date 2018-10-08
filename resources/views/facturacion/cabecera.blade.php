<div class="box-header with-border">
    <h3 class="box-title">Factura</h3>
</div>
<div class="box-body">
    <div class="col-md-12">
        <div id="divCIRUC" class="form-group">
            <label for="cedula" class="col-sm-2" style="text-align: right">CI/RUC:</label>
            <div class="input-group col-md-3">
                <input id="cedula" type="text" maxlength="13" class="form-control" value="" style="height: 28px;">
                <a class="input-group-addon" href="" title="Buscar Cliente">
                    <i class="fa fa-users"></i>
                </a>
            </div>
            <input id="clienteId" type="hidden" value="">
        </div>
        <div class="col-md-6">
            <dl class="dl-horizontal">
                <dt>Cliente:</dt>
                <dd id="ddCliente"></dd>
                <dt>Dirección:</dt>
                <dd id="ddDireccion"></dd>
            </dl>
        </div>
        <div class="col-md-6">
            <dl class="dl-horizontal">
                <dt>Teléfono:</dt>
                <dd id="ddTelefono"></dd>
                <dt>Email:</dt>
                <dd id="ddEmail"></dd>
            </dl>
        </div>
    </div>
</div>