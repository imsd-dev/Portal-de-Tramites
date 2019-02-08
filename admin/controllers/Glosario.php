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
class Glosario extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->glosarioMenu = "nav-expanded nav-active";
    }

    function error($error) {

        $msg = null;
        switch (true) {
            case strpos($error, 'IDX_nombreGlosario'):
                $msg = "El Título ingresado ya existe. ";
                break;
            default:
                $msg = $error;
                break;
        }

        return $msg;
    }

    function crear() {

        if ($_POST) {

            $nombreGlosario = filter_input(INPUT_POST, 'nombre');
            $descripcionGlosario = filter_input(INPUT_POST, 'descripcion');

            $array = array($nombreGlosario, $descripcionGlosario);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $glosario['urlGlosario'] = $this->seo_url($nombreGlosario);
                $glosario['nombreGlosario'] = $nombreGlosario;
                $glosario['descripcionGlosario'] = $descripcionGlosario;
                $glosario['fechaCreacionGlosario'] = date("Y-m-d H:i:s");
                $glosario['usuarioCreadorGlosario'] = 'RARENAS';

                $response = $this->model->crear($glosario);
                if ($response == "ok") {
                    $this->view->msg = "Glosario creado con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->view->render($this, 'crear');
    }

    function editar($glosarioID = null) {

        if ($_POST) {

            $glosarioID = filter_input(INPUT_POST, 'id_glosario');
            $nombreGlosario = filter_input(INPUT_POST, 'nombre');
            $descripcionGlosario = filter_input(INPUT_POST, 'descripcion');

            $array = array($glosarioID, $nombreGlosario, $descripcionGlosario);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $glosario['glosarioID'] = $glosarioID;
                $glosario['urlGlosario'] = $this->seo_url($nombreGlosario);
                $glosario['nombreGlosario'] = $nombreGlosario;
                $glosario['descripcionGlosario'] = $descripcionGlosario;

                $response = $this->model->editar($glosario);
                if ($response == "ok") {
                    $this->view->msg = "Glosario actualizado con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        if ($glosarioID == null) {
            $this->view->render_404();
        } else {
            $glosario = $this->model->trae($glosarioID);
            if (empty($glosario)) {
                $this->view->warn = "Glosario consultado no existe. Favor verificar.";
            } else {
                $this->view->glosario = $glosario;
            }

            $this->view->render($this, 'editar');
        }
    }

    function listar() {

        $glosarios = $this->model->listar();
        $this->view->glosarios = $glosarios;

        $this->view->render($this, 'listar');
    }
}
