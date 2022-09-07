<?php

namespace App\Http\Controllers\inventario;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PDF;


class InventarioController extends Controller
{
    public function inventarioIndex(Request $request){
        $succesEdit = false;
        $succesDelete = false;
        $succesAdd = false; 
        $error = false;    
        $all = false;            
          
        $msg = "";
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        //dd($inventario);

        return view('inventario/inventarios',['all'=>$all,'msg'=>$msg,'error'=>$error,'succesEdit'=>$succesEdit,'succesDelete'=>$succesDelete,'succesAdd'=>$succesAdd,'inventario'=>$inventario]);
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
        $succesEdit = true;
        $succesDelete = false;
        $succesAdd = false;
         $msg = "";
         $error = false;   
         $all = false;            
    

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

        return view('inventario/inventarios',['all'=>$all,'msg'=>$msg,'error'=>$error,'succesEdit'=>$succesEdit,'succesDelete'=>$succesDelete,'succesAdd'=>$succesAdd,'inventario'=>$inventario]);
    }

    public function addProductIndex(){
        $proveedor = \DB::connection('mysql')
        ->table('proveedor')
        ->get();


        return view('inventario/addProduct', ['proveedor'=>$proveedor]);

    }

    public function addProduct(Request $request){
        $succesEdit = false;
        $succesDelete = false;
        $succesAdd = true; 
        $error = false;     
        $all = false;            
  
        $msg = "El producto ha sido agregado";

        //Obtener los datos de los inputs
        $product = $request->get('product');
        $marca = $request->get('marca');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $proveedor = $request->get('proveedor');

        //Validar si existe el producto
        $validate = \DB::connection('mysql')
        ->table('producto')
        ->where('nombre',$product)
        ->where('marca',$marca)
        ->where('cantidad',$cantidad)
        ->where('precio',$precio)
        ->get();

        if(sizeof($validate) > 0){
        $error = true;
        $succesAdd = false; 

        }else{
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
        }
        

        //retornar vista y obtener datos
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        //dd($inventario);

        return view('inventario/inventarios',['all'=>$all,'msg'=>$msg,'error'=>$error,'succesEdit'=>$succesEdit,'succesDelete'=>$succesDelete,'succesAdd'=>$succesAdd,'inventario'=>$inventario]);
    }

    public function deleteItem(Request $request){
        $succesEdit = false;
        $succesDelete = true;
        $succesAdd = false;
        $error = false;    
        $all = false;            
   

        $msg = "";

        //Obtener los datos de los inputs
        $id = $request->get('idProduct');
        
        //Editar item del producto
        //dd($cantidad);
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        $itemDelete = \DB::connection('mysql')
        ->table('producto')
        ->where('idProducto',$id)
        ->delete();

        //retornar vista y obtener datos
        return view('inventario/inventarios',['all'=>$all,'msg'=>$msg,'error'=>$error,'succesEdit'=>$succesEdit,'succesDelete'=>$succesDelete,'succesAdd'=>$succesAdd,'inventario'=>$inventario]);
    }


    public function filterProduct(Request $request){
        $succesEdit = false;
        $succesDelete = false;
        $succesAdd = false; 
        $error = false;  
        $all = true;            
        $msg = "";
        $filters = $request->get('prodsearch');


        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->where('producto.idProducto',$filters)
        ->orwhere('producto.nombre',$filters)
        ->get();

        //dd($inventario);

        return view('inventario/inventarios',['all'=>$all,'msg'=>$msg,'error'=>$error,'succesEdit'=>$succesEdit,'succesDelete'=>$succesDelete,'succesAdd'=>$succesAdd,'inventario'=>$inventario]);
    }


    //Exportar productos mediante CSV y EXCEL con la libreria Laravel-Excel

    public function exportProductCSV(){

        $nombreDocumento = 'productos papeleria yustys '.Carbon::now().'.xlsx';
        
        return Excel::download(new ProductExport, $nombreDocumento);
    }

    public function exportProductPDF(){
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();

        $nombreDocumento = 'productos papeleria yustys '.Carbon::now().'.pdf';
        
        $pdf = PDF::loadView('exports_blade.productExportCSV', ['inventario' => $inventario]);

        return $pdf->download($nombreDocumento);
    
    }
    
    
}
