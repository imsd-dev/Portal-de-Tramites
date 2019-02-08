<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Glosario
 *
 * @author Ruth Escobar A.
 */
class Glosario  extends Controller {

    function __construct() {
        parent::__construct();
		$this->view->title = 'glosario';
    }
    
    function index(){
        $this->ver();
    }
            
    function ver(){
        $this->view->glosarios = $this->model->ver();
        $this->view->render($this, 'ver');
    }
}
