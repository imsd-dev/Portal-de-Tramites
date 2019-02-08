<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Direcciones
 *
 * @author Ruth Escobar A.
 */
class Direcciones extends Controller {

    function __construct() {
        parent::__construct();
		$this->view->title = 'direcciones'; 
    }
    
    function index() {
		$this->view->render_404();
    }

    function ver($nombreDireccion = null) {

        if ($nombreDireccion == null) {
            header('location: ' . URL . 'Paginas/ver/404');
        } else {

            $direccion = $this->model->trae($nombreDireccion);

            if (empty($direccion)) {
                $this->vier->warn = "No existe Dirección. Favor seleccione otra";
            } else {
                $this->view->direccion = $direccion;
                $this->view->sucursales = $this->model->traeSucursalesPorDireccion($direccion->direccionID);
                $this->view->unidades = $this->model->traeUnidadesPorDireccion($direccion->direccionID);
            }
        }

        $this->view->render($this, 'ver');
    }

    function listar() {

        $direcciones = $this->model->listar();

        if (empty($direcciones)) {
            $this->vier->warn = "No existe Direcciones disponibles.";
        } else {
            $this->view->direcciones = $direcciones;
        }

        $this->view->render($this, 'listar');
    }

}
