<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Escritorio
 *
 * @author Ruth Escobar A.
 */
class Escritorio extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this, 'home');
    }
}
