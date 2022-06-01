<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">  <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4e20857604.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo constant('URL');?>/public/css/styleslogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #014F86;">
<a class="navbar-brand" href="<?php echo constant('URL');?>">
    <img src="<?php echo constant('URL');?>/public/images/logoitech.png" id="logo" width="70" height="65" class="d-inline-block" alt=""> ITECH

  </a>  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;">
    <span><i class="fas fa-bars"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
         </ul>
 
  </div>
</nav>


<section class="forms-section">
  <h1 class="section-title">¡Accede a tu cuenta!</h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Iniciar Sesión
        <span class="underline"></span>
      </button>
      <form class="form form-login" method="POST" action="<?php echo constant('URL');?>/vendedores/iniciar_sesion">
        <fieldset>
          <legend>Ingresa tu usuario y contraseña para acceder a tu cuenta</legend>
          <div class="input-block">
            <label for="login-email">Correo Electrónico:</label>
            <input id="login-email" type="email" required name="email">
          </div>
          <div class="input-block">
            <label for="login-password">Contraseña:</label>
            <input id="login-password" type="password" required name="contrasenia">
          </div>
        </fieldset>
        <button type="submit" class="btn-login">Ingresar</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        Registrarse
        <span class="underline"></span>
      </button>
      <form class="form form-signup" action="<?php echo constant('URL');?>/vendedores/agregar" method="POST">
        <fieldset>
          <legend>Por favor ingresa los datos que se te piden</legend>
          
          <div class="row">

        
          <div class="input-block col">
            <label for="signup-name">Nombre:</label>
            <input id="signup-name" type="text" required name="nombre">
          </div>
          <div class="input-block col">
            <label for="signup-last">Apellido paterno:</label>
            <input id="signup-last" type="text" required name="apellido_paterno">
          </div>
          <div class="input-block col">
            <label for="signup-last">Apellido materno:</label>
            <input id="signup-last" type="text" required name="apellido_materno">
          </div>
</div> 

          <div class="input-block">
            <label for="signup-email">Correo Electrónico:</label>
            <input id="signup-email" type="email" required name="email">
          </div>
          <div class="row">
          <div class="input-block col">
            <label for="signup-curp">CURP:</label>
            <input maxlength="18" id="signup-curp" type="text" required name="curp">
          </div>
          <div class="input-block col">
            <label for="signup-tel">Teléfono:</label>
            <input id="signup-tel" type="tel"  required name="telefono">
          </div>
          </div>
          <div class="input-block">
            <label for="signup-add">Dirección:</label>
            <input id="signup-add" type="text" required name="direccion">
          </div>
        </fieldset>
        <button type="submit" class="btn-login">Continuar</button>
      </form>
    </div>
  </div>
</section>

<div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-snapchat-ghost"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-facebook-f"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Inicio</a></li>
                <li class="list-inline-item"><a href="#">Servicios</a></li>
                <li class="list-inline-item"><a href="#">Nosotros</a></li>
            </ul>
            <p class="copyright">ITECH COMPANY © 2022</p>
        </footer>
    </div>

    
</body>

<script src="https://kit.fontawesome.com/4e20857604.js" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<!-- <script src="./script.js"></script> -->
<script>
  const switchers = [...document.querySelectorAll('.switcher')]

  switchers.forEach(item => {
    item.addEventListener('click', function() {
      switchers.forEach(item => item.parentElement.classList.remove('is-active'))
      this.parentElement.classList.add('is-active')
    })
  })

    gsap.from("#logo", {duration: 3, x: 300, opacity: 0, scale: 0.5});
</script>


</html>
