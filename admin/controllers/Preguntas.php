<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Preguntas
 *
 * @author Ruth Escobar A.
 */
class Preguntas extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->preguntasMenu = "nav-expanded nav-active";
    }

    function error($error) {

        $msg = null;
        switch (true) {
            case strpos($error, 'IDX_nombrePreguntaFrecuente'):
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

            $nombrePreguntaFrecuente = filter_input(INPUT_POST, 'nombre');
            $descripcionPreguntaFrecuente = filter_input(INPUT_POST, 'descripcion');

            $array = array($nombrePreguntaFrecuente, $descripcionPreguntaFrecuente);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $pregunta['urlPreguntaFrecuente'] = $this->seo_url($nombrePreguntaFrecuente);
                $pregunta['nombrePreguntaFrecuente'] = $nombrePreguntaFrecuente;
                $pregunta['descripcionPreguntaFrecuente'] = $descripcionPreguntaFrecuente;
                $pregunta['fechaCreacionPreguntaFrecuente'] = date("Y-m-d H:i:s");
                $pregunta['usuarioCreadorPreguntaFrecuente'] = 'RARENAS';

                $response = $this->model->crear($pregunta);
                if ($response == "ok") {
                    $this->view->msg = "Pregunta Frecuente creada con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->view->render($this, 'crear');
    }

    function editar($preguntaFrecuenteID = null) {

        if ($_POST) {

            $preguntaFrecuenteID = filter_input(INPUT_POST, 'id_pregunta');
            $nombrePreguntaFrecuente = filter_input(INPUT_POST, 'nombre');
            $descripcionPreguntaFrecuente = filter_input(INPUT_POST, 'descripcion');

            $array = array($preguntaFrecuenteID, $nombrePreguntaFrecuente, $descripcionPreguntaFrecuente);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $pregunta['preguntaFrecuenteID'] = $preguntaFrecuenteID;
                $pregunta['urlPreguntaFrecuente'] = $this->seo_url($nombrePreguntaFrecuente);
                $pregunta['nombrePreguntaFrecuente'] = $nombrePreguntaFrecuente;
                $pregunta['descripcionPreguntaFrecuente'] = $descripcionPreguntaFrecuente;

                $response = $this->model->editar($pregunta);
                if ($response == "ok") {
                    $this->view->msg = "Pregunta Frecuente actualizada con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        if ($preguntaFrecuenteID == null) {
            $this->view->render_404();
        } else {
            $pregunta = $this->model->trae($preguntaFrecuenteID);
            if (empty($pregunta)) {
                $this->view->warn = "Pregunta Frecuente consultada no existe. Favor verificar.";
            } else {
                $this->view->pregunta = $pregunta;
            }

            $this->view->render($this, 'editar');
        }
    }

    function listar() {

        $this->view->preguntas = $this->model->listar();
        $this->view->render($this, 'listar');
    }

}
