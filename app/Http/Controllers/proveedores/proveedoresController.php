<?php

namespace App\Http\Controllers\proveedores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class proveedoresController extends Controller
{
    public function proveedorIndex(){

        

        $proveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->get();

        return view('proveedor.proveedorIndex',['proveedor'=>$proveedor]);
    }


    public function createProveedorIndex(Request $request){
        return view('proveedor.createProveedorIndex');
    }

    public function proveedorCreadet(Request $request){
        $nombreProveedor = $request->get('nombreProveedor');

        $proveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->get();

        $deleteProveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->insert([
            'nombreCompañia'=>$nombreProveedor
        ]);

        return view('proveedor.proveedorIndex',['proveedor'=>$proveedor]);
    }

    public function editProveedorIndex(Request $request){

        $idProveedor = $request->get('idProveedor');

        $proveedorEdit = \DB::connection('mysql')
        ->table('proveedor')
        ->where('idproveedor', $idProveedor)
        ->get();

        //dd($proveedorEdit);

        return view('proveedor.editProveedorIndex',['proveedorEdit'=>$proveedorEdit]);
    }

    public function proveedorEdited(Request $request){
        $idProveedor = $request->get('idProveedor');
        $nombreProveedor = $request->get('nombreProveedor');

        $proveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->get();


        $deleteProveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->where('idproveedor', $idProveedor)
        ->update([
            'nombreCompañia'=>$nombreProveedor
        ]);

        return view('proveedor.proveedorIndex',['proveedor'=>$proveedor]);
    }
}
