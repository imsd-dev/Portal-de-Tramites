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

    function crea($propuesta){
        return $this->db->insert('propuestas', $propuesta);
    }
}
