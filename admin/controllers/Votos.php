<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Votos
 *
 * @author Ruth Escobar A.
 */
class Votos extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->votosMenu = "nav-expanded nav-active";
    }

    function index() {
        $this->listar();
    }

    function listar() {

        if ($_POST) {

            $fch_ini = filter_input(INPUT_POST, 'fch_inicio');
            $fch_fin = filter_input(INPUT_POST, 'fch_fin');

            $fechas['ini'] = $this->dateFormat_mysql($fch_ini);
            $fechas['ter'] = $this->dateFormat_mysql($fch_fin);

            $this->view->utilidadSi = $this->model->traeVotosPorUtilidad('SI', $fechas);
            $this->view->utilidadNo = $this->model->traeVotosPorUtilidad('NO', $fechas);
            $this->view->enLinea = $this->model->traeVotosEnLinea($fechas);
        } else {
            $this->view->utilidadSi = $this->model->traeVotosPorUtilidad('SI');
            $this->view->utilidadNo = $this->model->traeVotosPorUtilidad('NO');
            $this->view->enLinea = $this->model->traeVotosEnLinea();
        }

        $this->view->render($this, 'listar');
    }

}
