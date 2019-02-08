<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of DireccionesModel
 *
 * @author Ruth Escobar A.
 */
class DireccionesModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function trae($nombreUrlDireccion) {
        
        $array = array(
            'fields' => '*',
            'tables' => 'direcciones',
            'conditions' => 'estadoDireccion = ? AND nombreUrlDireccion = ? '
        );
        
        $data = array(1, $nombreUrlDireccion);

        return $this->db->select($array, $data, true);
    }

    function traeSucursalesPorDireccion($direccionID){
        
        $array = array(
            'fields' => '*',
            'tables' => 'direccionessucursales as ds',
            'join' => 'sucursales as s ON ds.sucursalID = s.sucursalID',
            'conditions' => 'direccionID = ? '
        );
        
        $data = array($direccionID);

        return $this->db->select($array, $data);
    }
    
    function traeUnidadesPorDireccion($direccionID){
        
        $array = array(
            'fields' => '*',
            'tables' => 'unidades',
            'conditions' => 'direccionID = ? AND estadoUnidad = ?'
        );
        
        $data = array($direccionID, 1);

        return $this->db->select($array, $data);
    }
    
    function listar(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'direcciones',
            'conditions' => 'estadoDireccion = ?', 
            'order' => 'nombreDireccion'
        );
        
        $data = array(1);
        
        return $this->db->select($array, $data);
    }
}
