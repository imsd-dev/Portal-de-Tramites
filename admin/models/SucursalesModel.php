<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of SucursalesModel
 *
 * @author Ruth Escobar A.
 */
class SucursalesModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function crear($sucursal) {
        return $this->db->insert('sucursales', $sucursal, false, true);
    }

    function editar($sucursal) {
        return $this->db->update('sucursales', $sucursal, 'sucursalID', true);
    }

    function listar() {

        $array = array(
            'fields' => '*',
            'tables' => 'sucursales',
            'order' => 'nombreSucursal'
        );

        $data = null;

        return $this->db->select($array, $data);
    }

    function trae($sucursalID) {

        $array = array(
            'fields' => '*',
            'tables' => 'sucursales',
            'conditions' => 'sucursalID = ? '
        );

        $data = array($sucursalID);

        return $this->db->select($array, $data, true);
    }

}
