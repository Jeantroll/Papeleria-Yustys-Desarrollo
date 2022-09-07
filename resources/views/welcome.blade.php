<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontpage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://kit.fontawesome.com/10966c2252.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>
</head>
<body>
<style>
  .color img{
    filter: grayscale(100%);
    -webkit-filter: grayscale(100%);
    -webkit-transition: all 1s ease;
    }
    
    .color img:hover{
    filter: grayscale(0%);
    filter: gray;
    -webkit-filter: grayscale(0%);
    filter: none;
    transition: 1s ease;
     }



    .card:hover{

    transition: 1s ease;
    -webkit-transform: scale(1.2);
    -ms-transform: scale(1.2);
    transform: scale(1.2);
    transition: 1s ease;
        

    }



    .grow img{
      transition: 1s ease;
      }
      
      .grow img:hover{
      -webkit-transform: scale(1.2);
      -ms-transform: scale(1.2);
      transform: scale(1.2);
      transition: 1s ease;
      }
</style>


 <nav class="navbar navbar-expand-lg navbar-light " >

        <div class="container p-3">

            <a class="navbar-brand  " style=" color: rgb(0, 0, 0); font-weight: bolder; font-size: 1.6em; " href="#">Papeleria Yusty</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="flex: none; " id="navbarNav">
              <ul class="navbar-nav ml-auto " >
                <li class="nav-item">
                  <a class="nav-link" style=" color: black" href="#quienessomos" >Quienes somos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style=" color: black;" href="#productos" >Productos</a>
                </li>
                <li class="nav-item " >
                  <a class="nav-link " style=" color: black;"    href="#contacto">Contacto</a>
                </li>

              </ul>
            </div>

          <ul class="navbar-nav">

            <li class="nav-item">
              <a class="nav-link" style=" color: black;" href="{{ route('login') }}">Iniciar sesion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style=" color: black;" href="{{ route('register') }}">Registrarse</a>
            </li>
          </ul>




        </div>

 </nav>
 
</div>



 
 <div id="carouselExampleControls" class="carousel slide border" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="https://raw.githubusercontent.com/AndresYusty/landpage-papeleriayusty/master/assets/WhatsApp%20Image%202022-07-16%20at%2010.26.57%20PM.jpeg" class="d-block w-100 hero"  alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://raw.githubusercontent.com/AndresYusty/landpage-papeleriayusty/master/assets/WhatsApp%20Image%202022-07-17%20at%201.10.04%20PM.jpeg" class="d-block w-100" alt="...">
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



</div>


 
<div class="container mt-5">
 <div class="row-6">
   <img src="" alt="">
 </div>
</div>

</div>




<div class="container border mt-5" id="quienessomos">

  <div class="row pt-4 pb-4">

    <div class="col-md-6" style="padding-left: 1%;">

      <h5 class="text-center">¿Que hacemos?</h5>
      

        <p class="pt-4"> En la papeleria Yusty ofrecemos servicios de internet, venta al por mayor o detal de materiales de oficina, utiles
          escolares, decoración de fiestas. Contamos con servicios de fotocopias, impresiones, pago de servicios y mucho más  </p>
          <p class=""> Contamos con materiales de excelente calidad, además de una atención agradable para que pases la mejor experiencia. Realiza tus pedidos con nosotros! </p>

    </div>
    <div class="col-md-6 border-start text-center">

      <img src="https://img.freepik.com/vector-gratis/venta-carrito-compras-completo-pictograma-rojo_1284-8505.jpg?w=2000" style="" width="60%" height="280px" alt="papeleria yusty" >

    </div>



  </div>



 </div>

 
</div>


 
<div class="container mt-5">
 <div class="row-6">
   <img src="" alt="">
 </div>
</div>

</div>


 
<div class="container mt-5">
 <div class="row-6">
   <img src="" alt="">
 </div>
</div>





<div class="container row m-auto my-5" id="productos">

 <h1 class="text-center mb-5">Categoria de productos</h1>
<div class="card m-auto shrink" style="width: 18rem;">
  <img src="https://www.semana.com/resizer/VeB4qLhmFYPD5az8nPQ1Qs1ADH0=/1200x675/filters:format(jpg):quality(50)//cloudfront-us-east-1.images.arcpublishing.com/semana/3VXJG2NPQZDO5N3Q7WIMQRNT5Y.jpg" class="card-img-top mt-3" alt="...">
  <div class="card-body">
    <h5 class="card-title">Articulos de colegio</h5>
    <p class="card-text">
      <ul>
        <li>Lapices</li>
        <li>Lapiceros</li>
        <li>Cuadernos</li>
        <li>Pegantes</li>
        <li>Borradores</li>
        <li>Sacapuntas</li>
        <li>Marcadores</li>
        <li>Y mucho más!</li>
      </ul>
    </p>
    
  </div>
