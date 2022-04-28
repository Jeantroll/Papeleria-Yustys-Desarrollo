@extends('layouts.app')

@section('content')
<style>
    #side .items ul li .factura{
    background: #59EBF4 !important;
    color: white !important;
    }
</style>
<div class="container">
    <br>
    <div style="background: #0FCBCC;">
        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
            <center>
                <h1 style="color: white">FACTURAS EMITIDAS</h1>
            </center>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-danger">GENERAR REPORTE</button>
            </div>
        </div>
        <br>
        
        <table class="table table-Success" style="color: white; font-weight: bold;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Número Factura</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha</th>
                <th scope="col">Concepto</th>
                <th scope="col">Valor total</th>
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>84123541235</td>
                <td>Otto</td>
                <td>20/08/2020</td>
                <td>Lorem ipsum dolor sit amet</td>
                <td>200000$</td>
                <td>
                    <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important;" type="button" class="btn btn-primary"><i class="fa-solid fa-print"></i></button>
                    <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; color: red;" type="button" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></button></td>

              </tr>

            </tbody>
          </table>
    </div>  
    <br>
    <div class="row">
        <div class="col-md-6">
            <center>
                <button type="button" class="btn btn-primary" style="font-size:20px; background: #0EBFC4; border-color: #0EBFC4; !important">EMITIR FACTURA</button>
            </center>
        </div>
        <div class="col-md-6">
                <button type="button" class="btn btn-primary" style="font-size:20px; background: #0EBFC4; border-color: #0EBFC4; !important">REALIZAR OTRA VENTA</button>
        </div>
    </div>
</div>


@endsection