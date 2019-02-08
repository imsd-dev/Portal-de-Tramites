<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of IndexModel
 *
 * @author Ruth Escobar A.
 */
class IndexModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function index($campo) {
        
        $array = array(
            'fields' => '*',
            'tables' => 'usuario',
            'conditions' => 'estado = ? AND nombre LIKE ? '
        );
        
        $data = array(1, $campo);

        return $this->db->select($array, $data);
    }
    
    function crear($data) {
        return $this->db->insert('usuario', $data);
    }
    
    function editar($data) {
        return $this->db->update('usuario', $data, 'usuarioID');
    }

}
