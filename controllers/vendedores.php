<?php

include './helpers/generarContrasenia.php';

class Vendedores extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {
		// $this->view->render('main/index');
    }

    // Función para agregar nuevo vendedor a la base de datos
	function agregar() {
		$curp = $_POST['curp'];
		$nombre = $_POST['nombre'];
		$apellido_paterno = $_POST['apellido_paterno'];
		$apellido_materno = $_POST['apellido_materno'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$contrasenia = generarContrasenia(8);


        if($this->model->insert([
            'nombre' => $nombre, 
            'apellido_paterno' => $apellido_paterno, 
            'apellido_materno' => $apellido_materno, 
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email,
            'contrasenia' => $contrasenia,
            'curp' => $curp
        ])) {
            $vendedor = $this->model->getByEmail($email);

            session_start();
            $_SESSION['id_usuario'] = $vendedor->id;
            $_SESSION['nombre'] = $vendedor->nombre;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['foto'] = $vendedor->fotografia;
            $_SESSION['contrasenia_default'] = $vendedor->contrasenia_default;
            $_SESSION['contrasenia'] = $vendedor->contrasenia;

            ?>
                <script>
                    window.location.replace("<?php echo constant('URL');?>inicio_user");
                </script>
            <?php
        }
	}

    // Función para editar vendedor
    function editar(){
        $id = $_POST['id'];

		$curp = $_POST['curp'];
		$nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
		$apellido_materno = $_POST['apellido_materno'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];

        unset($_SESSION['id_usuario']);

        if($this->model->update([
            'id' => $id, 
            'nombre' => $nombre, 
            'apellido_paterno' => $apellido_paterno, 
            'apellido_materno' => $apellido_materno, 
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email,
            'curp' => $curp
        ])){            
            ?>
            <script>
                window.location.replace("<?php echo constant('URL');?>admin");
            </script>
        <?php
        }
    }

    // Función para eliminar vendedor
    function eliminar($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            ?>
            <script>
                window.location.replace("<?php echo constant('URL');?>admin");
            </script>
        <?php
        }
    }

    // Función para traer la lista de todos los vendedores
        // Retorna un arreglo con los datos
    function lista() {
        $vendedores = $this->model->get();
        print_r($vendedores);
    }   
    
    // Traer los datos de un solo vendedor según su ID
        // Recibe un parametro el cual es el ID del vendedor
    function ver($param = null) {
        $idVendedor = $param[0];
        $vendedor = $this->model->getById($idVendedor);

        session_start();
        $_SESSION['id_usuario'] = $vendedor->id;

        print_r($vendedor);
    }

    // Función para suspender usuarios
    function suspender($param = null) {
        $idVendedor = $param[0];
        $vendedor = $this->model->getByID($idVendedor);

        session_start();

        if($_SESSION['tipo'] == 'usuario') {
            print_r('La suspención de usuarios solo se puede realizar por un administrador');
        } else {
            $valor = $param[1];
            if($this->model->suspender($idVendedor, $valor)) {
                ?>
                    <script>
                        window.location.replace("<?php echo constant('URL');?>admin");
                    </script>
                <?php
            } 
        }
    }

    // Actulizar foto de usuario
    function cambiar_foto() {
        $id = $_POST['id'];

        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            echo "d";
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'jpeg');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = 'public/fotos_usuarios/';
                $dest_path = $uploadFileDir . $newFileName;
                 
                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                    if($this->model->cambiarFoto($id, $newFileName)) {
                        session_start();
                        $_SESSION['foto'] = $newFileName;
                    ?>
                        <script>
                            window.location.replace("<?php echo constant('URL');?>cambiar_foto");
                        </script>
                    <?php
                    } 
                }
                else
                {
                  echo 'Hubo un error, ¡Intente de nuevo!';
                }
            }
        }
    }

    // Cambiar contraseña
    function cambiar_contrasenia() {
        $id = $_POST['id'];
        $contrasenia = $_POST['contrasenia'];
        $contrasenia2 = $_POST['contrasenia2'];

        if($contrasenia == $contrasenia2) {
            if($this->model->cambiarContrasenia($id, $contrasenia)) {
                ?>
                <script>
                    window.location.replace("<?php echo constant('URL');?>vendedores/cerrar_sesion");
                </script>
                <?php
            } 
        } else {
            ?>
            <script>
                window.location.replace("<?php echo constant('URL');?>cambiar_contrasenia/fail");
            </script>
            <?php
        }
    }

    // Convertir en administrador
    function convertir_admin($param = null) {
        $id = $param[0];

        if($this->model->convertirAdmin($id, 'admin')) {
            ?>
            <script>
                window.location.replace("<?php echo constant('URL');?>admin");
            </script>
            <?php
        } 
    }

    // Login de usuario
    function iniciar_sesion() {
        $usuario = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];

        if($this->model->iniciarSesion($usuario, $contrasenia)) {
            $vendedor = $this->model->getByEmail($usuario);

            if($vendedor->estatus == 0) {
            ?>
                <script>
                    window.location.replace("<?php echo constant('URL');?>");
                </script>
            <?php
            }

            $tipo = $vendedor->tipo;

            session_start();
            $_SESSION['id_usuario'] = $vendedor->id;
            $_SESSION['nombre'] = $vendedor->nombre;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['foto'] = $vendedor->fotografia;
            $_SESSION['contrasenia_default'] = $vendedor->contrasenia_default;
            $_SESSION['contrasenia'] = $vendedor->contrasenia;

            if($tipo == 'usuario') {
            ?>
                <script>
                    window.location.replace("<?php echo constant('URL');?>inicio_user");
                </script>
            <?php
            } elseif($tipo == 'admin') {
            ?>
                <script>
                    window.location.replace("<?php echo constant('URL');?>admin");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                window.location.replace("<?php echo constant('URL');?>login");
            </script>
        <?php
        }
    }

    // Función para cerrar sesión
    function cerrar_sesion() {
        session_destroy();
        ?>
        <script>
            window.location.replace("<?php echo constant('URL');?>");
        </script>
        <?php
    }
}
?>