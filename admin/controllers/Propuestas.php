<?php

require './models/TramitesModel.php';
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Propuestas
 *
 * @author Ruth Escobar A.
 */
class Propuestas extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->propMenu = "nav-expanded nav-active";
    }

    function index() {
        $this->view->propuestas = $this->model->listar();
        $this->view->render($this, 'listar');
    }

    function listar() {

        $this->view->propuestas = $this->model->listar();
        $this->view->render($this, 'listar');
    }

    function ver($propuestaID = null) {

        if ($propuestaID == null) {
            $this->view->render_404();
        } else {

            $propuesta = $this->model->trae($propuestaID);

            if (empty($propuesta)) {
                $this->view->err = "Comentario seleccionado no existe. Favor verificar";
            } else {
                $this->view->propuesta = $propuesta;
            }

            $this->view->render($this, 'ver');
        }
    }

    function leer() {

        if ($_POST) {

            $propuestaID = filter_input(INPUT_POST, 'propuesta_id');

            if ($propuestaID == null) {
                $this->view->warn = "Favor seleccionar una propuesta";
                $this->listar();
            } else {

                $propuesta['propuestaID'] = $propuestaID;
                $propuesta['leidoNoLeido'] = '1';

                $response = $this->model->editar($propuesta);

                if ($response == "ok") {
                    $this->view->msg = "propuesta marcada como leido.";
                } else {
                    $this->view->warn = "Problemas al actualizar la propuesta.";
                }
            }
        }

        $this->listar();
    }

    function responder() {
        
        if ($_POST) {

            $propuestaID = filter_input(INPUT_POST, 'propuesta_id');
            $correoMensaje = filter_input(INPUT_POST, 'email');
            $cuerpoMensaje = filter_input(INPUT_POST, 'mensaje');

            $array = array($propuestaID, $correoMensaje, $cuerpoMensaje);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos";
                $this->listar();
            } else {

                $mensaje['id'] = $propuestaID;
                $mensaje['tipoMensaje'] = 'propuesta';
                $mensaje['correoMensaje'] = $correoMensaje;
                $mensaje['cuerpoMensaje'] = $cuerpoMensaje;
                $mensaje['fechaMensaje'] = date("Y-m-d H:i:s");
                $mensaje['usuarioCreador'] = Session::getValue('U_USERNAME');

                if ($this->enviaMail($mensaje)) {
                    $this->model->creaMensaje($mensaje);
                    $this->view->msg = "Mensaje enviado con éxito.";
                } else {
                    $this->view->warn = "Problemas al enviar el mensaje";
                }

                $this->ver($mensaje['id']);
            }
        } else {
            $this->listar();
        }
    }

    function enviaMail($mensaje) {

        /** ENVIA EMAIL * */
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: Municipalidad de Santo Domingo <no-reply@santodomingo.cl>' . "\r\n";

        if (mail($mensaje['correoMensaje'], 'Municipalidad de Santo Domingo', $mensaje['cuerpoMensaje'], $headers)) {
            return true;
        } else {
            return false;
        }
    }

}
