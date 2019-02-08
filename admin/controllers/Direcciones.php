<?php

require './models/SucursalesModel.php';

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Direcciones
 *
 * @author Ruth Escobar A.
 */
class Direcciones extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->direccionesMenu = "nav-expanded nav-active";
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

            $nombreDireccion = filter_input(INPUT_POST, 'nombre');
            $descripcionDireccion = filter_input(INPUT_POST, 'descripcion');
            $encargadoDireccion = filter_input(INPUT_POST, 'encargado');
            $emailEncargadoDireccion = filter_input(INPUT_POST, 'email');
            $telefonoContactoDireccion = filter_input(INPUT_POST, 'telefono');
            $imagenDireccion = filter_input(INPUT_POST, 'imagen');

            $sucursales = filter_input_array(INPUT_POST, array('sucursales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            $array = array($nombreDireccion, $descripcionDireccion, $encargadoDireccion,
                $emailEncargadoDireccion, $telefonoContactoDireccion);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $direccion['nombreDireccion'] = $nombreDireccion;
                $direccion['nombreUrlDireccion'] = $this->seo_url($nombreDireccion);
                $direccion['descripcionDireccion'] = $descripcionDireccion;
                $direccion['encargadoDireccion'] = $encargadoDireccion;
                $direccion['emailEncargadoDireccion'] = $emailEncargadoDireccion;
                $direccion['telefonoContactoDireccion'] = $telefonoContactoDireccion;
                $direccion['imagenDireccion'] = $imagenDireccion;
                $direccion['fechaCreacionDireccion'] = date("Y-m-d H:i:s");
                $direccion['estadoDireccion'] = 1;

                $direccionID = $this->model->crear($direccion);
                if ($direccionID > 0) {
                    $this->view->msg = "Dirección creada con éxito.";

                    $sucursales = $sucursales['sucursales'];
                    $this->eliminaSucursalesPorDireccion($direccionID);

                    if (!empty($sucursales)) {
                        foreach ($sucursales as $value) {
                            $sucursal['direccionID'] = $direccionID;
                            $sucursal['sucursalID'] = $value;
                            $rs = $this->model->crearSucursal($sucursal);
                        }
                    }
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $sm = new SucursalesModel();
        $this->view->sucursales = $sm->listar();
        $this->view->render($this, 'crear');
    }

    function editar($direccionID = null) {

        if ($_POST) {

            $estado = 0;

            $direccionID = filter_input(INPUT_POST, 'direccion_id');
            $nombreDireccion = filter_input(INPUT_POST, 'nombre');
            $descripcionDireccion = filter_input(INPUT_POST, 'descripcion');
            $encargadoDireccion = filter_input(INPUT_POST, 'encargado');
            $emailEncargadoDireccion = filter_input(INPUT_POST, 'email');
            $telefonoContactoDireccion = filter_input(INPUT_POST, 'telefono');
            $imagenDireccion = filter_input(INPUT_POST, 'imagen');
            $estado_dir = filter_input(INPUT_POST, 'estado');

            $sucursales = filter_input_array(INPUT_POST, array('sucursales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            if ($estado_dir) {
                $estado = 1;
            }

            $array = array($nombreDireccion, $descripcionDireccion, $encargadoDireccion,
                $emailEncargadoDireccion, $telefonoContactoDireccion);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $direccion['direccionID'] = $direccionID;
                $direccion['nombreDireccion'] = $nombreDireccion;
                $direccion['nombreUrlDireccion'] = $this->seo_url($nombreDireccion);
                $direccion['descripcionDireccion'] = $descripcionDireccion;
                $direccion['encargadoDireccion'] = $encargadoDireccion;
                $direccion['emailEncargadoDireccion'] = $emailEncargadoDireccion;
                $direccion['telefonoContactoDireccion'] = $telefonoContactoDireccion;
                $direccion['imagenDireccion'] = $imagenDireccion;
                $direccion['estadoDireccion'] = $estado;

                $response = $this->model->editar($direccion);
                if ($response == "ok") {
                    $this->view->msg = "Dirección actualizada con éxito.";

                    $sucursales = $sucursales['sucursales'];
                    $this->eliminaSucursalesPorDireccion($direccionID);

                    if (!empty($sucursales)) {
                        foreach ($sucursales as $value) {
                            $sucursal['direccionID'] = $direccionID;
                            $sucursal['sucursalID'] = $value;
                            $rs = $this->model->crearSucursal($sucursal);
                        }
                    }
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }



        $this->ver($direccionID);
    }

    function eliminaSucursalesPorDireccion($direccionID) {
        $this->model->eliminaSucursalesPorDireccion($direccionID);
    }

    function listar() {

        $direcciones = $this->model->listar();

        if (empty($direcciones)) {
            $this->vier->warn = "No existe Direcciones disponibles.";
        } else {
            $this->view->direcciones = $direcciones;
        }

        $this->view->render($this, 'listar');
    }

    function ver($direccionID = null) {

        if ($direccionID == null) {
            $this->view->render_404();
        } else {
            $direccion = $this->model->trae($direccionID);

            if (empty($direccion)) {
                $this->view->warn = "Dirección consultada no existe. Favor verificar.";
            } else {
                $sm = new SucursalesModel();
                $this->view->direccion = $direccion;
                $this->view->sucursales = $sm->listar();
                $this->view->sucursalesDirecciones = $this->model->listarSucursalesPorDireccion($direccionID);
            }

            $this->view->render($this, 'editar');
        }
    }

}
