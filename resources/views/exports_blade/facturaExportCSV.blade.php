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
            
            @elseif ($ft->active == 2)
            @else
            <td>
                <div class="row">
                    <div class="col-md-6">
                    
                    </div>
                <div class="col-md-6">
                    
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
                
            @elseif ($ft->active == 2)
            @else
            <td>
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                <div class="col-md-6">
                    
                </div>
                
            </div>

            @endif
        @endif

        @endforeach
    </tbody>
  </table>