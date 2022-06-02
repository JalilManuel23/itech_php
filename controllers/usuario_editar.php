<?php

class Usuario_editar extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {
		$this->view->render('editar_user/index');
    }

    function index($param = null) {
        $id = $param[0];

		$datos_user = $this->model->getById($id);

		$this->view->datos_user = $datos_user;

        $this->render();
    }
}