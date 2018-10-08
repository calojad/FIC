<script type="text/javascript">
    // Autocompli para buscar al cliente por su cedula
    $('#cedula').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
        $(this).autocomplete({
            source: '{{URL::to('venta/search/cliente')}}',
            minLength: 2,
            focus: function (event, ui) {
                $("#cedula").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $('#clienteId').val(ui.item.value);
                $("#ddCliente").html(ui.item.desc);
                $("#ddDireccion").html(ui.item.dirc);
                $("#ddTelefono").html(ui.item.telf);
                $("#ddEmail").html(ui.item.email);
                $('#divCIRUC').removeClass('has-error');
                return false;
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>").append("<div style='border-bottom: 1px solid gray'>" + item.label + " - " + item.desc + "</div>").appendTo(ul);
        };
    });
    // Autocomplite para buscar un producto por su codigo
    $('#prodCodigo').on('input', function () {
        $(this).autocomplete({
            source: '{{URL::to('venta/search/producto/codigo')}}',
            minLength: 2,
            focus: function (event, ui) {
                $("#prodCodigo").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $('#prodNombre').val(ui.item.name);
                asignarValores(ui);
                return false;
            }
        });
    });
    // Autocomplite para buscar un producto por su nombre
    $('#prodNombre').on('input', function () {
        $(this).autocomplete({
            source: '{{URL::to('venta/search/producto/nombre')}}',
            minLength: 2,
            focus: function (event, ui) {
                $("#prodNombre").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $('#prodCodigo').val(ui.item.codigo);
                asignarValores(ui);
                return false;
            }
        });
    });
    // Boton "Añadir"
    $('#btnAddProducto').on('click', function () {
        addDetalle();
    });
    // Input cantidad, al presionar enter
    $('#prodCantidad, #prodNombre, #prodCodigo').on('keypress', function (e) {
        if (e.which === 13) {
            addDetalle();
        }
    });
    // Input cantidad en la tabla; cambia cantidad y calcule el nuevo valor del producto
    $(document).on('keypress change', '.inpCantidad', function () {
        var id = $(this).attr('productoId');
        var cantidad = $(this).val();
        var precio = $('#precio_' + id).html();
        var total = cantidad * precio;
        $('#total_' + id).html(total.toFixed(2));
        calcularTotales();
    });
    // Input descuento en la tabla; cambia descuento y calcule el nuevo valor del producto
    $(document).on('keypress change', '.inpDescuento', function () {
        var id = $(this).attr('productoId');
        var descuento = $(this).val();
        var precio = $('#precio_' + id).html();
        var totalDesc = precio * descuento / 100;
        var total = precio - totalDesc;
        $('#descuento_' + id).val(totalDesc);
        $('#total_' + id).html(total.toFixed(2));
        calcularTotales();
    });
    // Boton para eliminar de la tabla un producto
    $(document).on('click', '.btnEliminarProducto', function () {
        var t = $('#tblDetalle').DataTable();
        var fila = $(this).parents('tr');
        t.row(fila).remove();
        t.draw();
        calcularTotales();
    });
    // Boton Guardar Factura
    $("#btnGuardarFactura").on('click', function () {
        //Obtener datos de la factura cabecera y detalle
        var cliente_id = $('#clienteId').val();
        var productos_id = $(".productosIds");
        if (cliente_id !== '') {
            if (productos_id.length > 0) {
                var subtotal = $('#subtotal').html();
                var iva = $('#iva').html();
                var descuento = $('#descuento').html();
                var total = $('#totalTotal').html();
                var detalle_productos = [];
                productos_id.each(function () {
                    var productoId = $(this).html();
                    detalle_productos.push(
                        {
                            producto_id: productoId,
                            catidada_producto: $('#cantidad_' + productoId).val(),
                            descuento_producto: $('#descuento_porc_' + productoId).val(),
                            total_producto: $('#total_' + productoId).html(),
                        }
                    );
                });
                //Prepara datos y enviar a guardar
                var url = "{{URL::to('/venta')}}";
                var data = {
                    clienteId: cliente_id,
                    subtotal: subtotal,
                    iva: iva,
                    descuento: descuento,
                    total: total,
                    productos: detalle_productos,
                    _token: "{{csrf_token()}}"
                };
                $.post(url, data, function (json) {

                }, 'json');
            } else {
                alertaError('No existen productos en el detalle de la factura. Escriba el codigo o el nombre del producto', $('.serequiere'),$('#prodCodigo'));
            }
        } else {
            alertaError('Debe seleccionar un cliente; ingrese su numero de cédula o RUC.', $('#divCIRUC'), $('#cedula'));
        }
    });
    /********** FUNCIONES **********/
    // Inicializa Tabla
    $(function () {
        $('.table').DataTable({
            pagingType: "simple",
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            autoWidth: true,
            retrieve: true,
            responsive: true
        });
    });

    // Funcion para asignar valores cuando selecciona un producto en el autocomplite
    function asignarValores(ui) {
        $('#prodId').val(ui.item.value);
        $('#prodCantidad').val(1);
        $('#prodPrecio').val(ui.item.precio);
        $('#spnRequiredCodigo').empty();
        $('.serequiere').removeClass('has-error');
    }

    // Funcion para agregar el producto a la tabla detalle
    function addDetalle() {
        var id = $('#prodId');
        if (id.val() !== '') {
            var t = $('#tblDetalle').DataTable();
            var cod = $('#prodCodigo');
            var cant = $('#prodCantidad');
            var prec = $('#prodPrecio');
            var prod = $('#prodNombre');
            var total = cant.val() * prec.val();
            t.row.add(['<p><span class="productosIds">' + id.val() + '</span>-' + cod.val() + '</p>', /*Codigo*/
                '<p>' + prod.val() + '</p>', /*Descripcion*/
                '<input id="cantidad_' + id.val() + '" class="inpCantidad" type="number" value="' + cant.val() + '" style="width: 60px;text-align: right" productoId="' + id.val() + '">', /*Cantidad*/
                '<p>$ <span id="precio_' + id.val() + '">' + prec.val() + '</span></p>', /*Precio*/
                '<input id="descuento_porc_' + id.val() + '" class="inpDescuento" type="number" value="0" style="width: 60px;text-align: right" productoId="' + id.val() + '"><input id="descuento_' + id.val() + '" class="valDescuento" type="hidden">', /*Descuento*/
                '<p>$ <strong id="total_' + id.val() + '" class="totalProducto">' + total.toFixed(2) + '</strong></p>', /*Total*/
                '<a class="btn btn-danger btnEliminarProducto"><i class="fa fa-trash"></i></a>'
            ]).draw(false);
            id.val('');
            cod.val('');
            cant.val('');
            prec.val('');
            prod.val('');
        } else {
            $('#spnRequiredCodigo').html('Seleccione un Producto');
            $('.serequiere').addClass('has-error');
        }
        calcularTotales();
    }

    // Funcion para calcular el total de la factura
    function calcularTotales() {
        var subtotal = 0;
        $(".totalProducto").each(function () {
            subtotal += parseFloat($(this).html()) || 0;
        });
        var descueto = 0;
        $(".valDescuento").each(function () {
            descueto += parseFloat($(this).val()) || 0;
        });
        var iva = subtotal * 0.12;
        var totalT = subtotal + iva;
        $('#subtotal').html(subtotal.toFixed(2));
        $('#iva').html(iva.toFixed(2));
        $('#descuento').html(descueto.toFixed(2));
        $('#totalTotal').html(totalT.toFixed(2));
    }

    // Funcion alerta de error
    function alertaError(mensaje, campo_req, input_req) {
        $.alert({
            icon: 'fa fa-times-circle fa-2x',
            closeIcon: true,
            closeIconClass: 'fa fa-close',
            escapeKey: true,
            backgroundDismiss: true,
            title: 'Error',
            content: '<span style="font-size:13pt">' + mensaje + '</span>',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Aceptar',
                    btnClass: 'btn-red',
                    action: function () {
                        input_req.focus();
                    }
                }
            }
        });
        campo_req.addClass('has-error');
    }
</script>