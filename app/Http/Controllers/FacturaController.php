<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FacturaController extends Controller
{
    public function generarfactura(Request $request){
        dd(Input::all());
    }
}
