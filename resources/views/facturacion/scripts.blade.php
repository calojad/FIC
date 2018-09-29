<script type="text/javascript">
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
    // Funcion para asignar valores cuando selecciona un producto
    function asignarValores(ui) {
        $('#prodId').val(ui.item.value);
        $('#prodCantidad').val(1);
        $('#prodPrecio').val(ui.item.precio);
        $('#spnRequiredCodigo').empty();
        $('.serequiere').removeClass('has-error');
    }
    // Boton "Añadir"
    $('#btnAddProducto').on('click', function () {
        addDetalle();
    });
    // Input cantidad, al presionar enter
    $('#prodCantidad, #prodNombre, #prodCodigo').on('keypress',function (e) {
        if(e.which === 13) {
            addDetalle();
        }
    });
    // Funcion para agregar el producto a la tabla detalle
    function addDetalle(){
        var id = $('#prodId');
        if (id.val() !== '') {
            var t = $('#tblDetalle').DataTable();
            var cod = $('#prodCodigo');
            var cant = $('#prodCantidad');
            var prec = $('#prodPrecio');
            var prod = $('#prodNombre');
            var total = cant.val() * prec.val();
            t.row.add(['<p>' + id.val() + '-' + cod.val() + '</p>',
                '<p>' + prod.val() + '</p>',
                '<input type="number" value="' + cant.val() + '" class="form-control">',
                '<p>$ ' + prec.val() + '</p>',
                '<div class="has-feedback"><input type="number" value="0" class="form-control"><span class="form-control-feedback">%</span></div>',
                '<p>$ <strong class="totalProducto">' + total.toFixed(2) + '</strong></p>',
                '<a class="btn btn-danger"><i class="fa fa-trash"></i></a>'
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
        var subtotal=0;
        $(".totalProducto").each(function(){
            subtotal+=parseFloat($(this).html()) || 0;
        });
        var iva = subtotal * 0.12;
        var totalT = subtotal + iva;
        $('#subtotal').html('$ '+subtotal.toFixed(2));
        $('#iva').html('$ '+iva.toFixed(2));
        $('#totalTotal').html('$ '+totalT.toFixed(2));
    }
</script>