<?php

class Cambiar_foto extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {
		session_start();
        $this->view->id_usuario = $_SESSION['id_usuario'];
        $this->view->nombre = $_SESSION['nombre'];
        $this->view->tipo = $_SESSION['tipo'];
        $this->view->foto = $_SESSION['foto'];
		
		$this->view->render('cambiar_foto/index');
    }
}