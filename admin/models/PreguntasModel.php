<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of PreguntasModel
 *
 * @author Ruth Escobar A.
 */
class PreguntasModel  extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function crear($preguntas) {
        return $this->db->insert('preguntasfrecuentes', $preguntas, false, true);
    }
    
    function editar($preguntas) {
        return $this->db->update('preguntasfrecuentes', $preguntas, 'preguntaFrecuenteID', true);
    }
    
    function trae($preguntaFrecuenteID){
        
        $array = array(
            'fields' => '*',
            'tables' => 'preguntasfrecuentes',
            'conditions' => 'preguntaFrecuenteID = ?'
        );

        $data = array($preguntaFrecuenteID);

        return $this->db->select($array, $data, true);
    }
    
    function listar(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'preguntasfrecuentes',
            'order' => 'nombrePreguntaFrecuente'
        );
        
        $data = null;
        
        return $this->db->select($array, $data);
    }
}
