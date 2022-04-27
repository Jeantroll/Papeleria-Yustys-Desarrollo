@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card" >
        <div class="card-body">
            <h1><i class="fa-brands fa-product-hunt" style="color: #3AE8E8;"></i>  Nuevo producto</h1>
            <br>
            <form action="/añadir-producto-inventario" method="POST">
                @csrf
            <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="product" class="col-form-label">Nombre del producto</label>
                </div>
                <div class="col-md-10">
                  <input type="text" id="product" class="form-control" name="product" required>
                </div>
              </div>
              <br>
              <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="marca" class="col-form-label">Marca</label>
                </div>
                <div class="col-md-10">
                  <input type="text" id="marca" class="form-control" name="marca" required>
                </div>
              </div>
              <br>
              <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="cantidad" class="col-form-label">Cantidad</label>
                </div>
                <div class="col-md-10">
                  <input type="number" id="cantidad" class="form-control" name="cantidad" required>
                </div>
              </div>
              <br>
              <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="precio" class="col-form-label">Precio</label>
                </div>
                <div class="col-md-10">
                  <input type="number" id="precio" class="form-control" name="precio" required>
                </div>
              </div>

              <br>
              <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="proveedor" class="col-form-label">Proveedor</label>
                </div>
                <div class="col-md-10" class="form-control" required>
                    
                    <select class="form-select" aria-label="Default select example" name="proveedor">
                        @foreach ($proveedor as $pr)
                            <option value="{{$pr->idproveedor}}">{{$pr->nombreCompañia}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <br>
              <center>
              <button type="submit" class="btn btn-info" style="color: white; font-size: 25px;">Agregar <i class="fa-solid fa-circle-plus"></i></button>
            </center>
        </form>
        </div>
      </div>   
        

</div>


@endsection
