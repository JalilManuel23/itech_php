<?php

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
		$fotografia = $_POST['fotografia'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$fecha_ingreso = $_POST['fecha_ingreso'];
		$fecha_administrador = $_POST['fecha_administrador'];
		$fecha_validacion = $_POST['fecha_validacion'];
		$contrasenia = $_POST['contrasenia'];

        if($this->model->insert([
            'nombre' => $nombre, 
            'fotografia' => $fotografia,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email,
            'fecha_ingreso' => $fecha_ingreso,
            'fecha_administrador' => $fecha_administrador,
            'fecha_validacion' => $fecha_validacion,
            'contrasenia' => $contrasenia,
            'curp' => $curp
        ])) {
            echo "Nuevo vendedor agregado";
        } else {
            echo "Error";
        }
	}

    // Función para editar vendedor
    function editar(){
		$id = $_POST['id'];
		$curp = $_POST['curp'];
		$nombre = $_POST['nombre'];
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
            echo "Vendedor actualizado";
        }else{
            echo "Error al actualizar vendedor";
        }
    }

    // Función para eliminar vendedor
    function eliminar($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            echo "Vendedor eliminado correctamente";
        }else{
            // mensaje de error
            echo "No se pudo eliminar el vendedor";
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

}