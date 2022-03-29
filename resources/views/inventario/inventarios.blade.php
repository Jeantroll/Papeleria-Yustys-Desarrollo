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
    margin-right: 730px;
  }
</style>
<div class="tableDivInventario">
<div class="headerInventario">
  <h1><i class="fa-solid fa-pen-to-square"></i>Factura de Venta</h1>
  <button type="button" class="btn btn-success bt-crear">Crear</button>

  <button type="button" class="btn btn-success bt-download">Descargar inventario</button>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Marca</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Opciones</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Crema</td>
        <td>CabeLlo</td>
        <td>keratina</td>
        <td>17</td>
        <td>100.000</td>
        <td><button type="button" class="btn btn-info" style="color:white; margin-right: 25px;">Editar</button><button type="button" class="btn btn-danger">Eliminar</button></td>

      </tr>
    </tbody>
  </table>
</div>
@endsection

