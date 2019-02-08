<?php

require './models/TramitesModel.php';
require './models/CategoriasModel.php';

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
    }

    function index() {
        $this->view->render_404();
    }

    function crear() {

        if ($_POST) {

            $comentario = mb_substr(filter_input(INPUT_POST, 'comentario'), 0, 300,'UTF-8');
            $usuarioID = Session::getValue('U_ID');
            $titulo = filter_input(INPUT_POST, 'titulo');

            $array = array($comentario);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos";
            } else {

                $propuesta['usuarioID'] = $usuarioID;
                $propuesta['comentarioPropuesta'] = $comentario;
                $propuesta['fechaComentarioPropuesta'] = date("Y-m-d H:i:s");
                $propuesta['leidoNoLeido'] = '0';

                $response = $this->model->crea($propuesta);

                if ($response == 'ok') {
                    $this->view->msg = "Propuesta enviada con éxito. Gracias por participar.";
                } else {
                    $this->view->err = $response . ': Ha ocurrido un problema con el registro del comentario.';
                }
            }

            if ($titulo != null) {
                $tm = new TramitesModel();
                $this->view->tramite = $tm->traePorNombre($titulo);
                $this->view->render_global('Tramites', 'ver');
            } else {

                $tm = new TramitesModel();
                $cm = new CategoriasModel();

                //Listar Trámites destacados, nuevos y frecuentes.
                $this->view->tramites_dest = $tm->listarDestacados(5);
                $this->view->tramites_nvos = $tm->listarNuevos();
                $this->view->tramites_frec = $tm->listarFrecuentes(5);

                //Listar Tramites por categoria
                $this->view->tramites_pagos = $tm->listarPorCategoria(1);
                $this->view->tramites_certificados = $tm->listarPorCategoria(3);
                $this->view->tramites_becas = $tm->listarPorCategoria(2);

                $this->view->categorias = $cm->trae();
                $this->view->render_global('Index', 'index');
            }
        }else{
            header('location: ' . URL);
        }
    }

}
