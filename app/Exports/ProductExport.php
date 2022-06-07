<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View{
        $inventario = \DB::connection('mysql')
        ->table('producto')
        ->join('proveedor','proveedor.idproveedor','=','producto.proveedor_idproveedor')
        ->get();
        //dd($inventario);

        return view('exports_blade.productExportCSV', [
            'inventario' => $inventario
        ]);
    }
}