</div>


<div class="card m-auto shrink " style="width: 18rem;">
  <img src="https://raw.githubusercontent.com/AndresYusty/landpage-papeleriayusty/master/assets/WhatsApp%20Image%202022-07-19%20at%208.25.44%20AM.jpeg" class="card-img-top mt-3" alt="...">
  <div class="card-body">
    <h5 class="card-title">Articulos de decoración</h5>
    <p class="card-text"> 
      <ul>

        <li>Velas</li>
        <li>Papel regalo</li>
        <li>Volcanes</li>
        <li>Bombas</li>
        <li>Cortinas</li>
        <li>Tarjetas</li>
        <li>Cintas</li>
        <li>Sobres</li>
        <li>Y mucho más!</li>


      </ul>
    </p>
  
  </div>
</div>

<div class="card m-auto shrink" style="width: 18rem;">
  <img src="https://d34vmoxq6ylzee.cloudfront.net/magefan_blog/Las_7_mejores_ideas_para_organizar_tu_oficina_en_casa.jpg" class="card-img-top mt-3" alt="...">
  <div class="card-body">
    <h5 class="card-title">Articulos de oficina</h5>
    <p class="card-text">

      <li>Carpetas</li>
      <li>Huelleros</li>
      <li>Blocks</li>
      <li>Grapadoras</li>
      <li>Saca ganchos</li>
      <li>Recibos</li>
      <li>Portafolios</li>
      <li>Memofichas</li>
      <li>Y mucho más!</li>

     


    </p>
    
  </div>
</div>



</div>


 
 <div class="container mt-5">
  <div class="row-6">
    <img src="" alt="">
  </div>
 </div>

 





 <div class="container border  bg-light mt-5 mb-5 carousel slide" id="carouselExampleControls" data-bs-ride="carousel">

  <h4 class="text-center pt-4 pb-4">Línea de marcas</h4>

  <div class="row pt-4 pb-4 color text-center ">

    <div class="col-md-3">
     <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Bic_logo.svg/375px-Bic_logo.svg.png"   width="80%" height="50%"alt="">
    </div>
    
     <div class="col-md-3">
     <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Pelikan_textlogo.png/368px-Pelikan_textlogo.png" class="m-auto" width="80%" height="50%" alt="">
    </div>
     
     <div class="col-md-3">
     <img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Logo_Norma_nuevo.png" class="m-auto" width="80%" height="50%" alt="">
    </div>

     <div class="col-md-3">
     <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Paper_mate_textlogo.svg/2560px-Paper_mate_textlogo.svg.png" class="m-auto" width="80%" height="50%" alt="">
    </div>


  </div>
  <div class="row pt-4 pb-4 color text-center">
    
    <div class="col-md-3">
      <img src="https://github.com/AndresYusty/landpage-papeleriayusty/blob/master/assets/logo-primavera.png?raw=true" width="80%" height="50%"alt="">
    </div>

    <div class="col-md-3">
      <img src="http://www.panafargo.com/wp-content/uploads/2019/05/Doricolor.png" width="80%" height="50%" alt="">
    </div>

    <div class="col-md-3">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Logo_CASIO.svg/1280px-Logo_CASIO.svg.png" width="80%" height="50%" alt="">
    </div>
    
    <div class="col-md-3">
      <img src="https://i.pinimg.com/originals/56/de/de/56dede9757c7af21051901df81d7988f.png" width="80%" height="50%" alt="">
    </div>



  </div>


 </div>

 










 <footer class="footer text-secondary bg-dark m-0" id="contacto">



  <div class="container">
    <div class="row">
    
      <div class="col pt-3 pb-3">
        <h5 class="text-center mb-4">CONTACTO</h5>
        <ul>
          <li><i class="fa-solid fa-envelope"></i> papeleriayusty@gmail.com</li>
          <li><i class="fa-solid fa-phone"></i> 3188113937 </li>




        </ul>

      </div>
      <div class="col pt-3 pb-3">
       <h5 class="text-center mb-4">SERVICIOS</h5>
       <ul>
        <li>Material escolar</li>
        <li>Todo en papelería</li>
        <li>Servicios de internet</li>
        <li>Trabajos a computador</li>
        <li>Pago de servicios</li>



      </ul>

      </div>
      <div class="col pt-3 pb-3 text-end">
       <h5 class="text-center"></h5>
       <a href="#"><i class="fa-brands fa-facebook-square"></i></a>
       <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
       <a href="#"><i class="fa-brands fa-whatsapp-square"></i></a>
       <a href="#"><i class="fa-brands fa-linkedin"></i></a>
 

      </div>
      


    </div>



  <p class="text-center pb-2 mb-0"> &copy; 2022 Papeleria Yusty </p>
 </div>
</footer>





 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>