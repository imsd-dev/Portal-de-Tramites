<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Preguntas
 *
 * @author Ruth Escobar A.
 */
class Preguntas  extends Controller {

    function __construct() {
		parent::__construct();
		$this->view->title = 'preguntas';
    }
    
    function index(){
        $this->ver();
    }
            
    function ver(){
        $this->view->preguntas = $this->model->ver();
        $this->view->render($this, 'ver');
    }
}
