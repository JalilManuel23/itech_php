<?php

class Inicio_user extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {

		session_start();
        $this->view->id_usuario = $_SESSION['id_usuario'];
        $this->view->nombre = $_SESSION['nombre'];
        $this->view->tipo = $_SESSION['tipo'];
        $this->view->foto = $_SESSION['foto'];
        $this->view->contrasenia_default = $_SESSION['contrasenia_default'];
        $this->view->contrasenia = $_SESSION['contrasenia'];

		$datos_user = $this->model->getById($_SESSION['id_usuario']);

		$this->view->datos_user = $datos_user;

		$this->view->render('inicio_user/index');
    }
}