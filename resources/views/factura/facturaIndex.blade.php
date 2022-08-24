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
                    <div class="col-md-1" id="pdf" style="display: none;"><a type="button" href="{{route('facturaspdf.export')}}" class="btn btn-success bt-download" style="background: red; font-size: 25px;"><i class="fa-solid fa-file-pdf"></i></a></div>
                    <div class="col-md-1" id="csv" style="display:none;"><a type="button" href="{{route('facturas.export')}}" class="btn btn-success bt-download" style="background: #224632; font-size: 25px;"><i class="fa-solid fa-file-csv"></i></a></div>
                    <div class="col-md-4"><button type="button" onclick="downloadIcons()" class="btn btn-success bt-download" style="background: #3DCE80;">Generar reporte <i class="fa-solid fa-download"></i></button></div>
                    <div class="col-md-6">
                        <form action="/buscar-factura" method="post">
                            @csrf
                            <input type="text" name="radsearch" class="form-control" placeholder="Buscar por radicación o id">

                        </form>
                    </div>
                  </div>            
                </div>
                
                <div class="col-md-12">
                    <br>
                    <br>
                    <center>
                        <form action="/facturas-emitidas" method="post" name="type_factura">
                            @csrf
                            <input type="hidden" name="type_fact" id="type_fact">

                            <button type="button" onclick="cambioFact(1)" class="btn btn-success bt-download" style="background: #3DCE80;">Aprobado <i class="fa-solid fa-check-to-slot"></i></button>
                            <button type="button" onclick="cambioFact(2)" class="btn btn-success bt-download" style="background: #e0be24;">En proceso <i class="fa-solid fa-spinner"></i></button>
                            <button type="button" onclick="cambioFact(3)" class="btn btn-success bt-download" style="background: #d64e4e;">Cancelados <i class="fa-solid fa-ban"></i></button>
                            <button type="button" onclick="cambioFact()" class="btn btn-success bt-download" style="background: #3DCE80;">Todos <i class="fa-solid fa-border-all"></i></button>

                        </form>
                    </center>
                    
                </div>
        </div>
        <br>
        
        <table class="table table-Success" id= "tablax">
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
                        <td>{{number_format($ft->valor_total_neto)}}$</td>
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
                        @if(@Auth::user()->rol == 1)
                        <div class="col-md-6">
                            <form action="eliminar-factura" method="POST">
                                @csrf
                                <input type="hidden" name="idFactura" value="{{$ft->idfactura}}">
                                <input type="hidden" name="numeroRad" value="{{$ft->numero_radicacion}}">
                                <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; color: white;" type="submit" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></button></td>
                            </form>
                        </div>
                        @endif
                        
                    </div>

                    @endif

                @else
                <tr>
                    <th scope="row">{{$ft->idfactura}}</th>
                    <td>{{$ft->nombreClienteFactura}}</td>
                    <td>{{$ft->documentoCliente}}</td>
                    <td>{{$ft->numero_radicacion}}</td>
                    @if ($ft->active == 1)
                        <td>{{number_format($ft->valor_total_neto)}}$</td>
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
          <div class="pagination">
            <ol id="numbers" style="display: flex;"></ol>
        </div>
    </div>  
    
</div>

<script>
    function cambioFact(id) {
        document.getElementById('type_fact').value = id

        document.type_factura.submit()

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
</script>

@if ($succses)
    <script>
        window.location.href = "/facturas";
    </script>
@endif


@endsection