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
        <div class="col-md-1" id="pdf" style="display: none;"><a type="button" href="{{route('productpdf.export')}}" class="btn btn-success bt-download" style="background: red; font-size: 25px;"><i class="fa-solid fa-file-pdf"></i></a></div>
        <div class="col-md-1" id="csv" style="display:none;"><a type="button" href="{{route('product.export')}}" class="btn btn-success bt-download" style="background: #224632; font-size: 25px;"><i class="fa-solid fa-file-csv"></i></a></div>
        <div class="col-md-4"><button type="button" onclick="downloadIcons()" class="btn btn-success bt-download" style="background: #3DCE80;">Descargar inventario <i class="fa-solid fa-download"></i></button></div>
      </div>
  </div>
  <div class="col-md-6">
    <br>
    <br>

    <form class="row" action="/buscar-producto" method="post">
        @csrf
        <div class="col-md-9">
          <input type="text" name="prodsearch" class="form-control" placeholder="Buscar por nombre o id">
        </div>
        <div class="col-md-3">
          <button class="btn btn-success" type="submit"> buscar</button>
        </div>
    </form>
    <br>
    @if ($all)
    <a href="/inventario-principal" class="btn btn-success">MOSTRAR TODOS</a>
    @endif

    @if ($succesEdit || $succesDelete || $succesAdd)
    <a href="/inventario-principal" class="btn btn-success">RECARGAR</a>
    @endif

</div>
  </div>
 
</div>

<table class="table" id= "tablax">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Nombre del proveedor</th>
        <th></th>

      </tr>
    </thead>
    <tbody>
      @foreach ($inventario as $inv)          
      @if ($inv->cantidad <= 0)
      <tr style="background: #ff0000; color: white;">
        <td>{{$inv->idProducto }}</td>
        <td>{{$inv->nombre}}</td>
        <td>{{$inv->marca}}</td>
        <td>{{$inv->cantidad}}</td>
        <td>{{$inv->precio}}</td>
        <td>{{$inv->nombreCompañia}}</td>

        <td>
              <form action="/editar-inventario" method="GET">
                <input type="hidden" name="idProduct" value="{{$inv->idProducto}}">
                <button type="submit" class="btn btn-info" style="color:white; margin-right: 25px;"><i class="fa-solid fa-pen-to-square"></i></button>
              </form>
          
      </tr>
      @else
      <tr>
        <td>{{$inv->idProducto }}</td>
        <td>{{$inv->nombre}}</td>
        <td>{{$inv->marca}}</td>
        <td>{{$inv->cantidad}}</td>
        <td>{{$inv->precio}}</td>
        <td>{{$inv->nombreCompañia}}</td>

        <td>
          <div class="row">
            <div class="col-md-6">
              <form action="/editar-inventario" method="GET">
                <input type="hidden" name="idProduct" value="{{$inv->idProducto}}">
                <button type="submit" class="btn btn-info" style="color:white; margin-right: 25px;"><i class="fa-solid fa-pen-to-square"></i></button>
              </form>
            </div>
            @if(@Auth::user()->rol == 1)
            <div class="col-md-6">
              <form action="/eliminar-item" method="POST">
                @csrf
                <input type="hidden" name="idProduct" value="{{$inv->idProducto}}">
                <button type="submit" class="btn btn-danger">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </form>
            </div>
            @endif
          </div>
          
      </tr>
      @endif

      @endforeach
    </tbody>
  </table>
  <div class="pagination">
    <ol id="numbers" style="display: flex;"></ol>
</div>
</div>

@if(@Auth::user()->rol == 1)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar items</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form name="cart_quantity" method="POST" action="/eliminar-item">
        @csrf
      <div class="modal-body">
          <div class="row">
          <center>
          <label for="quantity" class="form-label">Configura la cantidad de items</label>
          <input name="quantitys" class="form-control" id="quantity" size="4" onChange="UpdateCartQuantity();" />
              <a href="javascript:changeQuantity(-1)" style="text-decoration:none; color: green;"><i class="fa-solid fa-minus"></i></a>
          <input type="hidden" name="idProduct" id="idProduct">
          </center>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button onclick="clickeds()" type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </form>

    </div>
  </div>
</div>
@endif
@if($error)
<script>
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'El producto ya ha sido creado!'
})
</script>  
@endif
@if($succesEdit)
<script>
  Swal.fire(
    'Producto editado!',
    'Tu producto ha sido editado correctamente',
    'success'
  )
</script>  
@endif
@if($succesDelete)
<script>
  Swal.fire(
    'Producto eliminado!',
    'Tu producto ha sido eliminado correctamente',
    'success'
  )
</script>  
@endif
@if($succesAdd)
<script>
  Swal.fire(
    'Producto agregado!',
    'Tu producto ha sido agregado correctamente',
    'success'
  )
</script>  
@endif
<script>
  $(function() {
	const rowsPerPage = 10;
	const rows = $('#tablax tbody tr');
	const rowsCount = rows.length;
	const pageCount = Math.ceil(rowsCount / rowsPerPage); // avoid decimals


	const numbers = $('#numbers');

	// Generate the pagination.

    for (var i = 0; i < pageCount; i++) {
		numbers.append('<ul class="pagination pagination-sm"><li class="page-item"><a style="background: #af0b10; color: white;" class="page-link" href="#">' + (i+1) + '</a></li>  </ul>');
	  }


	// Mark the first page link as active.
	$('#numbers li:first-child a').addClass('active');

	// Display the first set of rows.
	displayRows(1);

	// On pagination click.
	$('#numbers li a').click(function(e) {
		var $this = $(this);

		e.preventDefault();

		// Remove the active class from the links.
		$('#numbers li a').removeClass('active');

		// Add the active class to the current link.
		$this.addClass('active');

		// Show the rows corresponding to the clicked page ID.
		displayRows($this.text());
	});

	// Function that displays rows for a specific page.
	function displayRows(index) {
		var start = (index - 1) * rowsPerPage;
		var end = start + rowsPerPage;

		// Hide all rows.
		rows.hide();

		// Show the proper rows for this page.
		rows.slice(start, end).show();
	}
});
function giveQuantity(quantity, id) {
  document.getElementById('quantity').value = quantity;
  document.getElementById('idProduct').value = id;
}

function changeQuantity(qty) {
    document.cart_quantity['quantity'].value = Number(document.cart_quantity['quantity'].value)+Number(qty);
    UpdateCartQuantity();
}
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

