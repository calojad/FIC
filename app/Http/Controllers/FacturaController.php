<?php

namespace App\Http\Controllers;

use App\Models\CabFactura;
use App\Models\DetFactura;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class FacturaController extends Controller
{
    // GET VENTANA DE VENTAS
    public function getVentas()
    {
        return view('facturacion.factura');
    }
    // POST VENTAS (FACTURA)
    public function postVentas(Request $request)
    {
        $fac_cabecera['num_factura'] = '001-001-000001';
        $fac_cabecera['cliente_id'] = $request->get('clienteId');
        $fac_cabecera['subtotal'] = $request->get('subtotal');
        $fac_cabecera['iva'] = $request->get('iva');
        $fac_cabecera['descuento'] = $request->get('descuento');
        $fac_cabecera['total'] = $request->get('total');
        $fac_cabecera['usuario_id'] = Auth::user()->id;
        $cabecera = CabFactura::create($fac_cabecera);

        $productos = $request->get('productos');
        foreach ($productos as $prod) {
            DetFactura::create([
                'cab_factura_id' => $cabecera->id,
                'producto_id' => $prod['producto_id'],
                'cantidad' => $prod['catidada_producto'],
                'descuento' => $prod['descuento_producto'],
                'total' => $prod['total_producto']
            ]);
        }

        Flash::success('Factura guardada exitosamente.')->important();
        return json_encode(['url' => '/venta/ventas']);
    }
    // GET TABLA FACTURAS
    public function getFacturas(){
        $facturas = Factura::all();
        return view('facturas.index',compact('facturas'));
    }
    public function index(Request $request)
    {
        $facturas = Factura::all();
        return view('facturas.index')->with('facturas', $facturas);
    }
}