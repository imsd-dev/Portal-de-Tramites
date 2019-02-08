<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Telefonos
 *
 * @author Ruth Escobar A.
 */
class Telefonos extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->TelefonosMenu = "nav-expanded nav-active";
    }

    function crear() {

        if ($_POST) {

            $nombreTelefono = filter_input(INPUT_POST, 'nombre');
            $numeroTelefono = filter_input(INPUT_POST, 'phone1');
            $categoriaTelefono = filter_input(INPUT_POST, 'categoria');

            $array = array($nombreTelefono, $numeroTelefono, $categoriaTelefono);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $telefono['nombreTelefono'] = $nombreTelefono;
                $telefono['numeroTelefono'] = $numeroTelefono;
                $telefono['categoriaTelefono'] = $categoriaTelefono;

                $response = $this->model->crear($telefono);
                if ($response == "ok") {
                    $this->view->msg = "Teléfono creado con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->view->telefonos = $this->model->listar();
        $this->view->render($this, 'crear');
    }

    function eliminar() {

        if ($_POST) {

            $telefonoID = filter_input(INPUT_POST, 'id_telefono');

            if ($telefonoID == null) {
                $this->view->warn = "Se debe seleccionar un teléfono de la lista para eliminar.";
            } else {
                
                $response = $this->model->eliminar($telefonoID);
                if($response == "ok"){
                    $this->view->msg = "Teléfono eliminado con éxito.";
                }else{
                    $this->view->err = $response;
                }
            }
        }
        
        $this->view->telefonos = $this->model->listar();
        $this->view->render($this, 'crear');
    }

}
