<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos-->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/inicio_admin.css">

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

    <title>Administración | ITECH</title>
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
                    <button type="button" class="btn btn-logout">Cerrar Sesión</button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="admin-usuario m-5">
        <h1 class="text-center bienvenido pb-3">¡Bienvenido <?php echo $this->nombre; ?>!</h1>
        <h3 class="text-center intro-bienvenida">A continuación se muestra el listado de los vendedores registrados en
            el
            sistema</h3>
        <div class=" div-lista-vendedores .table-responsive m-5 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre (s)</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        include_once 'models/vendedor.php';
                        foreach($this->vendedores as $row){
                            $vendedor = new Vendedor();
                            $vendedor = $row; 
                    ?>
                    <tr id="fila-<?php echo $vendedor->matricula; ?>">
                        <td><?php echo $vendedor->id; ?></td>
                        <td><?php echo $vendedor->nombre; ?></td>
                        <td><?php echo $vendedor->apellido_paterno ." ".$vendedor->apellido_materno; ?></td>
                        <td><?php echo $vendedor->email; ?></td>
                        <td>
                            <div class="botones">
                                <a href="<?php echo constant('URL');?>usuario_editar/index/<?php echo $vendedor->id;?>" type="button" class="btn btn-modificar">Modificar</button>
                                <?php
                                if($vendedor->estatus == 1) {
                                ?>
                                    <a href="<?php echo constant('URL');?>vendedores/suspender/<?php echo $vendedor->id; ?>/0" type="button" class="btn btn-suspender">Suspender</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo constant('URL');?>vendedores/suspender/<?php echo $vendedor->id; ?>/1" type="button" class="btn btn-suspender">Activar</a>
                                <?php
                                }
                                ?>
                                <a href="<?php echo constant('URL');?>vendedores/eliminar/<?php echo $vendedor->id; ?>" type="button" class="btn btn-eliminar">Eliminar</a>
                            </div>
                        </td>
                    </tr>

                    <?php } ?>                  
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>