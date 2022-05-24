@extends('layouts.app')

@section('content')
<style>
    #side .items ul li .factura{
    background: #59EBF4 !important;
    color: white !important;
    }

    .table thead{
    background: #59EBF4;
    border-bottom: none;
  }
</style>
<div class="container">
    <br>
    <div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
            <center>
                <h1>FACTURAS EMITIDAS</h1>
            </center>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-danger">GENERAR REPORTE</button>
            </div>
        </div>
        <br>
        
        <table class="table table-Success">
            <thead>
              <tr>
                <th scope="col">Número Factura</th>
                <th scope="col">Cliente</th>
                <th scope="col">Documento cliente</th>
                <th scope="col">Numero Radicacion</th>
                <th scope="col">Valor total</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>
                @foreach ($factura as $ft)

                @if ($ft->active == 2)
                <tr style="background: #ff0000; color: white;">
                    <th scope="row">{{$ft->idfactura}}</th>
                    <td>{{$ft->nombreClienteFactura}}</td>
                    <td>{{$ft->documentoCliente}}</td>
                    <td>{{$ft->numero_radicacion}}</td>
                    @if ($ft->active == 1)
                        <td>{{$ft->valor_total_neto}}$</td>
                    @else
                        <td>0$</td>
                    @endif
                    <td>{{$ft->created_at}}</td>
                    @if ($ft->active == 1)
                        <td>Aprobado</td>
                    @elseif ($ft->active == 2)
                         <td>Cancelada</td>
                    @else
                        <td>En proceso</td>
                    @endif
                    @if ($ft->active == 1)
                    <td>
                        <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important;" type="button" class="btn btn-primary"><i class="fa-solid fa-print"></i></button></td>
                    
                    @elseif ($ft->active == 2)
                    @else
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/retomar-venta" method="POST">
                                    @csrf
                                    <input type="hidden" name="idFactura" value="{{$ft->idfactura}}">
                                    <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important;" type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
                                </form>
                            </div>
                        <div class="col-md-6">
                            <form action="eliminar-factura" method="POST">
                                @csrf
                                <input type="hidden" name="idFactura" value="{{$ft->idfactura}}">
                                <input type="hidden" name="numeroRad" value="{{$ft->numero_radicacion}}">
                                <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; color: white;" type="submit" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></button></td>
                            </form>
                        </div>
                        
                    </div>

                    @endif

                @else
                <tr>
                    <th scope="row">{{$ft->idfactura}}</th>
                    <td>{{$ft->nombreClienteFactura}}</td>
                    <td>{{$ft->documentoCliente}}</td>
                    <td>{{$ft->numero_radicacion}}</td>
                    @if ($ft->active == 1)
                        <td>{{$ft->valor_total_neto}}$</td>
                    @else
                        <td>0$</td>
                    @endif
                    <td>{{$ft->created_at}}</td>
                    @if ($ft->active == 1)
                        <td>Aprobado</td>
                    @elseif ($ft->active == 2)
                         <td>Cancelada</td>
                    @else
                        <td>En proceso</td>
                    @endif
                    @if ($ft->active == 1)
                    <td>
                        <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important;" type="button" class="btn btn-primary"><i class="fa-solid fa-print"></i></button></td>
                    
                    @elseif ($ft->active == 2)
                    @else
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/retomar-venta" method="POST">
                                    @csrf
                                    <input type="hidden" name="idFactura" value="{{$ft->idfactura}}">
                                    <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important;" type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
                                </form>
                            </div>
                        <div class="col-md-6">
                            <form action="eliminar-factura" method="POST">
                                @csrf
                                <input type="hidden" name="idFactura" value="{{$ft->idfactura}}">
                                <input type="hidden" name="numeroRad" value="{{$ft->numero_radicacion}}">
                                <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; color: white;" type="submit" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></button></td>
                            </form>
                        </div>
                        
                    </div>

                    @endif
                @endif

                @endforeach
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

@if ($succses)
    <script>
        window.location.href = "/facturas";
    </script>
@endif


@endsection