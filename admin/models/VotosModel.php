<?php

/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of VotosModel
 *
 * @author Ruth Escobar A.
 */
class VotosModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function traeVotosPorUtilidad($voto, $fechas = null) {

        $between = null;
        if ($fechas != null) {
            $between = "AND CAST(v.fechaCreacionVoto AS DATE) BETWEEN '" . $fechas['ini'] . "' AND '" . $fechas['ter'] . "'";
        }

        $array = array(
            'fields' => 't.tramiteID, t.tituloTramite, t.tituloUrlTramite, count(t.tituloTramite) AS contador, '
            . 'ROUND(count(t.tituloTramite) * 100 / (SELECT count(*) FROM votos WHERE tipoVoto = "UTILIDAD" AND detalleVoto = "' . $voto . '"),0) AS porcentaje',
            'tables' => 'tramites as t',
            'join' => 'votos as v ON t.tramiteID = v.tramiteID',
            'conditions' => 't.estadoTramite = ? AND v.tipoVoto = ? AND v.detalleVoto = ? ' . $between,
            'group' => 't.tramiteID, t.tituloTramite, t.tituloUrlTramite',
            'order' => 'contador DESC'
        );

        $data = array('1', 'UTILIDAD', $voto);

        return $this->db->select($array, $data);
    }

    function traeVotosEnLinea($fechas = null) {

        $between = null;
        if ($fechas != null) {
            $between = "AND CAST(v.fechaCreacionVoto AS DATE) BETWEEN '" . $fechas['ini'] . "' AND '" . $fechas['ter'] . "'";
        }

        $array = array(
            'fields' => 't.tramiteID, t.tituloTramite, t.tituloUrlTramite, count(t.tituloTramite) AS contador, 
                        ROUND(count(t.tituloTramite) * 100 / (SELECT count(*) FROM votos WHERE tipoVoto = "LINEA"),0) AS porcentaje ',
            'tables' => 'tramites as t',
            'join' => 'votos as v ON t.tramiteID = v.tramiteID',
            'conditions' => 't.estadoTramite = ? AND v.tipoVoto = ? ' . $between,
            'group' => 't.tramiteID, t.tituloTramite, t.tituloUrlTramite',
            'order' => 'contador DESC'
        );

        $data = array('1', 'LINEA');

        return $this->db->select($array, $data);
    }

}
