<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of TelefonosModel
 *
 * @author Ruth Escobar A.
 */
class TelefonosModel extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function listar(){
         $array = array(
            'fields' => '*',
            'tables' => 'telefonos',
            'order' => 'categoriaTelefono, nombreTelefono'
        );

        return $this->db->select($array, null);
    }
}
