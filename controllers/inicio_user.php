<?php

class Inicio_user extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {
		$this->view->render('inicio_user/index');
    }
}