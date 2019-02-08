<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of CategoriasModel
 *
 * @author Ruth Escobar A.
 */
class CategoriasModel extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function trae(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'categorias',
            'conditions' => 'estadoCategoria = ?', 
            'order' => 'ordenCategoria'
        );

        $data = array('1');

        return $this->db->select($array, $data);
    }
    
    function listar(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'categorias',
            'conditions' => 'estadoCategoria = ?', 
            'order' => 'ordenCategoria'
        );
        
        $data = array(1);
        
        return $this->db->select($array, $data);
    }
}
