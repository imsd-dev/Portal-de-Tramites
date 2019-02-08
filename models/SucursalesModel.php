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

    function verSucursales() {

        $array = array(
            'fields' => 's.sucursalID, s.nombreSucursal, s.horarioInicioSucursal, s.horarioFinSucursal, 
                         s.fono1Sucursal, s.fono2Sucursal, count(ts.tramiteID) as cantidadTramites, 
                         s.wifiSucursal, s.direccionSucursal',
            'tables' => 'sucursales as s LEFT JOIN tramitessucursales as ts ON s.sucursalID = ts.sucursalID',
            'conditions' => 'estadoSucursal = ?',
            'group' => 's.sucursalID',
            'order' => 's.nombreSucursal'
        );
        
        $data = array(1);

        return $this->db->select($array, $data);
    }

}
