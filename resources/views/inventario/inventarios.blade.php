@extends('layouts.app')

@section('content')

<style>
  .tableDivInventario{
    margin-top: 35px;
  }
  .table thead{
    background: #3DCE80;
    color: white;
    border-bottom: none;
  }
  .headerInventario{
    display: flex;
    margin-bottom: 25px;
  }
  
  .headerInventario h1{
    margin-right: 18px;
  }
  .headerInventario .bt-crear{
    margin-right: 590px;
  }

  .headerInventario .bt-crear:hover{
    background: #23774a !important;
  }

  .headerInventario .bt-download:hover{
    background: #23774a !important;
  }
  #side .items ul li .inventario{
    background: #59EBF4 !important;
    color: white !important;
}

</style>
@if($succes)
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{$msg}}
			</div>
		</div>
	</div>
	@endif
<div class="tableDivInventario">
<div class="headerInventario">
  <div class="row">
    <div class="col-md-8">
    <div class="row">
    <div class="col-md-4">
    <h1><i class="fa-solid fa-boxes-stacked"></i>Inventario</h1>
    </div>
    <div class="col-md-8">
      <form action="/añadir-producto" method="GET">
        <button type="submit" class="btn btn-success bt-crear" style="background: #3DCE80; width: 95px;">Crear <i class="fa-solid fa-circle-plus"></i></button>

      </form>
  </div>  
  </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-2" id="pdf" style="display: none;"><button type="button" class="btn btn-success bt-download" style="background: red; font-size: 25px;"><i class="fa-solid fa-file-pdf"></i></button></div>
        <div class="col-md-2" id="csv" style="display:none;"><button type="button" class="btn btn-success bt-download" style="background: #224632; font-size: 25px;"><i class="fa-solid fa-file-csv"></i></button></div>
        <div class="col-md-8"><button type="button" onclick="downloadIcons()" class="btn btn-success bt-download" style="background: #3DCE80;">Descargar inventario <i class="fa-solid fa-download"></i></button></div>

      </div>
  </div>
  </div>
 
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Marca</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Nombre del proveedor</th>
        <th></th>

      </tr>
    </thead>
    <tbody>
      @foreach ($inventario as $inv)          

      <tr>
        <td>{{$inv->idProducto }}</td>
        <td>{{$inv->nombre}}</td>
        <td>{{$inv->marca}}</td>
        <td>{{$inv->cantidad}}</td>
        <td>{{$inv->precio}}</td>
        <td>{{$inv->nombreCompañia}}</td>

        <td><form action="/editar-inventario" method="GET">
          <input type="hidden" name="idProduct" value="{{$inv->idProducto}}">
          <button type="submit" class="btn btn-info" style="color:white; margin-right: 25px;">Editar <i class="fa-solid fa-pen-to-square"></i></button>
          </form>
          <button type="button" class="btn btn-danger">Eliminar <i class="fa-solid fa-trash-can"></i></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@if($succes)
<script>
    window.location.replace("/inventario-principal");
</script>  
@endif

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
@endsection

