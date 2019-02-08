<?php

require './models/TramitesModel.php';
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Comentarios
 *
 * @author Ruth Escobar A.
 */
class Comentarios extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->comentMenu = "nav-expanded nav-active";
    }

    function index() {
        $this->view->comentarios = $this->model->listar();
        $this->view->render($this, 'listar');
    }

    function listar() {

        $this->view->comentarios = $this->model->listar();
        $this->view->render($this, 'listar');
    }

    function ver($comentarioID = null) {

        if ($comentarioID == null) {
            $this->view->render_404();
        } else {

            $comentario = $this->model->trae($comentarioID);

            if (empty($comentario)) {
                $this->view->err = "Comentario seleccionado no existe. Favor verificar";
            } else {
                $this->view->comentario = $comentario;
            }

            $this->view->render($this, 'ver');
        }
    }

    function leer() {

        if ($_POST) {

            $comentarioID = filter_input(INPUT_POST, 'comentario_id');

            if ($comentarioID == null) {
                $this->view->warn = "Favor seleccionar un comentario";
                $this->listar();
            } else {

                $comentario['comentarioID'] = $comentarioID;
                $comentario['leidoNoLeido'] = '1';

                $response = $this->model->editar($comentario);

                if ($response == "ok") {
                    $this->view->msg = "Comentario marcado como leido.";
                } else {
                    $this->view->warn = "Problemas al actualizar el comentario";
                }
            }
        }

        $this->listar();
    }

    function responder() {

        if ($_POST) {

            $comentarioID = filter_input(INPUT_POST, 'comentario_id');
            $correoMensaje = filter_input(INPUT_POST, 'email');
            $cuerpoMensaje = filter_input(INPUT_POST, 'mensaje');

            $array = array($comentarioID, $correoMensaje, $cuerpoMensaje);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos";
                $this->listar();
            } else {

                $mensaje['id'] = $comentarioID;
                $mensaje['tipoMensaje'] = 'comentario';
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
        $headers .= 'From: Municipalidad de Peñalolén <no-reply@santodomingo.cl>' . "\r\n";

        if (mail($mensaje['correoMensaje'], 'Municipalidad de Santo Domingo', $mensaje['cuerpoMensaje'], $headers)) {
            return true;
        } else {
            return false;
        }
    }

}
