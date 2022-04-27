<?php

namespace App\Http\Controllers\venta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ventaController extends Controller
{

    public function ventaIndex(){
        return view('venta.ventaIndex');
    }

}
