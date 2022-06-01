<?php

class Cambiar_foto extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {
		$this->view->render('cambiar_foto/index');
    }
}