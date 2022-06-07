<?php

namespace App\Http\Controllers\inventario;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;


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
        $succes = true;
        $msg = "El producto ha sido editado";

        //Obtener los datos de los inputs
        $product = $request->get('product');
        $marca = $request->get('marca');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $proveedor = $request->get('proveedor');
        $id = $request->get('id');

        //Insertar nuevo producto

        $productAdd = \DB::connection('mysql')
        ->table('producto')
        ->where('idProducto',$id)
        ->update([
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

    public function deleteItem(Request $request){
        $succes = true;
        $msg = "El item del producto a sido modificado";

        //Obtener los datos de los inputs
        $cantidad = $request->get('quantitys');
        $id = $request->get('idProduct');
        
        //Editar item del producto
        //dd($cantidad);
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        if($cantidad >= 0){
            $itemDelete = \DB::connection('mysql')
            ->table('producto')
            ->where('idProducto',$id)
            ->update([
                'cantidad' => $cantidad,
            ]);
        }else{
            $msg = "Has escogido un valor negativo... Por favor revalida los datos con un valor positivo. Ejemplo: 1,2,3,4,5,6";
            

            return view('inventario/inventarios',['msg'=>$msg,'inventario'=>$inventario]);
        }
        //retornar vista y obtener datos
        return view('inventario/inventarios',['msg'=>$msg,'succes'=>$succes,'inventario'=>$inventario]);
    }




    //Exportar productos mediante CSV y EXCEL con la libreria Laravel-Excel

    public function exportProductCSV(){

        $nombreDocumento = 'productos papeleria yustys '.Carbon::now().'.xlsx';
        
        return Excel::download(new ProductExport, $nombreDocumento);
    }
}
