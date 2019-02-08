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
    
    function crear($unidad) {
        return $this->db->insert('unidades', $unidad, true, true);
    }
    
    function editar($unidad) {
        return $this->db->update('unidades', $unidad, 'unidadID', true);
    }
    
    function listarPorDireccion($direccionID){
        
        $array = array(
            'fields' => 'u.*, d.nombreDireccion',
            'tables' => 'unidades as u',
            'join' => 'direcciones as d ON u.direccionID = d.direccionID',
            'conditions' => 'estadoUnidad = ? AND d.direccionID = ?'
        );  

        $data = array(1, $direccionID);

        return $this->db->select($array, $data);
    }

    function trae($unidadID) {

        $array = array(
            'fields' => 'u.*, d.nombreDireccion',
            'tables' => 'unidades as u',
            'join' => 'direcciones as d ON u.direccionID = d.direccionID',
            'conditions' => 'unidadID = ? '
        );
  
        $data = array($unidadID);

        return $this->db->select($array, $data, true);
    }
    
    function listar(){
        
        $array = array(
            'fields' => 'u.*, d.nombreDireccion',
            'tables' => 'unidades as u',
            'join' => 'direcciones as d ON u.direccionID = d.direccionID',
            'order' => 'd.nombreDireccion'
        );
  
        $data = null;

        return $this->db->select($array, $data);
    }
    
    function eliminaSucursalesPorUnidad($unidadID) {
        return $this->db->deletebyID('unidadessucursales', 'unidadID', $unidadID);
    }
    
    function crearSucursal($sucursalUnidad) {
        return $this->db->insert('unidadessucursales', $sucursalUnidad, true);
    }
    
    function listarSucursalesPorUnidad($unidadID){

        $array = array(
            'fields' => '*',
            'tables' => 'unidadessucursales',
            'conditions' => 'unidadID = ?'
        );
        
        $data = array($unidadID);
        
        return $this->db->select($array, $data);
    }

//    function traeSucursalesPorUnidad($unidadID) {
//
//        $array = array(
//            'fields' => '*',
//            'tables' => 'unidadessucursales as us',
//            'join' => 'sucursales as s ON us.sucursalID = s.sucursalID',
//            'conditions' => 'unidadID = ? '
//        );
//
//        $data = array($unidadID);
//
//        return $this->db->select($array, $data);
//    }

}
