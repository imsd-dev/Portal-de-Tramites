<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of PropuestasModel
 *
 * @author Ruth Escobar A.
 */
class PropuestasModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function crea($comentario) {
        return $this->db->insert('propuestas', $comentario);
    }
    
    function editar($comentario) {
        return $this->db->update('propuestas', $comentario, 'propuestaID');
    }

    function creaMensaje($mensaje) {
        return $this->db->insert('mensajes', $mensaje);
    }

    function trae($propuestaID) {

        $array = array(
            'fields' => 'p.*, u.usuarioID, u.rutUsuario, u.nombresUsuario, u.apellidosUsuario, u.emailUsuario',
            'tables' => 'propuestas as p',
            'join' => 'usuarios as u on p.usuarioID = u.usuarioID',
            'conditions' => 'p.leidoNoLeido = ? AND p.propuestaID = ?',
            'order' => 'p.fechaComentarioPropuesta'
        );

        $data = array('0', $propuestaID);

        return $this->db->select($array, $data, true);
    }

    function listar() {

        $array = array(
            'fields' => 'p.*, u.usuarioID, u.rutUsuario, u.nombresUsuario, u.apellidosUsuario, u.emailUsuario',
            'tables' => 'propuestas as p',
            'join' => 'usuarios as u on p.usuarioID = u.usuarioID',
            'conditions' => 'p.leidoNoLeido = ?',
            'order' => 'p.fechaComentarioPropuesta'
        );

        $data = array('0');

        return $this->db->select($array, $data);
    }

}
