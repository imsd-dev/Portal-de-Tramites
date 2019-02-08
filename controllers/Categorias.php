<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Categorias
 *
 * @author Ruth Escobar A.
 */
class Categorias extends Controller {

    function __construct() {
        parent::__construct();
		$this->view->title = 'categorias';
    }
    
    function index() {
        $this->view->render_404();
    }
    
    function listar() {

        $categorias = $this->model->listar();

        if (empty($categorias)) {
            $this->vier->warn = "No existe Categorias disponibles.";
        } else {
            $this->view->categorias = $categorias;
        }

        $this->view->render($this, 'listar');
    }
}
