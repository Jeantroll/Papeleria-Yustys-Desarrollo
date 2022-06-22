<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FacturaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View{
        $factura = \DB::connection('mysql')
        ->table('factura')
        ->get();

        return view('exports_blade.facturaExportCSV', [
            'factura' => $factura
        ]);
    }
}
