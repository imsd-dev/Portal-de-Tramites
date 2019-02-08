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
    
    function crear($direccion) {
        return $this->db->insert('direcciones', $direccion, true, true);
    }
    
    function editar($direccion) {
        return $this->db->update('direcciones', $direccion, 'direccionID', true);
    }
    
    function trae($direccionID) {
        
        $array = array(
            'fields' => '*',
            'tables' => 'direcciones',
            'conditions' => 'direccionID = ? '
        );
        
        $data = array($direccionID);

        return $this->db->select($array, $data, true);
    }
    
    function listar(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'direcciones',
            'order' => 'nombreDireccion'
        );
        
        $data = null;
        
        return $this->db->select($array, $data);
    }
    
    function eliminaSucursalesPorDireccion($direccionID) {
        return $this->db->deletebyID('direccionessucursales', 'direccionID', $direccionID);
    }
    
    function crearSucursal($sucursalDireccion) {
        return $this->db->insert('direccionessucursales', $sucursalDireccion, true);
    }
    
    function listarSucursalesPorDireccion($direccionID){

        $array = array(
            'fields' => '*',
            'tables' => 'direccionessucursales',
            'conditions' => 'direccionID = ?'
        );
        
        $data = array($direccionID);
        
        return $this->db->select($array, $data);
    }
}
