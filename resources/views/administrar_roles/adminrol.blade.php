@extends('layouts.app')

@section('content')
@if(@Auth::user()->rol == 1)
  
<style>
 @import url("https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900");
.a  { 
  text-decoration: none;
}

.member-card {
  padding: 30px;
  background-color: #393e46;
  color: white;
  transition: all 0.2s ease-in-out;
  -webkit-box-shadow: 0 15px 30px -15px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0 15px 30px -15px rgba(0, 0, 0, 0.7);
  -ms-box-shadow: 0 15px 30px -15px rgba(0, 0, 0, 0.7);
  box-shadow: 0 15px 30px -15px rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  letter-spacing: 2px;
  margin: 10px;
}
.member-card img {
  width: 64px;
  height: 64px;
}
.member-card .member-card-details {
  flex-grow: 1;
  margin-left: 20px;
}
.member-card .member-card-details .member-position {
  opacity: 0.7;
  font-size: 14px;
  text-transform: uppercase;
}
.member-card .member-card-details .member-name {
  color: white;
  font-size: 18px;
  margin-bottom: 10px;
}

.member-card .btn-fired:hover {
  color: red;
  cursor: pointer;
}
</style>


<body>
  @if ($succses == true || $delete == true || $fail == 'Error')
  <div class="row">
      
    <div class="col-md-10">
      <center>
        <h1>Usuarios listados</h1>
        <p>En esta sección puedes editar el rol de todos los usuarios</p>
      </center>
    </div>
    <div class="col-md-2">
      <br>
      <form action="/administrar-usuario" method="GET">
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-spinner"></i> Recargar</button>

      </form>

    </div>
  </div>
  @else
  <center>
    <h1>Usuarios listados</h1>
    <p>En esta sección puedes editar el rol de todos los usuarios</p>
  </center>
  @endif
