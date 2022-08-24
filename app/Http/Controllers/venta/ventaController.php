<?php

namespace App\Http\Controllers\venta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ventaController extends Controller
{

    public function ventaIndex(){
        $error = false;
        $msj = "";

        $producto = \DB::connection('mysql')
        ->table('producto')
        ->where('cantidad','>',0)
        ->get();

        return view('venta.ventaIndex',['producto'=>$producto,'error' => $error, 'msj'=>$msj]);
    }

    public function generatePurchase(Request $request){
        
        $documentoCliente = $request->get('documentoCliente');
        $NombreCliente = $request->get('NombreCliente');
        $Idproduct = $request->get('Idproduct');
        $cantidad = $request->get('cantidad');
        $total = $request->get('total');
        $totalNeto = $request->get('totalNeto');

        
        $productQuery = \DB::connection('mysql')
        ->table('producto')
        ->where('idProducto',$Idproduct)
        ->first();

        $nombreProducto = $productQuery->nombre;
        $precioUnitario = $productQuery->precio;
        $cantidadRest = $productQuery->cantidad - $cantidad;
        
        if ($cantidadRest <= 0) {
            $updateCantidadFact = \DB::connection('mysql')
            ->table('producto')
            ->where('idProducto',$Idproduct)
            ->update([
                'cantidad' => 0,

            ]);
        }


        $producto = \DB::connection('mysql')
        ->table('producto')
        ->where('cantidad','>',0)
        ->get();

        $counts = \DB::connection('mysql')
        ->table('factura')
        ->where('created_at','LIKE', date("Y-m-d").'%')
        ->get();


        if(count($counts) <= 9){
            $certified_number = "NR".date("Ymd")."000".count($counts)."N";
        }elseif(count($counts) <= 99){
            $certified_number = "NR".date("Ymd")."00".count($counts)."N";
        }elseif(count($counts) <= 999){
            $certified_number = "NR".date("Ymd")."0".count($counts)."N";
        }elseif(count($counts) <= 9999){
            $certified_number = "NR".date("Ymd").count($counts)."N";
        }


        $preFactura = \DB::connection('mysql')
        ->table('factura')
        ->insertGetId([
            'nombreClienteFactura' => $NombreCliente,
            'documentoCliente' => $documentoCliente,
            'valor_total_neto' => $totalNeto,
            'numero_radicacion' => $certified_number,
            'active' => 0
        ]);

        $insertarProductFact = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->insert([
            'producto' => $nombreProducto,
            'cantidad' => $cantidad,
            'valor_unitario' => $precioUnitario,
            'valor_total' => $total,
            'id_factura' => $preFactura,
            'id_producto' => $Idproduct

        ]);

        $updateCantidadFact = \DB::connection('mysql')
        ->table('producto')
        ->where('idProducto',$Idproduct)
        ->update([
            'cantidad' => $cantidadRest,
        ]);

        $productoFactura = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->where('id_factura',$preFactura)
        ->get();

        $factura = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura',$preFactura)
        ->first();

        return view('venta.preventa',['preFactura'=>$preFactura,'producto'=>$producto,'productoFactura'=>$productoFactura,'factura'=>$factura]);
    }

    public function addPurchaseF(Request $request){
        $preFactura = $request->get('idFactura');

        $documentoCliente = $request->get('documentoCliente');
        $NombreCliente = $request->get('NombreCliente');
        $Idproduct = $request->get('Idproduct');
        $cantidad = $request->get('cantidad');
        $total = $request->get('total');
        $totalNeto = $request->get('totalNeto');

        
        $productQuery = \DB::connection('mysql')
        ->table('producto')
        ->where('idProducto',$Idproduct)
        ->first();

        $nombreProducto = $productQuery->nombre;
        $precioUnitario = $productQuery->precio;
        $cantidadRest = $productQuery->cantidad - $cantidad;

        if ($cantidadRest <= 0) {
            $updateCantidadFact = \DB::connection('mysql')
            ->table('producto')
            ->where('idProducto',$Idproduct)
            ->update([
                'cantidad' => 0,

            ]);
        }

        $producto = \DB::connection('mysql')
        ->table('producto')
        ->where('cantidad','>',0)
        ->get();

        $productoFactura = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->where('id_factura',$preFactura)
        ->get();

        $factura = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura',$preFactura)
        ->first();
        
        $insertarProductFact = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->insert([
            'producto' => $nombreProducto,
            'cantidad' => $cantidad,
            'valor_unitario' => $precioUnitario,
            'valor_total' => $total,
            'id_factura' => $preFactura,
            'id_producto' => $Idproduct

        ]);

        $updateCantidadFact = \DB::connection('mysql')
        ->table('producto')
        ->where('idProducto',$Idproduct)
        ->update([
            'cantidad' => $cantidadRest,
        ]);


        return view('venta.preventa',['preFactura'=>$preFactura,'producto'=>$producto,'productoFactura'=>$productoFactura,'factura'=>$factura]);
    }


