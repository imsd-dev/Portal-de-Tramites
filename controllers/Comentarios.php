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
    }
    
    function index() {
        $this->view->render_404();
    }

    function crear() {

        if ($_POST) {

            $tramiteID = filter_input(INPUT_POST, 'id_tramite');
            $titulo = filter_input(INPUT_POST, 'titulo');
            $comentarioAdicionalComentario = filter_input(INPUT_POST, 'comentario');
            $usuarioID = Session::getValue('U_ID');

            $array = array($titulo, $usuarioID, $tramiteID);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos";
            } else {

                $itemsComentario = filter_input_array(INPUT_POST, array('items' =>
                    array('flags' => FILTER_REQUIRE_ARRAY)
                        )
                );

                $comentario['tramiteID'] = $tramiteID;
                $comentario['usuarioID'] = $usuarioID;
                $comentario['itemsComentario'] = serialize($itemsComentario);
                $comentario['comentarioAdicionalComentario'] = $comentarioAdicionalComentario;
                $comentario['fechaCreacionComentario'] = date("Y-m-d H:i:s");
                $comentario['leidoNoLeido'] = '0';

                $response = $this->model->crea($comentario);

                if ($response == 'ok') {
                    $this->view->msg = "Comentario enviado con éxito. Gracias por participar.";
                } else {
                    $this->view->err = $response . ': Ha ocurrido un problema con el registro del comentario.';
                }
            }
        }

        if ($titulo != null) {
            $tm = new TramitesModel();
            $this->view->tramite = $tm->traePorNombre($titulo);
            $this->view->render_global('Tramites', 'ver');
        } else {
            header('location: ' . URL . 'Paginas/ver/404');
        }
    }

}