<input type="date" name="" id="">
  
  <div class="row">
        @foreach ($users as $us)
        <div class="col-md-12 col-lg-6">
          <div class="member-card">
            <div class="member-pic"><img class="member-pic rounded-circle" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAIYAhgMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAABAUBAwYCB//EADYQAAICAQEGAwQIBwEAAAAAAAABAgMEEQUSITFBUTJhcROBkbEVI1JTkqHB0SIzNEJicoIU/8QAFgEBAQEAAAAAAAAAAAAAAAAAAAEC/8QAFhEBAQEAAAAAAAAAAAAAAAAAAAER/9oADAMBAAIRAxEAPwD7iAAAAAAAADy5KK1k0l5mmWZjx52xfpxAkAjf+/G+8/JnuGVRPhG2DfbUDcDGq7mQAAAAAAAAAAAAEfLyY48NWtZPlHuBsuuhTHeskkvmVt+0pz1VK3F3fFkO22d03OyWrf5Hg1iPU5ym9Zycn3ZgwAgZMADZVdZU/q5yj7ywx9pJvdvWn+SKsBXSRkpJOLTT5NGSixcqePLhxh1j+xdVWwtgp1vWLJYr2ACAAAAAA13WxprlOXJIobrJXWOc3xbJm1bt+1VJ8IcX6kA1EAAEbKap3TUILVstcfAprS317SXd8vgedk1KNDs6zfPyROJasa3j0taOqH4UQ8nZ0WnKjg/svkywBFc2009GtH1RgnbVqULlNLxrj6ogmmQk4OS8ezj4JeL9yMArpFyMkLZd3tKPZt/xQ4e4mmVAAAMSajFyfJLVmTRnS3cS3zjp8QKOcnOblLm3qeTJg0yAAC72bJPEhp01T+JKKfZ2SqZuE3pCXXsy3RK0yAeLLI1wc5ySiurIK/bEl9VHrxfyK03ZV7yLnN8uUV2RpNRAABErZ1m5lRXSXBl2c5XLdshLs0zoyVYAAihG2j/SWe75kk05kd/Ftiue7wAoAAaZDD5mTZTTZdLdrjr+gVq1fA30Zt9K0jLWPaXEsKNm1xSdr338Ebp4OPPnWl/rwJor/pW5rTcgn6Mi3323NuyTenJdEW/0bj9pfE2LCx1Hd9kvXqFUCbMqXfmWeRs3nKh/8srpRcZNSi013KjAACMrmdGjn6I791ce8kdCSrAAEUMPkZAHPX1uq6cOzNZZ7Vo4K6PThL9CsNRG3GolkWqEfe+yLymmFNahBcPmQdk2VpSr5WPjr3LIlUABAAAAjZmJHIg+Gk1yZJAHOSi4ScWtGuDPJK2hZXZkP2fTg33ZFNIm7Lr38jf04Q+ZcEbBo9hjpPxPjIkkqgAIAAAxKKknGS1TWjRR5mNLHs05wfhf6F6eLaoW1uE46xZYOeTaaa1TRZ4m0YtKF/CX2ujIuXhzx3r4odJdvUilR0kWpLVNNd0ZOeqvtq/lzlHyRKhtO5eKMZefImKtwVf0pL7lfiNVm0b5cI7sfRDBbWWQri5WSUV5lXmZ7tThVrGHV9WQ5znN6zk5Pu2eS4jJP2bib0vbWL+FeFPq+4wsCUtLL1pHmodX6lokkkktEiWkZABFAAAAAAAAY0TId+zqrNXX9XLy5E0AUlmBkQ/s3l3iR5Vzj4oSXqjowXUxzej7HuFNs/BXN+iOg0RkaYp6tnXS039ILz4sn4+HTRxUdZfaZJA1QAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB//Z"/></div>
            <div class="member-card-details">
              <a href="#"><div class="member-name">{{$us->name}}</div></a>
              @if ($us->rol == 1)
              <div class="member-position">Administrador</div>
              @elseif ($us->rol == 0)
              <div class="member-position">Auxiliar</div>
              @elseif ($us->rol == 2)
              <div class="member-position text-danger">Primer registro</div>

              @endif
            </div>
            <div class="btn-fired" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="passIdUser({{$us->id}},'{{$us->name}}','{{$us->email}}','{{$us->rol}}')">Editar</div>
          </div>
        </div>
        @endforeach
        
      </div>

  </body>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <h4>Edita al usuario <p id="txtName"></p></h4>
        </center>
        <form action="/editar-usuario" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre usuario</label>
            <input type="text" class="form-control" name="nameUser" id="inptName">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email usuario</label>
            <input type="email" class="form-control" name="emailUser" id="inptEmail">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Rol usuario</label>
            <select class="form-select" id="selectRol" name="rolUser" aria-label="Default select example">
              <option value="1">Administrador</option>
              <option value="0">Auxiliar</option>
              <option value="2">Primer logeo</option>
            </select>
            </div>
            <input type="hidden" name="idUser" id="idUser">
          <center>
            <button type="submit" class="btn btn-primary">Editar</button>

        </form>
        <form action="delete-user" method="post" style="display: contents;">
          @csrf
          <input type="hidden" name="idUserDelete" id="idUserDelete">


          <button type="submit" class="btn btn-danger" id="delete">Eliminar</button>
        </form>
      </center>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@if ($delete)
<script>
  Swal.fire(
    'Usuario eliminado',
    'El usuario ha sido eliminado correctamente',
    'success'
    )
</script>
@endif
@if ($succses)
<script>
  Swal.fire(
    'Usuario editado',
    'El usuario ha sido editado correctamente',
    'success'
    )
</script>
@endif

@if ($fail == 'Error')
<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Este email esta siendo usado por otro usuario, intenta otro',
  })
</script>
@endif


<script>
  

  function passIdUser(idUser, nameUser, emailUser, rolUser) {
    document.getElementById('idUser').value = idUser;
    document.getElementById('inptName').value = nameUser;
    document.getElementById('inptEmail').value = emailUser;
    document.getElementById('selectRol').value = rolUser;

    //Pasar texto al titulo
    document.getElementById('txtName').innerHTML = nameUser;

    if (rolUser == 2) {
      document.getElementById('delete').style.display = "initial"
      document.getElementById('idUserDelete').value = idUser;

    }else{
      document.getElementById('delete').style.display = "none"
    }


  }
</script>
@else
<x-error></x-error>
@endif

  @endsection