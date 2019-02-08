<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Sucursales
 *
 * @author Ruth Escobar A.
 */
class Sucursales extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->sucursalesMenu = "nav-expanded nav-active";
    }

    function crear() {

        if ($_POST) {

            $w = 0;
            $nombreSucursal = filter_input(INPUT_POST, 'nombre');
            $direccionSucursal = filter_input(INPUT_POST, 'direccion');
            $fono1Sucursal = filter_input(INPUT_POST, 'phone1');
            $fono2Sucursal = filter_input(INPUT_POST, 'phone2');
            $horarioInicioSucursal = filter_input(INPUT_POST, 'horaini');
            $horarioFinSucursal = filter_input(INPUT_POST, 'horafin');
            $googleMapsSucursal = filter_input(INPUT_POST, 'url');
            $wifi = filter_input(INPUT_POST, 'wifi');

            if ($wifi) {
                $w = 1;
            }

            $diasAtencionSucursal = filter_input_array(INPUT_POST, array('dias' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            $array = array($nombreSucursal, $direccionSucursal, $fono1Sucursal,
                $horarioInicioSucursal, $horarioFinSucursal);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $sucursal['nombreSucursal'] = $nombreSucursal;
                $sucursal['direccionSucursal'] = $direccionSucursal;
                $sucursal['fono1Sucursal'] = $fono1Sucursal;
                $sucursal['fono2Sucursal'] = $fono2Sucursal;
                $sucursal['horarioInicioSucursal'] = $horarioInicioSucursal;
                $sucursal['horarioFinSucursal'] = $horarioFinSucursal;
                $sucursal['diasAtencionSucursal'] = serialize($diasAtencionSucursal);
                $sucursal['googleMapsSucursal'] = $googleMapsSucursal;
                $sucursal['fechaCreacion'] = date("Y-m-d H:i:s");
                $sucursal['estadoSucursal'] = 1;
                $sucursal['wifiSucursal'] = $w;

                $response = $this->model->crear($sucursal);
                if ($response == "ok") {
                    $this->view->msg = "Sucursal creada con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->view->render($this, 'crear');
    }

    function editar($sucursalID = null) {

        if ($_POST) {

            $estado = '0';
            $w = '0';
            
            $sucursalID = filter_input(INPUT_POST, 'id_sucursal');
            $nombreSucursal = filter_input(INPUT_POST, 'nombre');
            $direccionSucursal = filter_input(INPUT_POST, 'direccion');
            $fono1Sucursal = filter_input(INPUT_POST, 'phone1');
            $fono2Sucursal = filter_input(INPUT_POST, 'phone2');
            $horarioInicioSucursal = filter_input(INPUT_POST, 'horaini');
            $horarioFinSucursal = filter_input(INPUT_POST, 'horafin');
            $googleMapsSucursal = filter_input(INPUT_POST, 'url');
            $estado_suc = filter_input(INPUT_POST, 'estado');
            $wifi = filter_input(INPUT_POST, 'wifi');

            if ($estado_suc) {
                $estado = '1';
            }

            if ($wifi) {
                $w = '1';
            }

            $diasAtencionSucursal = filter_input_array(INPUT_POST, array('dias' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            $array = array($nombreSucursal, $direccionSucursal, $fono1Sucursal,
                $horarioInicioSucursal, $horarioFinSucursal);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $sucursal['sucursalID'] = $sucursalID;
                $sucursal['nombreSucursal'] = $nombreSucursal;
                $sucursal['direccionSucursal'] = $direccionSucursal;
                $sucursal['fono1Sucursal'] = $fono1Sucursal;
                $sucursal['fono2Sucursal'] = $fono2Sucursal;
                $sucursal['horarioInicioSucursal'] = $horarioInicioSucursal;
                $sucursal['horarioFinSucursal'] = $horarioFinSucursal;
                $sucursal['diasAtencionSucursal'] = serialize($diasAtencionSucursal);
                $sucursal['googleMapsSucursal'] = $googleMapsSucursal;
                $sucursal['estadoSucursal'] = $estado;
                $sucursal['wifiSucursal'] = $w;

                $response = $this->model->editar($sucursal);
                if ($response == "ok") {
                    $this->view->msg = "Sucursal actualizada con éxito.";
                } else {
                    $this->view->err = $response;
                }
            }
        }

        if ($sucursalID == null) {
            $this->view->render_404();
        } else {
            $sucursal = $this->model->trae($sucursalID);
            if (empty($sucursal)) {
                $this->view->warn = "Sucursal consultada no existe. Favor verificar.";
            } else {
                $this->view->sucursal = $sucursal;
                $dias = unserialize($sucursal->diasAtencionSucursal);
                $this->view->dias = (!empty($dias['dias'])) ? $dias['dias'] : $array = array();
            }

            $this->view->render($this, 'editar');
        }
    }

    function listar() {

        $sucursales = $this->model->listar();

        if (empty($sucursales)) {
            $this->vier->warn = "No existe Sucursales disponibles.";
        } else {
            $this->view->sucursales = $sucursales;
        }

        $this->view->render($this, 'listar');
    }

}
