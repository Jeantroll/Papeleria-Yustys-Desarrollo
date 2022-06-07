<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @foreach ($facturaGets as $fact)
    <title>{{$fact->numero_radicacion}}</title>
    @endforeach
  </head>
  <body>
      <style>
          button {
    padding: 5px 10px 5px 10px;
    width: 110px;
    background-color: #46D9D0;
    color: #fff;
    font-weight: bolder;
    border: 2px solid #29a79e;
    margin: 10px;
}
      </style>
    <div class="container">
        <div class="row">
            <center>
                <h1>--------PELERIA YUSTYS--------</h1>
            </center>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <p>Nit: 26425255-0</p>
                <p>Direccion: calle 53#1 w 66</p>
                <p>Telefono: +(57) 318 8113937 </p>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="border: solid 2px black;">
                @foreach ($facturaGets as $fact)
                <h3>Factura de venta N.o {{$fact->idfactura}}</h3>
                <p>Fecha: {{$fact->created_at}}</p>
                <p> Nombre: {{$fact->nombreClienteFactura}}</p>
                <p> No Documento: {{$fact->documentoCliente}}</p>
                @endforeach

                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5" style="border: solid 2px black;">
                            <h3>Informacion General</h3>
                            @foreach ($productsFact as $prodFact)
                            <p>Producto: {{$prodFact->producto}}</p>
                            <p>valor unitario: {{$prodFact->valor_unitario}}</p>
                            @endforeach                        
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-6" style="border: solid 2px black;">
                            <h3>Informacion Financiera</h3>
                            @foreach ($productsFact as $prodFact)
                            <p>{{$prodFact->producto}} ({{$prodFact->cantidad}}) :  {{$prodFact->valor_total}}</p>
                            <p>------------------------------------------------------</p> 
                            @endforeach

                           <p>Valor Total: {{$totalNeto}} </p>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                
                <div class="col-md-12" style="display: flex; justify-content: space-between;">
                    @foreach ($facturaGets as $fact)
                    @if ($fact->active == 1)
                        <p>Estado: Aprovada</p>
                    @else
                        <p>Estado: Negada</p>
                    @endif
                    <p>Numero radicacion: {{$fact->numero_radicacion}}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="botones">
            <center>
                <button onclick="window.location.href='/ventas';">Volver</button>
                <button onclick="javascript:window.print()">DESCARGAR</button>
            </center>
            
       
           </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>