<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">  <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo constant('URL');?>/public/css/stylespass.css">
    <script src="https://kit.fontawesome.com/4e20857604.js" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #014F86;">
<a class="navbar-brand" href="../main/index.php">
    <img src="<?php echo constant('URL');?>/public/images/logoitech.png" id="logo" width="70" height="65" class="d-inline-block" alt=""> ITECH

  </a>  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;">
    <span><i class="fas fa-bars"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
         </ul>
 
  </div>
</nav>

<div class="content">
    <h1 class="titulop">Cambiar contraseña</h1>
   
   </div> 

   <form class="passchange">
  <div class="form-group">
    <label class="font-weight-bold">Contraseña</label>
    <input type="pass" class="form-control" required>
    <small id="passHelp" class="form-text text-muted">Por tu seguridad, cambia la contraseña.</small>
  </div>
  <div class="form-group">
    <label class="font-weight-bold">Confirmar contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" required>
</div>
<div class="text-center"> 
<button type="submit" id="btnsub" class="btn btn-primary">Cambiar contraseña</button>
</div>
  
</form>


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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script>
    gsap.from("#logo", {duration: 3, x: 300, opacity: 0, scale: 0.5});
</script>


</html>
