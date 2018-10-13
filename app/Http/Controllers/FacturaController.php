<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FacturaController extends Controller
{
    public function getVentas(){
        return view('facturacion.factura');
    }
    public function postVentas(Request $request){
        dd(Input::all());
    }
    public function getModallistaproductos(){
        return view('facturacion.modals.listaProductos');
    }
}
