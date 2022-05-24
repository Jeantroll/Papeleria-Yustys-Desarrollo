@extends('layouts.app')

@section('content')

<style>
    #side .items ul li .proveedor{
    background: #59EBF4 !important;
    color: white !important;
    }

    .table thead{
    background: #59EBF4;
    border-bottom: none;
  }
</style>

<div class="container">
    <div class="card" >
      <div class="card-body">
        <h1><i class="fa-brands fa-product-hunt" style="color: #3AE8E8;"></i>  Editar proveedor</h1>
        <br>
        <form action="/proveedor-editado" method="POST">
            @csrf
        <div class="row g-12 align-items-center">
            <div class="col-md-2">
              <label for="product" class="col-form-label">Nombre del proveedor</label>
            </div>
            @foreach ($proveedorEdit as $prEd)
            <input type="hidden" name="idProveedor" value="{{$prEd->idproveedor}}">
            <div class="col-md-10">
              <input type="text" id="product" value="{{$prEd->nombreCompañia}}" class="form-control" name="nombreProveedor" required>
            </div>
            @endforeach
          </div>
          <br>
          <center>
          <button type="submit" class="btn btn-info" style="color: white; font-size: 25px;">Editar <i class="fa-solid fa-circle-plus"></i></button>
        </center>
    </form>
    </div>

      </div>   
        

</div>


@endsection