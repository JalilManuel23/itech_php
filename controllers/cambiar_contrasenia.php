<?php

class Cambiar_contrasenia extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {
		session_start();

		$this->view->id = $_SESSION['id_usuario'];
		$this->view->render('pass/index');
    }
}