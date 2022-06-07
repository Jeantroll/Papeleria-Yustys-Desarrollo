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
            <div class="col-md-6">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="giveQuantity({{$inv->cantidad}},{{$inv->idProducto}});">
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </div>

          </div>
          
      </tr>
      @endif

      @endforeach
    </tbody>
  </table>