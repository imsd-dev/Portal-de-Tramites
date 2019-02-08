<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of TramitesModel
 *
 * @author Ruth Escobar A.
 */
class TramitesModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function creaVoto($voto) {
        return $this->db->insert('votos', $voto);
    }

    function guardaBusqueda($busqueda) {
        return $this->db->insert('busquedas', $busqueda);
    }

    function guardaTramiteFrecuente($tramitesFrecuentes) {
        return $this->db->insert('tramitesfrecuentes', $tramitesFrecuentes);
    }

    function comprobarVotoUsuario($tramiteID, $usuarioID, $tipoVoto) {

        $array = array(
            'fields' => '*',
            'tables' => 'votos',
            'conditions' => 'tramiteID = ? AND usuarioID = ? AND tipoVoto = ? '
        );

        $data = array($tramiteID, $usuarioID, $tipoVoto);

        return $this->db->select($array, $data);
    }

    function buscarporTitulo($criterios) {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
            . 'descripcionBreveTramite, d.nombreDireccion as departamento, canalesAtencionTramite',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 'estadoTramite = ? '
            . 'AND t.tituloTramite = ?'
        );

        $data = array('1', $criterios);

        return $this->db->select($array, $data);
    }

    function buscarporTag($criterios) {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
            . 'descripcionBreveTramite, d.nombreDireccion as departamento, canalesAtencionTramite',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 'estadoTramite = ? '
            . 'AND t.tagTramites LIKE ? OR t.tituloTramite LIKE ?'
        );

        $data = array('1', '%' . $criterios . '%', '%' . $criterios . '%');

        return $this->db->select($array, $data);
    }

    function buscarporcualquiera($criterios) {

        $array = array(
            'fields' => 't.tramiteID as tramiteID, t.tituloTramite as titulotramite, t.tituloUrlTramite as titulourltramite, t.descripcionTramite as descripciontramite , '
            . 't.descripcionBreveTramite as descripcionbrevetramite, d.nombreDireccion as nombredireccion, t.canalesAtencionTramite as canalesatenciontramite',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 'estadoTramite = ? '
            . 'AND t.* LIKE ?'
        );

        $data = array('1', '%' . $criterios . '%');

        return $this->db->select($array, $data);
    }
    /****************************** NUEVAS CONSULTAS *********************************/
    function buscarporTituloPalabra($criterios) {

        $array = array(
            'fields' => 't.tramiteID as tramiteID, t.tituloTramite as titulotramite, t.tituloUrlTramite as titulourltramite, t.descripcionTramite as descripciontramite , '
            . 't.descripcionBreveTramite as descripcionbrevetramite, d.nombreDireccion as nombredireccion, t.canalesAtencionTramite as canalesatenciontramite',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 'estadoTramite = ? '
            . 'AND t.tituloTramite LIKE ?'
        );

        $data = array('1', '%' . $criterios . '%');

        return $this->db->select($array, $data);
    }

    function buscarporDireccionPalabra($criterios) {

        $array = array(
            'fields' => 'nombredireccion, descripciondireccion, nombreurldireccion',
            'tables' => 'direcciones',
            'conditions' => 'nombredireccion = ? '            
        );

        $data = array('%' . $criterios . '%');

        return $this->db->select($array, $data);
    }

    function buscarporUnidadPalabra($criterios) {

        $array = array(
            'fields' => 'nombreunidad, descripcionunidad, nombreurlunidad',
            'tables' => 'unidades ',
            'conditions' => 'nombreunidad = ? '            
        );

        $data = array('%' . $criterios . '%');

        return $this->db->select($array, $data);
    }

    function buscarporSucursalPalabra($criterios) {

        $array = array(
            'fields' => 'nombresucursal, direccionsucursal ',
            'tables' => 'sucursales ',
            'conditions' => 'nombresucursal = ? '            
        );

        $data = array('%' . $criterios . '%');

        return $this->db->select($array, $data);
    }







    //****************************** NUEVAS CONSULTAS *********************************//
    function traePorID($tramiteID) {

        $array = array(
            'fields' => '*',
            'tables' => 'tramites',
            'conditions' => 'estadoTramite = ? AND tramiteID = ? '
        );

        $data = array('1', $tramiteID);

        return $this->db->select($array, $data, true);
    }

    function traePorNombre($nombreTramite) {

        $array = array(
            'fields' => 'd.nombreDireccion, d.imagenDireccion, t.*',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 'estadoTramite = ? AND t.tituloUrlTramite = ? '
        );

        $data = array('1', $nombreTramite);

        return $this->db->select($array, $data, true);
    }

    function listarTodos() {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionBreveTramite, canalesAtencionTramite',
            'tables' => 'tramites',
            'conditions' => 'estadoTramite = ?',
            'order' => 'tituloTramite'
        );

        $data = array('1');

        return $this->db->select($array, $data);
    }

    function listarPorDireccion($direccionID) {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
            . 'descripcionBreveTramite, d.nombreDireccion as departamento, canalesAtencionTramite',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 'estadoTramite = ? AND d.direccionID = ?',
            'order' => 'tituloTramite'
        );

        $data = array('1', $direccionID);

        return $this->db->select($array, $data);
    }

    function listarPorUnidad($unidadID) {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
            . 'descripcionBreveTramite, u.nombreUnidad as departamento, canalesAtencionTramite',
            'tables' => 'tramites as t',
            'join' => 'unidades as u ON t.unidadID = u.unidadID',
            'conditions' => 'estadoTramite = ? AND u.unidadID = ?',
            'order' => 'tituloTramite'
        );

        $data = array('1', $unidadID);

        return $this->db->select($array, $data);
    }

    function listarPorSucursal($sucursalID) {

        $array = array(
            'fields' => 't.tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
            . 'descripcionBreveTramite, canalesAtencionTramite, s.nombreSucursal as departamento',
            'tables' => 'tramites as t',
            'join' => 'tramitessucursales as ts ON t.tramiteID = ts.tramiteID INNER JOIN sucursales AS s ON ts.sucursalID = s.sucursalID',
            'conditions' => 't.estadoTramite = ? AND ts.sucursalID = ?',
            'order' => 'tituloTramite'
        );

        $data = array('1', $sucursalID);

        return $this->db->select($array, $data);
    }

    function listarPorCategoria($categoriaID) {

        $array = array(
            'fields' => 't.tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
            . 'descripcionBreveTramite, canalesAtencionTramite',
            'tables' => 'tramites as t',
            'join' => 'tramitescategorias as tc ON t.tramiteID = tc.tramiteID',
            'conditions' => 't.estadoTramite = ? AND tc.categoriaID = ?',
            'order' => 'tituloTramite'
        );

        $data = array('1', $categoriaID);

        return $this->db->select($array, $data);
    }

    function traeCategoriasPorTramite($tramiteID) {

        $array = array(
            'fields' => 'c.categoriaID, nombreCategoria, iconoInteriorCategoria',
            'tables' => 'categorias as c',
            'join' => 'tramitescategorias as tc ON c.categoriaID = tc.categoriaID',
            'conditions' => 'c.estadoCategoria = ? AND tc.tramiteID = ?',
            'order' => 'c.nombreCategoria'
        );

        $data = array('1', $tramiteID);

        return $this->db->select($array, $data);
    }

    function listarDestacados($limit = null) {

        if ($limit == null) {
            $array = array(
                'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
                . 'descripcionBreveTramite, canalesAtencionTramite',
                'tables' => 'tramites',
                'conditions' => 'estadoTramite = ? AND destacadoTramite = ?',
                'order' => 'ordenTramite'
            );
        } else {
            $array = array(
                'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
                . 'descripcionBreveTramite, canalesAtencionTramite',
                'tables' => 'tramites',
                'conditions' => 'estadoTramite = ? AND destacadoTramite = ?',
                'order' => 'ordenTramite',
                'limit' => $limit
            );
        }

        $data = array(1, 1);

        return $this->db->select($array, $data);
    }

    function listarFrecuentes($limit = null) {

        if ($limit == null) {
            $array = array(
                'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, count(tramiteID) as contador',
                'tables' => 'tramitesfrecuentes',
                'group' => 'tramiteID',
                'order' => 'contador DESC'
            );
        } else {
            $array = array(
                'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, count(tramiteID) as contador',
                'tables' => 'tramitesfrecuentes',
                'group' => 'tramiteID',
                'order' => 'contador DESC',
                'limit' => $limit
            );
        }
        
        $data = null;

        return $this->db->select($array, $data);
    }

    function listarNuevos() {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
            . 'descripcionBreveTramite, canalesAtencionTramite',
            'tables' => 'tramites',
            'conditions' => 'estadoTramite = ?',
            'order' => 'fechaActualizacionTramite desc',
            'limit' => '5'
        );

        $data = array('1');

        return $this->db->select($array, $data);
    }

    function listarPorPerfil($edad, $genero) {

        if ($edad < 18) {
            $in = "'Menor de 18'";
        } else if (($edad >= 18) && ($edad <= 60)) {
            $in = "'Mayor de 18', 'Todos', 'Desde 18 a 65'";
        } else if (($edad > 60)) {
            $in = "'Desde 60 y más', 'Desde 65 y más'";
        }

        switch ($genero) {
            case 'MASCULINO':
                $generoTramite = 'Hombre';
                break;
            case 'FEMENINO':
                $generoTramite = 'Mujer';
                break;
            default:
                $generoTramite = 'Todos';
                break;
        }

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite',
            'tables' => 'tramites',
            'conditions' => 'estadoTramite = ? OR rangoEdadTramite IN (?) '
            . 'OR generoTramite = ?',
            'order' => 'RAND()',
            'limit' => '8'
        );

        $data = array('1', $in, $generoTramite);

        return $this->db->select($array, $data);
    }

    function listarPorParticipacion($usuarioID) {

        $array = array(
            'fields' => 't.tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, canalesAtencionTramite',
            'tables' => 'tramites as t',
            'join' => 'votos as v ON t.tramiteID = v.tramiteID',
            'conditions' => 't.estadoTramite = ? AND v.usuarioID = ?',
            'order' => 'RAND()',
            'limit' => '10'
        );

        $data = array('1', $usuarioID);

        return $this->db->select($array, $data);
    }

    function traeSucursalesTramite($tramiteID) {

        $array = array(
            'fields' => 's.sucursalID, s.nombreSucursal, s.direccionSucursal, s.fono1Sucursal, s.fono2Sucursal',
            'tables' => 'tramitessucursales as ts',
            'join' => 'sucursales as s ON ts.sucursalID = s.sucursalID',
            'conditions' => 'ts.tramiteID = ?',
            'order' => 's.nombreSucursal'
        );

        $data = array($tramiteID);

        return $this->db->select($array, $data);
    }

}
