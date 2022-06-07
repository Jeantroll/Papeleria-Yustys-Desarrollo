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
                <div class="row">
                    <div class="col-md-2" id="pdf" style="display: none;"><button type="button" class="btn btn-success bt-download" style="background: red; font-size: 25px;"><i class="fa-solid fa-file-pdf"></i></button></div>
                    <div class="col-md-2" id="csv" style="display:none;"><a type="button" href="{{route('product.export')}}" class="btn btn-success bt-download" style="background: #224632; font-size: 25px;"><i class="fa-solid fa-file-csv"></i></a></div>
                    <div class="col-md-8"><button type="button" onclick="downloadIcons()" class="btn btn-success bt-download" style="background: #3DCE80;">Descargar inventario <i class="fa-solid fa-download"></i></button></div>
            
                  </div>            </div>
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
                        <form method="POST" action="/factura-print">
                            @csrf
                            <input type="hidden" name="id" value="{{$ft->idfactura}}">
                            <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important;" type="submit" class="btn btn-primary"><i class="fa-solid fa-print"></i></button></td>
                        </form>
                    
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
                        <form method="POST" action="/factura-print">
                            @csrf
                            <input type="hidden" name="id" value="{{$ft->idfactura}}">
                            <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important;" type="submit" class="btn btn-primary"><i class="fa-solid fa-print"></i></button></td>
                        </form>
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
                                <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; color: white;" type="submit" class="btn btn-primary"><i class="fa-solid fa-x"></i></button></td>
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

<script>
    function downloadIcons() {
    if (document.getElementById('pdf').style.display == "none") {
      document.getElementById('pdf').style.display = "block"
      document.getElementById('csv').style.display = "block"
    }else{
      document.getElementById('pdf').style.display = "none"
      document.getElementById('csv').style.display = "none"
    }

  }
</script>

@if ($succses)
    <script>
        window.location.href = "/facturas";
    </script>
@endif


@endsection