    public function confirmPurchase(Request $request){
        
        $id = $request->get('idFactura');

        $productsFact = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->where('id_factura', $id)
        ->get();

        $totalNeto = 0;
        foreach ($productsFact as $product) {
            $totalNeto += $product->valor_total;
        }

        $counts = \DB::connection('mysql')
        ->table('factura')
        ->where('created_at','LIKE', date("Y-m-d").'%')
        ->get();


        if(count($counts) <= 9){
            $certified_number = "NR".date("Ymd")."000".count($counts)."A";
        }elseif(count($counts) <= 99){
            $certified_number = "NR".date("Ymd")."00".count($counts)."A";
        }elseif(count($counts) <= 999){
            $certified_number = "NR".date("Ymd")."0".count($counts)."A";
        }elseif(count($counts) <= 9999){
            $certified_number = "NR".date("Ymd").count($counts)."A";
        }

        $facturaUpd = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura',$id)
        ->update([
            'active' => 1,
            'valor_total_neto' => $totalNeto,
            'numero_radicacion' => $certified_number,
            'created_at'=> Carbon::now()
        ]);

        $facturaGets = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura',$id)
        ->get();

        return view('venta.factura',['facturaGets'=>$facturaGets,'productsFact'=>$productsFact,'totalNeto'=>$totalNeto]);
    }

    public function returnPurchase(Request $request){
        $preFactura = $request->get('idFactura');

        $producto = \DB::connection('mysql')
        ->table('producto')
        ->where('cantidad','>',0)
        ->get();

        $productoFactura = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->where('id_factura',$preFactura)
        ->get();

        $factura = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura',$preFactura)
        ->where('active', 0)
        ->first();
        if (!empty($factura)) {
            return view('venta.preventa',['preFactura'=>$preFactura,'producto'=>$producto,'productoFactura'=>$productoFactura,'factura'=>$factura]);
        }else{
            $notFact = \DB::connection('mysql')
            ->table('factura')
            ->where('idfactura',$preFactura)
            ->first();

            $error = true;
            $msj = "La factura numero: ".$preFactura." ya a sido aprobada el ".$notFact->created_at." y tiene el numero de radicación ".$notFact->numero_radicacion.". Si ha sido un error, por favor contactate con soporte tecnico.";

            $producto = \DB::connection('mysql')
            ->table('producto')
            ->where('cantidad','>',0)
            ->get();

            return view('venta.ventaIndex',['producto'=>$producto,'error' => $error, 'msj'=>$msj]);
        }
        

    }

    

    public function webServiceTotalQuantity($idProd,$cantidadProd){
        
        $adds = \DB::connection('mysql')
        ->table('producto')
        ->where('idProducto',$idProd)
        ->first();
    
        if ($adds->cantidad >= $cantidadProd) {
            $precioProducto = $adds->precio;

            $total = $precioProducto * $cantidadProd;

            return response()->json([
                "success" => true,
                "action" => "Calculo de cantidad por precio unitario",
                "message" => "Operacion exitosa.",
                "code" => 200,
                "data" => $total
            ], 200);
        }else{
            return response()->json([
                "success" => false,
                "action" => "Calculo de cantidad por precio unitario",
                "message" => "Operacion erronea.",
                "code" => 200,
                "data" => 'La cantidad es superior a la que hay en stock'
            ], 200);
        }

        //dd($total);

    }

    public function getProductsByName(Request $request){

        return \DB::connection('mysql')
        ->table('producto')
        ->select('nombre','idProducto')
        ->where('nombre', 'like', "%{$request->term}%")
        ->pluck('nombre');
     }

    public function webServiceQueryProductsFact($idFactura){

        $productsPre = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->where('id_factura',$idFactura)
        ->get();

        //dd($productsPre);

        return response()->json([
            "success" => true,
            "action" => "Consulta de productos",
            "message" => "Operacion exitosa.",
            "code" => 200,
            "data" => $productsPre
        ], 200);
    }

    
}
