<?php

class Admin extends Controller {

	function __construct() {
		parent::__construct();
	}	
	
	function render() {
		$this->view->render('inicio_admin/index');
    }
}