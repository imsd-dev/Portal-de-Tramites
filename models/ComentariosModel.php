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

    function crea($comentario){
        return $this->db->insert('comentarios', $comentario);
    }
}
