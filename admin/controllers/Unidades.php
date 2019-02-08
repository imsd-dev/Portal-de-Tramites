<?php

require './models/DireccionesModel.php';
require './models/SucursalesModel.php';
/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Unidades
 *
 * @author Ruth Escobar A.
 */
class Unidades extends Controller {

    function __construct() {
        parent::__construct();
        $this->dm = new DireccionesModel();
        $this->view->unidadesMenu = "nav-expanded nav-active";
    }

    function error($error) {

        $msg = null;

        switch (true) {
            case strpos($error, 'UQ_Direcciones_nombreDireccion'):
                $msg = "El nombre de la dirección ya existe. ";
                break;
            default:
                $msg = $error;
                break;
        }

        return $msg;
    }

    function crear() {

        if ($_POST) {

            $nombreUnidad = filter_input(INPUT_POST, 'nombre');
            $direccionID = filter_input(INPUT_POST, 'direccion');
            $encargadoUnidad = filter_input(INPUT_POST, 'encargado');
            $emailEncargadoUnidad = filter_input(INPUT_POST, 'email');
            $telefonoContactoUnidad = filter_input(INPUT_POST, 'telefono');
            $descripcionUnidad = filter_input(INPUT_POST, 'descripcion');

            $sucursales = filter_input_array(INPUT_POST, array('sucursales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            $array = array($nombreUnidad, $direccionID);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $unidad['nombreUnidad'] = $nombreUnidad;
                $unidad['nombreUrlUnidad'] = $this->seo_url($nombreUnidad);
                $unidad['direccionID'] = $direccionID;
                $unidad['descripcionUnidad'] = $descripcionUnidad;
                $unidad['encargadoUnidad'] = $encargadoUnidad;
                $unidad['emailEncargadoUnidad'] = $emailEncargadoUnidad;
                $unidad['telefonoContactoUnidad'] = $telefonoContactoUnidad;
                $unidad['fechaCreacionUnidad'] = date("Y-m-d H:i:s");
                $unidad['estadoUnidad'] = 1;

                $unidadID = $this->model->crear($unidad);
                if ($unidadID > 0) {
                    $this->view->msg = "Unidad creada con éxito.";

                    $sucursales = $sucursales['sucursales'];
                    $this->eliminaSucursalesPorUnidad($unidadID);

                    if (!empty($sucursales)) {
                        foreach ($sucursales as $value) {
                            $sucursal['unidadID'] = $unidadID;
                            $sucursal['sucursalID'] = $value;
                            $rs = $this->model->crearSucursal($sucursal);
                        }
                    }
                } else {
                    $this->view->err = $this->error($unidadID);
                }
            }
        }

        $sm = new SucursalesModel();
        $this->view->sucursales = $sm->listar();
        $this->view->direcciones = $this->dm->listar();
        $this->view->render($this, 'crear');
    }

    function editar($unidadID = null) {

        if ($_POST) {

            $estado = '0';

            $unidadID = filter_input(INPUT_POST, 'id_unidad');
            $nombreUnidad = filter_input(INPUT_POST, 'nombre');
            $direccionID = filter_input(INPUT_POST, 'direccion');
            $encargadoUnidad = filter_input(INPUT_POST, 'encargado');
            $emailEncargadoUnidad = filter_input(INPUT_POST, 'email');
            $telefonoContactoUnidad = filter_input(INPUT_POST, 'telefono');
            $descripcionUnidad = filter_input(INPUT_POST, 'descripcion');
            $estado_uni = filter_input(INPUT_POST, 'estado');

            if ($estado_uni) {
                $estado = '1';
            }
            
            $sucursales = filter_input_array(INPUT_POST, array('sucursales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            $array = array($nombreUnidad, $direccionID, $unidadID);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $unidad['unidadID'] = $unidadID;
                $unidad['nombreUnidad'] = $nombreUnidad;
                $unidad['nombreUrlUnidad'] = $this->seo_url($nombreUnidad);
                $unidad['direccionID'] = $direccionID;
                $unidad['descripcionUnidad'] = $descripcionUnidad;
                $unidad['encargadoUnidad'] = $encargadoUnidad;
                $unidad['emailEncargadoUnidad'] = $emailEncargadoUnidad;
                $unidad['telefonoContactoUnidad'] = $telefonoContactoUnidad;
                $unidad['estadoUnidad'] = $estado;

                $response = $this->model->editar($unidad);
                if ($response == "ok") {
                    $this->view->msg = "Unidad actualizada con éxito.";
                    
                    $sucursales = $sucursales['sucursales'];
                    $this->eliminaSucursalesPorUnidad($unidadID);

                    if (!empty($sucursales)) {
                        foreach ($sucursales as $value) {
                            $sucursal['unidadID'] = $unidadID;
                            $sucursal['sucursalID'] = $value;
                            $rs = $this->model->crearSucursal($sucursal);
                        }
                    }
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->trae($unidadID);
        $this->view->render($this, 'editar');
    }

    function trae($unidadID = null) {

        if ($unidadID == null) {
            $this->view->render_404();
        } else {
            $unidad = $this->model->trae($unidadID);
            if (empty($unidad)) {
                $this->view->warn = "Unidad consultada no existe. Favor verificar.";
            } else {
                $sm = new SucursalesModel();
                $this->view->direcciones = $this->dm->listar();
                $this->view->unidad = $unidad;
                $this->view->sucursalesUnidades = $this->model->listarSucursalesPorUnidad($unidadID);
                $this->view->sucursales = $sm->listar();
            }
        }
    }

    function listar() {

        $unidades = $this->model->listar();

        if (empty($unidades)) {
            $this->vier->warn = "No existe Unidades disponibles.";
        } else {
            $this->view->direcciones = $this->dm->listar();
            $this->view->unidades = $unidades;
        }

        $this->view->render($this, 'listar');
    }

    function buscar() {

        if ($_POST) {

            $direccionID = filter_input(INPUT_POST, 'id_direccion');

            if ($direccionID != null) {
                $this->view->direcciones = $this->dm->listar();
                $this->view->unidades = $this->model->listarPorDireccion($direccionID);
            } else {
                $this->view->warn = "Favor verificar campos requeridos.";
            }
        } else {
            $this->view->warn = "Favor ingresar criterios de búsqueda.";
        }

        $this->view->render($this, 'listar');
    }

    function listarPorDireccion() {

        if ($_POST) {
            $direccionID = filter_input(INPUT_POST, 'id_direccion');
            $unidades = $this->model->listarPorDireccion($direccionID);

            if (empty($unidades)) {
                echo "<option value=''>No existen Unidades asociadas...</option>";
            } else {
                echo "<option value=''>Seleccionar Unidad...</option>";

                for ($i = 0; $i < count($unidades); $i++) {
                    $unidad = (object) $unidades[$i];
                    echo "<option value='" . $unidad->unidadID . "'>" . $unidad->nombreUnidad . "</option>";
                }
            }
        }
    }

    function eliminaSucursalesPorUnidad($unidadID) {
        $this->model->eliminaSucursalesPorUnidad($unidadID);
    }
    
    
}
