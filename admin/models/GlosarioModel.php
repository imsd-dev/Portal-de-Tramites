<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of GlosarioModel
 *
 * @author Ruth Escobar A.
 */
class GlosarioModel  extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function crear($glosario) {
        return $this->db->insert('glosario', $glosario, false, true);
    }
    
    function editar($glosario) {
        return $this->db->update('glosario', $glosario, 'glosarioID', true);
    }
    
    function trae($glosarioID){
        
        $array = array(
            'fields' => '*',
            'tables' => 'glosario',
            'conditions' => 'glosarioID = ?'
        );

        $data = array($glosarioID);

        return $this->db->select($array, $data, true);
    }
    
    function listar(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'glosario',
            'order' => 'nombreGlosario'
        );
        
        $data = null;
        
        return $this->db->select($array, $data);
    }
}
