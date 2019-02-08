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
    
    function crear($categoria) {
        return $this->db->insert('categorias', $categoria, false, true);
    }
    
    function editar($categoria) {
        return $this->db->update('categorias', $categoria, 'categoriaID', true);
    }
    
    function trae($categoriID){
        
        $array = array(
            'fields' => '*',
            'tables' => 'categorias',
            'conditions' => 'categoriaID = ?', 
            'order' => 'ordenCategoria'
        );

        $data = array($categoriID);

        return $this->db->select($array, $data, true);
    }
    
    function listar(){
        
        $array = array(
            'fields' => '*',
            'tables' => 'categorias',
            'order' => 'ordenCategoria'
        );
        
        $data = null;
        
        return $this->db->select($array, $data);
    }
}
