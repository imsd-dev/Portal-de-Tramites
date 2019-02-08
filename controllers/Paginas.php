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
		$this->view->title = 'paginas';
    }
    
    function index() {
        $this->view->render_404();
    }

    function ver($titulo = null) {

        if ($titulo != null) {
			if($titulo == "directorio-telefonico"){
				$this->view->tituloPagina = "Directorio Telefónico";
			}else{
				$this->view->tituloPagina = "Página no encontrada";
			}
			
            $this->view->render($this, $titulo);
        } else {
            $this->view->render($this, '404');
        }
    }

}
