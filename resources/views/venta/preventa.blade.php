@extends('layouts.app')

@section('content')

<style>
    #side .items ul li .venta{
    background: #59EBF4 !important;
    color: white !important;
    }
</style>

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
            <form action="/preventa" method="POST">
             @csrf
            <input name="documentoCliente" type="text" placeholder="Documento cliente" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>
            <input name="NombreCliente" type="text" placeholder="Nombre cliente" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>                
              <select name="Idproduct" onchange="parseCantidad()" id="idProd" class="w-50 h-22 form-select">
                <option selected>Producto *</option>

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
            <input type="hidden" name="idFactura" value="{{$preFactura}}">
            <button id="buttonVenta" style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; border-radius: 50px; width: 200px !important;font-size: 20px !important; " type="submit" class="btn btn-primary">Crear venta</button>
        </form>

        </div>

        </div>
    </div>
    </div>
</div>
    <br>
    <br>
    <br>
    <div class="row" style="border: solid 1px black">
        <div class="col-md-12">
            <center>
            <h1>Previsualización de la venta</h1>
            </center>
            <br>
            <div class="row">
                <div class="col-md-12">
                <center>
                    <h6>Fecha de creación: {{$factura->created_at}}</h6>
                    <h6>Nombre cliente: {{$factura->nombreClienteFactura}}</h6>
                    <h6>Documento cliente: {{$factura->documentoCliente}}</h6>
                    <h6>Id pre-factura: {{$factura->idfactura}}</h6>
                </center>
                </div>

                <div class="col-md-1">

                </div>
                <div class="col-md-10">
                    <br>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Valor unitario</th>
                            <th scope="col">Valor total</th>
                          </tr>
                        </thead>
                        <tbody id="products">
                         
                        </tbody>
                      </table>
                </div>
                <form action="/factura" method="post">
                @csrf
                <div class="col-md-1">
                    <input type="hidden" name="idFactura" id="idfact" value="{{$preFactura}}">
                </div>
                <center>
                    <br>
                    <h1>TOTAL DE LA VENTA: {{$factura->valor_total_neto}}</h1>
                    <br>
                </center>
                <center>
                <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; border-radius: 50px; width: 220px !important;font-size: 20px !important; " type="submit" class="btn btn-primary">CONFIRMAR VENTA</button>
                </center>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    var select_box_element = document.querySelector('#idProd');

dselect(select_box_element, {
    search: true
});

    productosPre();

    let timerss;

    function timer() {
        timerss = setTimeout(productosPre, 3000);
    }

    function productosPre() {

        let idfactura = document.getElementById("idfact").value; 

        let headers = new Headers();
          
          if(idfactura == null){
              var ajaxurl = "http://3.88.154.3/api/productopre/0";
          }else{
              var ajaxurl = "http://3.88.154.3/api/productopre/"+idfactura;
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
    
              console.log(data);

                  var productsF = data.data;

                  console.log(productsF);
                  let prod = document.getElementById("products");
                  prod.innerHTML = '';

                  for (let item of productsF) {
                    console.log(item)
                    prod.innerHTML += '<tr><th scope="row">'+item.id_factura+'</th><td>'+item.producto+'</td><td>'+item.cantidad+'</td><td>'+item.valor_unitario+'</td><td>'+item.valor_total+'</td></tr>'
                }
        })
    }


    function consultarTotal(idprod, cantidad){
    
    let headers = new Headers();
          
          if(idprod == null && cantidad == null){
              var ajaxurl = "http://3.88.154.3/api/sumar-producto/0/0";
          }else{
              var ajaxurl = "http://3.88.154.3/api/sumar-producto/"+idprod+"/"+cantidad;
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