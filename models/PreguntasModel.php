<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of PreguntasModel
 *
 * @author Ruth Escobar A.
 */
class PreguntasModel extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function ver(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'preguntasfrecuentes',
            'order' => 'nombrePreguntaFrecuente'
        );
        
        $data = null;
        
        return $this->db->select($array, $data);
    }
}
