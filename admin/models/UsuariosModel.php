<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of UsuariosModel
 *
 * @author Ruth Escobar A.
 */
class UsuariosModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function crear($usuario) {
        return $this->db->insert('usuarios', $usuario, false, true);
    }

    function traePorUsername($username) {

        $array = array(
            'fields' => '*',
            'tables' => 'usuarios',
            'conditions' => 'estadoUsuario = ? '
            . 'AND rutUsuario = ? '
        );

        $data = array('1', $username);

        return $this->db->select($array, $data, true);
    }
	    
    function traebyID($usuarioID) {

        $array = array(
            'fields' => '*',
            'tables' => 'usuarios',
            'conditions' => 'usuarioID = ? '
        );

        $data = array($usuarioID);

        return $this->db->select($array, $data, true);
    }
           
    function editar($usuario){
        return $this->db->update('usuarios', $usuario, 'usuarioID');
    }
    
    function buscar($usuarios){
        
        $array = array(
            'fields' => '*',
            'tables' => 'usuarios'
        );

        return $this->db->search($array, $usuarios);
    }

}
