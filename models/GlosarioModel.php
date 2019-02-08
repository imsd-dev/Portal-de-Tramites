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
class GlosarioModel extends Model {

    function __construct() {
        parent::__construct();
    }
        
    function ver(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'glosario',
            'order' => 'nombreGlosario'
        );
        
        $data = null;
        
        return $this->db->select($array, $data);
    }
}
