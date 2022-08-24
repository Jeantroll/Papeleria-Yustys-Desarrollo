<?php

namespace App\Http\Controllers\factura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\FacturaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;




class facturaController extends Controller
{
    public function facturaIndex(){
        $succses = false;

        $factura = \DB::connection('mysql')
        ->table('factura')
        ->orderBy('idfactura', 'DESC')
        ->get();


        return view('factura.facturaIndex',['factura'=>$factura,'succses'=>$succses]);
    }

    public function cancelFactura(Request $request){
        $succses = true;

        $idFact = $request->get('idFactura');
        $numero_rad = $request->get('numeroRad');

        $factura = \DB::connection('mysql')
        ->table('factura')
        ->orderBy('idfactura', 'DESC')
        ->get();

        $facturaProcess = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura', $idFact)
        ->where('active', 0)
        ->where('numero_radicacion', $numero_rad)
        ->first();
        
        $changeRad = $facturaProcess->numero_radicacion."C";


        $facturaUpdate = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura', $idFact)
        ->update([
            'numero_radicacion' => $changeRad,
            'active' => 2,
            'created_at' => Carbon::now()
        ]);

        $getProductFact = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->where('id_factura',$idFact)
        ->get();

        foreach ($getProductFact as $key) {
            $id_prod = $key->id_producto;

            $getProductLogs = \DB::connection('mysql')
            ->table('factura_logs_fi')
            ->where('id_producto',$id_prod)
            ->get();

            foreach ($getProductLogs as $pd) {
                $prod = $pd->id_producto;
                $quanti = $pd->cantidad;

                $getProduct = \DB::connection('mysql')
                ->table('producto')
                ->where('idProducto',$prod)
                ->get();
            }
            foreach ($getProduct as $up) {
                $quantiProdTot = $up->cantidad + $quanti;
    
                //dd($quantiProdTot);
                $updateProd = \DB::connection('mysql')
                ->table('producto')
                ->where('idProducto',$prod)
                ->update([
                    'cantidad' => $quantiProdTot
                ]);
                
            }
        }

        return view('factura.facturaIndex',['factura'=>$factura,'succses'=>$succses]);
    }

    public function facturaprint(Request $request){

        $id = $request->get('id');

        $productsFact = \DB::connection('mysql')
        ->table('factura_logs_fi')
        ->where('id_factura', $id)
        ->get();

        $totalNeto = 0;
        foreach ($productsFact as $product) {
            $totalNeto += $product->valor_total;
        }
        
        $facturaGets = \DB::connection('mysql')
        ->table('factura')
        ->where('idfactura',$id)
        ->get();

        return view('venta.factura',['facturaGets'=>$facturaGets,'productsFact'=>$productsFact,'totalNeto'=>$totalNeto]);

    }
    public function searchFact(Request $request){
        $succses = false;
        $numberRad = $request->get('radsearch');

        $factura = \DB::connection('mysql')
        ->table('factura')
        ->where('numero_radicacion',$numberRad)
        ->orwhere('idfactura',$numberRad)
        ->orderBy('idfactura', 'DESC')
        ->get();
        //dd($factura);

        return view('factura.facturaIndex',['factura'=>$factura,'succses'=>$succses]);
    }



    public function exportFactureCSV(){

        $nombreDocumento = 'facturas papeleria yustys '.Carbon::now().'.xlsx';
        
        return Excel::download(new FacturaExport, $nombreDocumento);
    }

    public function exportFacturePDF(){
        $factura = \DB::connection('mysql')
        ->table('factura')
        ->get();

        $nombreDocumento = 'facturas papeleria yustys '.Carbon::now().'.pdf';

        $pdf = PDF::loadView('exports_blade.facturaExportCSV', ['factura' => $factura]);

        return $pdf->download($nombreDocumento);
        
    }

    public function typeInvoiceIssued(Request $request){
        $succses = false;
        $type_fact = $request->get('type_fact');

        if ($type_fact == 1) {

            $factura = \DB::connection('mysql')
            ->table('factura')
            ->where('active',1)
            ->orderBy('idfactura', 'DESC')
            ->get();

        }elseif ($type_fact == 2) {

            $factura = \DB::connection('mysql')
            ->table('factura')
            ->where('active',0)
            ->orderBy('idfactura', 'DESC')
            ->get();

        }elseif ($type_fact == 3) {

            $factura = \DB::connection('mysql')
            ->table('factura')
            ->where('active',2)
            ->orderBy('idfactura', 'DESC')
            ->get();

        }else{

            $factura = \DB::connection('mysql')
            ->table('factura')
            ->orderBy('idfactura', 'DESC')
            ->get();
            
        }

        


        return view('factura.facturaIndex',['factura'=>$factura,'succses'=>$succses]);

        
    }

   
}
