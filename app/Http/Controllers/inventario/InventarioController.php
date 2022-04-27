<?php

namespace App\Http\Controllers\inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function inventarioIndex(Request $request){
        $succes = false;
        $msg = "";
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        //dd($inventario);

        return view('inventario/inventarios',['msg'=>$msg,'succes'=>$succes,'inventario'=>$inventario]);
    }

    public function editInventory(Request $request){
        //idProduct
        $proveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->get();

        //dd($proveedor);

        $idprod = $request->get('idProduct');

        $inventarioEdits = \DB::connection('mysql')
        ->table('producto')
        ->where('producto.idProducto', $idprod)
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        
        //dd($inventarioEdits);

        return view('inventario/editInventario',['proveedor'=>$proveedor,'inventarioEdits'=>$inventarioEdits]);
    }

    public function editedProduct(Request $request){
        
    }

    public function addProductIndex(){
        $proveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->get();


        return view('inventario/addProduct', ['proveedor'=>$proveedor]);

    }

    public function addProduct(Request $request){
        $succes = true;
        $msg = "El producto ha sido agregado";

        //Obtener los datos de los inputs
        $product = $request->get('product');
        $marca = $request->get('marca');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $proveedor = $request->get('proveedor');

        //Insertar nuevo producto

        $productAdd = \DB::connection('mysql')
        ->table('producto')
        ->insert([
            'nombre' =>$product,
            'marca' => $marca,
            'cantidad' => $cantidad,
            'precio' => $precio,
            'proveedor_idproveedor' => $proveedor
        ]);

        //retornar vista y obtener datos
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        //dd($inventario);

        return view('inventario/inventarios',['msg'=>$msg,'succes'=>$succes,'inventario'=>$inventario]);
    }
}
