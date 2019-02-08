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
        $this->view->categoriasMenu = "nav-expanded nav-active";
    }
    
    function error($error) {

        $msg = null;

        switch (true) {
            case strpos($error, 'UQ_Categorias_nombreCategoria'):
                $msg = "El nombre de la categoría ya existe. ";
                break;
            default:
                $msg = $error;
                break;
        }

        return $msg;
    }

    function crear() {

        if ($_POST) {

            $nombreCategoria = filter_input(INPUT_POST, 'nombre');
            $descripcionCategoria = filter_input(INPUT_POST, 'descripcion');
            $iconoPortadaCategoria = filter_input(INPUT_POST, 'icono_port');
            $iconoInteriorCategoria = filter_input(INPUT_POST, 'icono_int');

            $array = array($nombreCategoria, $iconoPortadaCategoria, $iconoInteriorCategoria);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $categoria['nombreCategoria'] = $nombreCategoria;
                $categoria['descripcionCategoria'] = $descripcionCategoria;
                $categoria['iconoPortadaCategoria'] = $iconoPortadaCategoria;
                $categoria['iconoInteriorCategoria'] = $iconoInteriorCategoria;
                $categoria['ordenCategoria'] = 100;
                $categoria['fechaCreacionCategoria'] = date("Y-m-d H:i:s");
                $categoria['estadoCategoria'] = 1;

                $response = $this->model->crear($categoria);
                if ($response == "ok") {
                    $this->view->msg = "Categoría creada con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->view->render($this, 'crear');
    }

    function editar($categoriaID = null) {

        if ($_POST) {
            $estado = 0;
            
            $categoriaID = filter_input(INPUT_POST, 'id_categoria');
            $nombreCategoria = filter_input(INPUT_POST, 'nombre');
            $descripcionCategoria = filter_input(INPUT_POST, 'descripcion');
            $iconoPortadaCategoria = filter_input(INPUT_POST, 'icono_port');
            $iconoInteriorCategoria = filter_input(INPUT_POST, 'icono_int');
            $ordenCategoria = filter_input(INPUT_POST, 'orden');
            $estado_cat = filter_input(INPUT_POST, 'estado');
            
            if($estado_cat){
                $estado = 1;
            }

            $array = array($categoriaID, $nombreCategoria, $iconoPortadaCategoria,
                $iconoInteriorCategoria, $ordenCategoria);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $categoria['categoriaID'] = $categoriaID;
                $categoria['nombreCategoria'] = $nombreCategoria;
                $categoria['descripcionCategoria'] = $descripcionCategoria;
                $categoria['iconoPortadaCategoria'] = $iconoPortadaCategoria;
                $categoria['iconoInteriorCategoria'] = $iconoInteriorCategoria;
                $categoria['ordenCategoria'] = $ordenCategoria;
                $categoria['estadoCategoria'] = $estado;

                $response = $this->model->editar($categoria);
                if ($response == "ok") {
                    $this->view->msg = "Categoría actualizada con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->ver($categoriaID);
    }

    function ver($categoriaID = null) {

        if ($categoriaID == null) {
            $this->view->render_404();
        } else {
            $categoria = $this->model->trae($categoriaID);

            if (empty($categoria)) {
                $this->view->warn = "Categoría consultada no existe. Favor verificar.";
            } else {
                $this->view->categoria = $categoria;
            }

            $this->view->render($this, 'editar');
        }
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
