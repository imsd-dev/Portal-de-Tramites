<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Sucursales
 *
 * @author Ruth Escobar A.
 */
class Sucursales extends Controller {

    function __construct() {
		parent::__construct();
		$this->view->title = 'sucursales';
    }

    function index() {
        $this->view->render_404();
    }
    
    function listar() {
        $this->view->sucursales = $this->model->verSucursales();
        $this->view->render($this, 'listar');
    }

}
