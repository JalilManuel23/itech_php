<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos-->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/inicio_user.css">

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

    <title>Administración Usuario</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg">
        <a class="navbar-brand" href="#"><img src="<?php echo constant('URL'); ?>/public/assets/logoitech.png" alt="Logotipo Itech" height="50"> ITECH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon icono-menu"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
        <ul class="navbar-nav">
                <li class="nav-item mx-1">
                    <a class="nav-link" href="<?php echo constant('URL');?>inicio_user" role="button">Ver Perfil</a>
                </li>
                <li class="nav-item dropdown mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" role="button">
                        Configuración
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo constant('URL');?>cambiar_foto/">Cambiar imagen de perfil</a>
                        <a class="dropdown-item" href="<?php echo constant('URL');?>cambiar_contrasenia">Cambiar contraseña</a>
                    </div>
                </li>
                <li class="nav-item mx-2">
                    <a type="button" class="btn btn-logout"  href="<?php echo constant('URL');?>vendedores/cerrar_sesion">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="admin-usuario m-5">
        <h1 class="text-center bienvenido pb-3">¡Bienvenido de nuevo, <?php echo $this->nombre; ?>! </h1>
        <h3 class="text-center intro-bienvenida">A continuación te mostramos la información guardada en tu perfil</h3>
        <?php
            if($this->contrasenia_default) {
        ?>
                <div class="alert alert-warning" role="alert">
                    ¡Urgente!, tu contraseña es: <?php echo $this->contrasenia; ?>, es necesario cambiar contraseña. <a href="<?php echo constant('URL');?>cambiar_contrasenia">Cambiar</a>
                </div>
        <?php
            }
        ?>
        <div class="d-flex justify-content-center mx-3 my-4">
            <form class="info-user my-3 form-info-user p-5">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="">Imagen de Perfil: </label>
                    </div>
                    <div class="col-12 mb-3 d-flex justify-content-center">
                        <img src="<?php echo constant('URL'); ?>/public/fotos_usuarios/<?php echo $this->foto; ?>" alt="Foto de Perfil de Usuario" class="default-img"
                            width="150">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 mb-2">
                        <label for="">Nombre:</label>
                        <input type="text" class="form-control" id="" placeholder="Nombre" disabled value="<?php echo $this->datos_user->nombre; ?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="">Apellidos:</label>
                        <input type="text" class="form-control" id="" placeholder="Apellidos" disabled value="<?php echo $this->datos_user->apellido_paterno . " " . $this->datos_user->apellido_materno; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 mb-2">
                        <label for="">Correo Electrónico:</label>
                        <input type="text" class="form-control" id="" placeholder="Correo" disabled value="<?php echo $this->datos_user->email; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 mb-2">
                        <label for="">CURP:</label>
                        <input type="text" class="form-control" id="" placeholder="CURP" disabled value="<?php echo $this->datos_user->curp; ?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="">Teléfono:</label>
                        <input type="text" class="form-control" id="" placeholder="Teléfono" disabled value="<?php echo $this->datos_user->telefono; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 mb-2">
                        <label for="">Dirección:</label>
                        <input type="text" class="form-control" id="" placeholder="Dirección" disabled value="<?php echo $this->datos_user->direccion; ?>">
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>

</html>