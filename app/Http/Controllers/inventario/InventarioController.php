<?php

namespace App\Http\Controllers\inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function inventarioIndex(Request $request){
        return view('inventario/inventarios');
    }
}
