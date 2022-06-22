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
    <br>
    <div class="row">
        <div class="col-md-6">
            <h1>Proveedores</h1>
        </div>
        @if(@Auth::user()->rol == 1)
        <div class="col-md-6">
            <form action="/crear-proveedor" method="GET">
                <button type="submit" class="btn btn-success bt-crear" style="background: #59EBF4; width: 95px; color:black;">Crear <i class="fa-solid fa-circle-plus"></i></button>
            </form>
        </div>
        @endif
    </div>
    <br>
    <table class="table table-Success">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre proveedor</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($proveedor as $pr)
            <tr>
                <th scope="row">{{$pr->idproveedor}}</th>
                <td>{{$pr->nombreCompañia}}</td>
                <td>
                  @if(@Auth::user()->rol == 1)
                  <form action="/editar-proveedor" method="POST">
                    @csrf
                    <input type="hidden" name="idProveedor" value="{{$pr->idproveedor}}">
                    <button type="submit" class="btn btn-info" style="color:white; margin-right: 25px;"><i class="fa-solid fa-pen-to-square"></i></button>
                  </form>            
                  @endif
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>


@endsection