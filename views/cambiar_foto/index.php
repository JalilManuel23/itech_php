<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos-->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/cambiar_foto.css">

    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>
        .default-img {
            border-radius: 50%;
        }
    </style>

    <title>Actualizar Imagen de Perfil </title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg">
        <a class="navbar-brand" href="#"><img src="<?php echo constant('URL');?>public/images/logoitech.png" alt="Logotipo Itech" height="50"> ITECH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon icono-menu"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#" role="button">Ver Perfil</a>
                </li>
                <li class="nav-item dropdown mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" role="button">
                        Configuración
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Cambiar imagen de perfil</a>
                        <a class="dropdown-item" href="#">Cambiar contraseña</a>
                    </div>
                </li>
                <li class="nav-item mx-2">
                    <button type="button" class="btn btn-logout">Cerrar Sesión</button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="admin-usuario m-4">
        <h1 class="text-center bienvenido pb-3">Actualizar Foto de Perfil</h1>
        <h3 class="text-center intro-bienvenida">Selecciona una nueva imagen de perfil</h3>
        <div class="d-flex justify-content-center mx-3 my-4">
            <form class="mx-1 my-3 form-cambio-pass px-5 py-4" method="post" action="<?php echo constant('URL'); ?>vendedores/cambiar_foto" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-12 mb-3">
                        <label for="">Imagen de perfil actual: </label>
                    </div>
                    <div class="col-12 mb-3 d-flex justify-content-center">
                        <img src="<?php echo constant('URL'); ?>/public/fotos_usuarios/<?php echo $this->foto; ?>" alt="Foto de Perfil de Usuario" class="default-img"
                            width="150">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 mb-3">
                        <label for="">Nueva imagen de perfil: </label>
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" name="id" value=<?php echo $this->id_usuario; ?>>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadedFile">
                    </div>
                </div>
                <button type="submit" class="btn btn-modificar">Guardar</button>
            </form>
        </div>
    </div>
</body>

</html>