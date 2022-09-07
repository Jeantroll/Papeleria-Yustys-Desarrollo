@extends('layouts.app_logout')

@section('content')
<style>
body {
    background: black;
    margin: 0px;
}

.form-login {

    width: 400px;
    height: 480px;
    background-color: white;
    color: black;
    top: 60%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius: 15px;

    

}

.cuadro-img {
    width: 100%;
    height: 120px;
    background: #fff;
    



}

.cuadro-img .logo {
    width: 250px;
    height: 110px;
    margin-left:43%;


}

.form-login .avatar {
 width: 100px;
 height: 100px;
 padding: 0;
 border-radius: 50%;
 position: absolute;
 top: 40px;
 left: calc(50% - 40px);
}

.form-login h1 {
    margin: 0 0 0 0px;
    padding: 80px 0 40px;
    text-align: center;
    font-size: 22px;
}

.form-login a {
    
    text-align: right;
  

}

.form-login label {
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;


}

.form-login input {
    width: 100%;
    margin-bottom: 20px;
}

.form-login input[type="password"]{

    margin-top: 5px;
    padding: 10px 5px 10px 5px;
    border-radius: 6px;
    border: 10%;
    

}
.form-login input[type="email"]{

    margin-top: 10px;
    padding: 10px 5px 10px 5px;
    border-radius: 6px;
    border: 10%;

}

.form-login a {
    text-decoration: none;
    font-size: 13px;
    margin-left: 160px;
   
   

}
.form-login input[type="submit"] {


    background-color: #46d9d0;
    padding: 10px 0 10px;
    border-radius: 10px;
    border: 1px solid #000;
    font-size: 17px;

}

@media (max-width: 564px){
    .logo{
        margin-left: 170px;
    }
    

}


</style>
<div class="container" style="padding-left: 0px;padding-right: 0px;">
<header> 
    <div class="cuadro-img"> 
        <img class="logo" src="https://i.ibb.co/GQq4kNr/e558a424-10c4-43c2-846d-5d35fc76c6b3.png" alt="LogoPapeleria">
    </div>
</header>

    <div class="form-login" style="height: 510px;">
    <i style=" font-size: 80px; width: 100px;height: 100px;padding: 0;border-radius: 50%;position: absolute;top: 40px;left: calc(50% - 40px);" class="fa-solid fa-user"></i>
    <h1 style="padding-top: 68px;">Bienvenido</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- USER NAME-->
    <label for="username">Usuario</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    <!-- PASSWORD-->

    <label for="password">Contraseña</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        <input type="submit" class="btn btn-primary" value="Ingresar">
    </form>
</div>
@endsection
