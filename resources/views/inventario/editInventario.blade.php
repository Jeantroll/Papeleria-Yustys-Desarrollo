@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card" >
        <div class="card-body">
            <h1><i class="fa-solid fa-file-pen" style="color: #3AE8E8;"></i>  Editar producto</h1>
            <br>
            @foreach ($inventarioEdits as $invEdit)              
            <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="product" class="col-form-label">Nombre del producto</label>
                </div>
                <div class="col-md-10">
                  <input type="text" id="product" class="form-control" name="product" value="{{$invEdit->nombre}}" required>
                </div>
              </div>
              <br>
              <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="marca" class="col-form-label">Marca</label>
                </div>
                <div class="col-md-10">
                  <input type="text" id="marca" class="form-control" name="marca" value="{{$invEdit->marca}}" required>
                </div>
              </div>
              <br>
              <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="cantidad" class="col-form-label">Cantidad</label>
                </div>
                <div class="col-md-10">
                  <input type="number" id="cantidad" class="form-control" name="cantidad" value="{{$invEdit->cantidad}}" required>
                </div>
              </div>
              <br>
              <div class="row g-12 align-items-center">
                <div class="col-md-2">
                  <label for="precio" class="col-form-label">Precio</label>
                </div>
                <div class="col-md-10">
                  <input type="number" id="precio" class="form-control" name="precio" value="{{$invEdit->precio}}" required>
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
                        <option @if ($invEdit->proveedor_idproveedor == $pr->idproveedor) selected @endif value="{{$pr->idproveedor}}">{{$pr->nombreCompañia}}</option>
                    @endforeach
                </select>
                </div>
              </div>
              @endforeach
              <br>
              <center>
              <button type="button" class="btn btn-info" style="color: white; font-size: 25px;">Guardar cambios <i class="fa-solid fa-floppy-disk"></i></button>
            </center>
        </div>
      </div>   
        

</div>


@endsection
