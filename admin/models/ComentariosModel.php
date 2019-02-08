<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of ComentariosModel
 *
 * @author Ruth Escobar A.
 */
class ComentariosModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function crea($comentario) {
        return $this->db->insert('comentarios', $comentario);
    }
    
    function editar($comentario) {
        return $this->db->update('comentarios', $comentario, 'comentarioID');
    }

    function creaMensaje($mensaje) {
        return $this->db->insert('mensajes', $mensaje);
    }

    function trae($comentarioID) {

        $array = array(
            'fields' => 'c.comentarioID, c.itemsComentario, c.comentarioAdicionalComentario, 
                        c.fechaCreacionComentario, c.leidoNoLeido, t.tramiteID, 
                        t.tituloTramite, u.usuarioID, u.rutUsuario, u.nombresUsuario, 
                        u.apellidosUsuario, u.emailUsuario',
            'tables' => 'comentarios as c',
            'join' => 'tramites as t ON c.tramiteID = t.tramiteID
                        INNER JOIN usuarios as u on c.usuarioID = u.usuarioID',
            'conditions' => 'c.leidoNoLeido = ? AND c.comentarioID = ?',
            'order' => 'c.fechaCreacionComentario'
        );

        $data = array('0', $comentarioID);

        return $this->db->select($array, $data, true);
    }

    function listar() {

        $array = array(
            'fields' => 'c.comentarioID, c.itemsComentario, c.comentarioAdicionalComentario, 
                        c.fechaCreacionComentario, c.leidoNoLeido, t.tramiteID, 
                        t.tituloTramite, u.usuarioID, u.rutUsuario, u.nombresUsuario, 
                        u.apellidosUsuario, u.emailUsuario',
            'tables' => 'comentarios as c',
            'join' => 'tramites as t ON c.tramiteID = t.tramiteID
                        INNER JOIN usuarios as u on c.usuarioID = u.usuarioID',
            'conditions' => 'c.leidoNoLeido = ?',
            'order' => 'c.fechaCreacionComentario'
        );

        $data = array('0');

        return $this->db->select($array, $data);
    }

}
