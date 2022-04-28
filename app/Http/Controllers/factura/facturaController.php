<?php

namespace App\Http\Controllers\factura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class facturaController extends Controller
{
    public function facturaIndex(){

        return view('factura.facturaIndex');
    }
}
