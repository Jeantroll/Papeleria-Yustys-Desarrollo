@extends('layouts.app')

@section('content')

<style>
    #side .items ul li .venta{
    background: #59EBF4 !important;
    color: white !important;
    }
</style>

@if($error)
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{$msj}}
			</div>
		</div>
	</div>
	@endif

<div class="container">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-3">
            <div style="background: #C9F1DB; color: #35B06D; text-align: center;">
            <h4>Registrar venta</h4>
            </div>
            <br>
            <img style="width: 252px;" src="https://img.freepik.com/vector-gratis/recibo-factura-papel-plano-dibujos-animados-o-factura-pagar-aislado_101884-255.jpg" alt="">
        </div>
        <div class="col-md-7">
            <form action="/crear-venta" method="POST">
             @csrf
            <input name="documentoCliente" type="text" placeholder="Documento cliente" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>
            <input name="NombreCliente" type="text" placeholder="Nombre cliente" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>

            <select name="Idproduct" onchange="parseCantidad()" id="idProd" class="w-50 h-22 form-select">

                @foreach ($producto as $pr)
                <option value="{{$pr->idProducto }}">{{$pr->nombre}}</option>
                @endforeach
              </select>
              
            <br>
            <input name="cantidad" onchange="parseCantidad()" required type="text" placeholder="Cantidad *" class="w-50 h-22 form-control" id="cantidad">
            <input type="hidden" id="totalR" name="total">
            <br>
            <input id="total" required type="text" placeholder="Total *" class="w-50 h-22 form-control" id="inputGroupFile01" disabled>
            <br>
            <input type="hidden" name="totalNeto">
            <div class="row">
                    <button id="buttonVenta" style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; border-radius: 50px; width: 200px !important;font-size: 20px !important; margin-right: 15px; " type="submit" class="btn btn-primary">Crear venta</button>
            </form>
                    <button id="buttonVenta" style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; border-radius: 50px; width: 200px !important;font-size: 20px !important; " type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Retomar venta</button>
            </div>

        </div>

        </div>
    </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Retomar la venta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/retomar-venta">
            @csrf
        <div class="modal-body" method="POST" action="/retomar-venta">
            <div class="row">
                <center>
                    <h3>Escribe el numero id de la factura en proceso</h3>
                    <br>
                <br>
                </center>
                
                <div class="row">
                        <input type="number" id="precio" class="form-control" name="idFactura" value="" required placeholder="Id de factura ejemplo (1)">
                </div>
                
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script>

var select_box_element = document.querySelector('#idProd');

    dselect(select_box_element, {
        search: true
    });
function consultarTotal(idprod, cantidad){

let headers = new Headers();
      
      if(idprod == null && cantidad == null){
          var ajaxurl = "http://localhost:8000/api/sumar-producto/0/0";
      }else{
          var ajaxurl = "http://localhost:8000/api/sumar-producto/"+idprod+"/"+cantidad;
      }

      fetch(ajaxurl, {
              //mode: 'no-cors',
              //credentials: 'include',
              method: 'GET',
              headers: headers
      })
      .then(function(response) {
          return response.text();
      })
      .then(function(data) {

          var data = JSON.parse(data);

          if(data.success){
                var total = document.getElementById('total').value = data.data;
                var totalR = document.getElementById('totalR').value = data.data;

                document.getElementById('buttonVenta').disabled = false;

                console.log(data);
            }else{
                alert(data.data);
                var total = document.getElementById('total').value = '0';
                document.getElementById('buttonVenta').disabled = true;
       
            }
    })
}

function parseCantidad() {
    var idprod = document.getElementById('idProd').value;
    var cantidad = document.getElementById('cantidad').value;

    consultarTotal(idprod, cantidad)
}

</script>
@endsection