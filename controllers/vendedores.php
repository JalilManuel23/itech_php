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
		$fecha_ingreso = $_POST['fecha_ingreso'];
		$contrasenia = generarContrasenia(8);;

        if($this->model->insert([
            'nombre' => $nombre, 
            'apellido_paterno' => $apellido_paterno, 
            'apellido_materno' => $apellido_materno, 
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email,
            'fecha_ingreso' => $fecha_ingreso,
            'contrasenia' => $contrasenia,
            'curp' => $curp
        ])) {
            echo "Vendedor agregado exitosamente";
        } else {
            echo "Hubo un error, ¡Intente de nuevo!";
        }
	}

    // Función para editar vendedor
    function editar(){
		$id = $_POST['id'];
		$curp = $_POST['curp'];
		$nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
		$apellido_materno = $_POST['apellido_materno'];
		$fotografia = $_POST['fotografia'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$fecha_ingreso = $_POST['fecha_ingreso'];
		$fecha_administrador = $_POST['fecha_administrador'];
		$fecha_validacion = $_POST['fecha_validacion'];
		$contrasenia = $_POST['contrasenia'];

        if($this->model->update([
            'id' => $id, 
            'nombre' => $nombre, 
            'apellido_paterno' => $apellido_paterno, 
            'apellido_materno' => $apellido_materno, 
            'fotografia' => $fotografia,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email,
            'fecha_ingreso' => $fecha_ingreso,
            'fecha_administrador' => $fecha_administrador,
            'fecha_validacion' => $fecha_validacion,
            'contrasenia' => $contrasenia,
            'curp' => $curp
        ])){            
            echo "Vendedor actualizado exitosamente";
        }else{
            echo "Hubo un error, ¡Intente de nuevo!";
        }
    }

    // Función para eliminar vendedor
    function eliminar($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            echo "Vendedor eliminado exitosamente";
        }else{
            // mensaje de error
            echo "Hubo un error, ¡Intente de nuevo!";
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

        print_r($vendedor);
    }

    // Función para suspender usuarios
    function suspender($param = null) {
        $idVendedor = $param[0];
        $vendedor = $this->model->getByID($idVendedor);

        $tipo = $vendedor->tipo;

        if($tipo == 'usuario') {
            print_r('La suspención de usuarios solo se puede realizar por un administrador');
        } else {
            $valor = $param[1];
            if($this->model->suspender($idVendedor, $valor)) {
                echo "bien";
            } else {
                echo "error";
            }
        }
    }

    // Actulizar foto de usuario
    function cambiar_foto() {
        $id = $_POST['id'];

        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = 'public/fotos_usuarios/';
                $dest_path = $uploadFileDir . $newFileName;
                 
                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                    if($this->model->cambiarFoto($id, $newFileName)) {
                        echo "bien";
                    } else {
                        echo "error";
                    }
                    $message ='Foto actualizada exitosamente';
                }
                else
                {
                  $message = 'Hubo un error, ¡Intente de nuevo!';
                }
            }
        }
    }

    // Cambiar contraseña
    function cambiar_contrasenia() {
        $id = $_POST['id'];
        $contrasenia = $_POST['contrasenia'];

        if($this->model->cambiarContrasenia($id, $contrasenia)) {
            echo "bien";
        } else {
            echo "error";
        }
        $message ='Foto actualizada exitosamente';
    }

    // Convertir en administrador
    function convertir_admin() {
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];

        if($this->model->convertirAdmin($id, $tipo)) {
            echo "bien";
        } else {
            echo "error";
        }
        $message ='Foto actualizada exitosamente';
    }
}