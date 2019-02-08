<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of UnidadesModel
 *
 * @author Ruth Escobar A.
 */
class UnidadesModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function trae($nombreUrlUnidad) {

        $array = array(
            'fields' => 'd.direccionID, d.nombreDireccion, d.nombreUrlDireccion, u.unidadID, u.nombreUnidad, u.descripcionUnidad,
                         u.encargadoUnidad, u.emailEncargadoUnidad, u.telefonoContactoUnidad',
            'tables' => 'direcciones as d',
            'join' => 'unidades as u ON d.direccionID = u.direccionID',
            'conditions' => 'nombreUrlUnidad = ? '
        );
  
        $data = array($nombreUrlUnidad);

        return $this->db->select($array, $data, true);
    }

    function traeSucursalesPorUnidad($unidadID) {

        $array = array(
            'fields' => '*',
            'tables' => 'unidadessucursales as us',
            'join' => 'sucursales as s ON us.sucursalID = s.sucursalID',
            'conditions' => 'unidadID = ? '
        );

        $data = array($unidadID);

        return $this->db->select($array, $data);
    }

}
