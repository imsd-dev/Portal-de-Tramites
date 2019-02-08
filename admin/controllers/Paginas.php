<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Paginas
 *
 * @author Ruth Escobar A.
 */
class Paginas extends Controller {

    function __construct() {
        parent::__construct();
    }

    function ver($titulo = null) {
        
        if ($titulo != null) {
            $this->view->render($this, $titulo);
        } else {
            $this->view->render($this, '404');
        }
    }

}
