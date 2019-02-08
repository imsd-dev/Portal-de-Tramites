<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Telefonos
 *
 * @author Ruth Escobar A.
 */
class Telefonos extends Controller {

    function __construct() {
		parent::__construct();
		$this->view->title = 'telefonos';
    }
    
    function index() {
        $this->view->telefonos = $this->model->listar();
        $this->view->render($this, 'directorio-telefonico');
    }
}
