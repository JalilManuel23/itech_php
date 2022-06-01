<?php

class Admin extends Controller {

	function __construct(){
        parent::__construct();
        $this->view->vendedores = [];
        
    }

    function render(){
		session_start();

        $vendedores = $this->model->get();
        $this->view->vendedores = $vendedores;
        $this->view->id_usuario = $_SESSION['id_usuario'];
        $this->view->nombre = $_SESSION['nombre'];
        $this->view->tipo = $_SESSION['tipo'];

        $this->view->render('inicio_admin/index');
    }
}