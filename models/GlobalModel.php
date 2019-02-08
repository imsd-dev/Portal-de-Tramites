<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of globalModel
 *
 * @author Ruth Escobar A.
 */
class GlobalModel extends Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function traeTramitesLinea(){
        
        $array = array(
            'fields' => 'd.nombreDireccion, t.tramiteID, t.tituloUrlTramite, t.tituloTramite',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 't.estadoTramite = ? AND t.tipoTramite = ? '
        );

        $data = array('1', '100% linea');

        return $this->db->select($array, $data);
    }
    
    function listarMasVotados() {

        $array = array(
            'fields' => 't.tramiteID, t.tituloTramite, t.tituloUrlTramite, count(t.tituloTramite) AS contador, 
                        ROUND(count(t.tituloTramite) * 100 / (SELECT count(*) FROM votos WHERE tipoVoto = "UTILIDAD" AND detalleVoto = "SI"),0) AS porcentaje',
            'tables' => 'tramites as t',
            'join' => 'votos as v ON t.tramiteID = v.tramiteID',
            'conditions' => 't.estadoTramite = ? AND v.tipoVoto = ? AND v.detalleVoto = ?',
            'group' => 't.tramiteID, t.tituloTramite, t.tituloUrlTramite',
            'order' => 'porcentaje DESC',
            'limit' => '4'
        );

        $data = array('1', 'UTILIDAD', 'SI');

        return $this->db->select($array, $data);
    }
}
