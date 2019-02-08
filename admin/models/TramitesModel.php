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

    function crear($tramite) {
        return $this->db->insert('tramites', $tramite, true, true);
    }

    function editar($tramite) {
        return $this->db->update('tramites', $tramite, 'tramiteID', true);
    }

    function eliminar($tramiteID) {
        return $this->db->deletebyID('tramites', 'tramiteID', $tramiteID);
    }

    function crearCategoria($tramiteCategoria) {
        return $this->db->insert('tramitescategorias', $tramiteCategoria, true);
    }

    function crearSucursal($sucursalCategoria) {
        return $this->db->insert('tramitessucursales', $sucursalCategoria, true);
    }

    function buscar($criterios) {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, d.nombreDireccion as departamento, 
                        fechaCreacionTramite, estadoTramite',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID'
        );

        return $this->db->search($array, $criterios);
    }

    function traeCategoriasPorTramite($tramiteID) {

        $array = array(
            'fields' => '*',
            'tables' => 'tramitescategorias',
            'conditions' => 'tramiteID = ?'
        );

        $data = array($tramiteID);

        return $this->db->select($array, $data);
    }

    function traeSucursalesPorTramite($tramiteID) {

        $array = array(
            'fields' => '*',
            'tables' => 'tramitessucursales',
            'conditions' => 'tramiteID = ?'
        );

        $data = array($tramiteID);

        return $this->db->select($array, $data);
    }

    function trae($tramiteID) {

        $array = array(
            'fields' => 't.*, d.nombreDireccion as nombreDireccion',
            'tables' => 'tramites as t',
            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
            'conditions' => 't.tramiteID = ? '
        );

        $data = array($tramiteID);

        return $this->db->select($array, $data, true);
    }

    function eliminaSucursalesTramite($tramiteID) {
        return $this->db->deletebyID('tramitessucursales', 'tramiteID', $tramiteID);
    }

    function eliminaCategoriasTramite($tramiteID) {
        return $this->db->deletebyID('tramitescategorias', 'tramiteID', $tramiteID);
    }

    function traeTitulos() {
        $array = array(
            'fields' => 'tituloTramite',
            'tables' => 'tramites',
            'conditions' => 'estadoTramite = ? ',
            'order' => 'tituloTramite'
        );

        $data = array(1);

        return $this->db->select($array, $data);
    }

    function listarDestacados() {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite, ordenTramite',
            'tables' => 'tramites',
            'conditions' => 'estadoTramite = ? AND destacadoTramite = ?',
            'order' => 'ordenTramite'
        );

        $data = array(1, 1);

        return $this->db->select($array, $data);
    }

    function listarTodos() {

        $array = array(
            'fields' => 'tramiteID, tituloTramite, ordenTramite, descripcionBreveTramite',
            'tables' => 'tramites',
            'conditions' => 'estadoTramite = ?',
            'order' => 'tituloTramite'
        );

        $data = array('1');

        return $this->db->select($array, $data);
    }

//    function comprobarVotoUsuario($tramiteID, $usuarioID, $tipoVoto) {
//
//        $array = array(
//            'fields' => '*',
//            'tables' => 'votos',
//            'conditions' => 'tramiteID = ? AND usuarioID = ? AND tipoVoto = ? '
//        );
//
//        $data = array($tramiteID, $usuarioID, $tipoVoto);
//
//        return $this->db->select($array, $data);
//    }
//
//    function buscarporTitulo($criterios) {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
//            . 'descripcionBreveTramite, d.nombreDireccion as departamento',
//            'tables' => 'tramites as t',
//            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
//            'conditions' => 'estadoTramite = ? '
//            . 'AND t.tituloTramite = ?'
//        );
//
//        $data = array('1', $criterios);
//
//        return $this->db->select($array, $data);
//    }
//
//    function buscarporTag($criterios) {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
//                . 'descripcionBreveTramite, d.nombreDireccion as departamento',
//            'tables' => 'tramites as t',
//            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
//            'conditions' => 'estadoTramite = ? '
//                . 'AND t.tagTramites LIKE ? OR t.tituloTramite LIKE ?'
//        );
//
//        $data = array('1', '%' . $criterios . '%', '%' . $criterios . '%');
//
//        return $this->db->select($array, $data);
//    }
//    
//    function buscarporTituloPalabra($criterios) {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, '
//            . 'descripcionBreveTramite, d.nombreDireccion as departamento',
//            'tables' => 'tramites as t',
//            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
//            'conditions' => 'estadoTramite = ? '
//            . 'AND t.tituloTramite LIKE ?'
//        );
//
//        $data = array('1', '%' . $criterios . '%');
//
//        return $this->db->select($array, $data);
//    }
//
//
//    function traePorNombre($nombreTramite) {
//
//        $array = array(
//            'fields' => 'd.nombreDireccion, t.*',
//            'tables' => 'tramites as t',
//            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
//            'conditions' => 'estadoTramite = ? AND t.tituloUrlTramite = ? '
//        );
//
//        $data = array('1', $nombreTramite);
//
//        return $this->db->select($array, $data, true);
//    }
//
//    function listarTodos() {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionBreveTramite',
//            'tables' => 'tramites',
//            'conditions' => 'estadoTramite = ?',
//            'order' => 'tituloTramite'
//        );
//
//        $data = array('1');
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarPorDireccion($direccionID) {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite, d.nombreDireccion as departamento',
//            'tables' => 'tramites as t',
//            'join' => 'direcciones as d ON t.direccionID = d.direccionID',
//            'conditions' => 'estadoTramite = ? AND d.direccionID = ?',
//            'order' => 'tituloTramite'
//        );
//
//        $data = array('1', $direccionID);
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarPorUnidad($unidadID) {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite, u.nombreUnidad as departamento',
//            'tables' => 'tramites as t',
//            'join' => 'unidades as u ON t.unidadID = u.unidadID',
//            'conditions' => 'estadoTramite = ? AND u.unidadID = ?',
//            'order' => 'tituloTramite'
//        );
//
//        $data = array('1', $unidadID);
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarPorSucursal($sucursalID) {
//
//        $array = array(
//            'fields' => 't.tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite',
//            'tables' => 'tramites as t',
//            'join' => 'tramitessucursales as ts ON t.tramiteID = ts.tramiteID',
//            'conditions' => 't.estadoTramite = ? AND ts.sucursalID = ?',
//            'order' => 'tituloTramite'
//        );
//
//        $data = array('1', $sucursalID);
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarPorCategoria($categoriaID) {
//
//        $array = array(
//            'fields' => 't.tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite',
//            'tables' => 'tramites as t',
//            'join' => 'tramitescategorias as tc ON t.tramiteID = tc.tramiteID',
//            'conditions' => 't.estadoTramite = ? AND tc.categoriaID = ?',
//            'order' => 'tituloTramite'
//        );
//
//        $data = array('1', $categoriaID);
//
//        return $this->db->select($array, $data);
//    }
//    
//    function traeCategoriasPorTramite($tramiteID) {
//
//        $array = array(
//            'fields' => 'c.categoriaID, nombreCategoria, iconoInteriorCategoria',
//            'tables' => 'categorias as c',
//            'join' => 'tramitescategorias as tc ON c.categoriaID = tc.categoriaID',
//            'conditions' => 'c.estadoCategoria = ? AND tc.tramiteID = ?',
//            'order' => 'c.nombreCategoria'
//        );
//
//        $data = array('1', $tramiteID);
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarDestacados() {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite',
//            'tables' => 'tramites',
//            'conditions' => 'estadoTramite = ? AND destacadoTramite = ?',
//            'order' => 'ordenTramite'
//        );
//
//        $data = array(1, 1);
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarFrecuentes() {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite',
//            'tables' => 'tramites',
//            'conditions' => 'estadoTramite = ? AND frecuenteTramite = ?',
//            'order' => 'ordenTramite'
//        );
//
//        $data = array('1', '1');
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarNuevos() {
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite, descripcionBreveTramite',
//            'tables' => 'tramites',
//            'conditions' => 'estadoTramite = ?',
//            'order' => 'fechaActualizacionTramite',
//            'limit' => '5'
//        );
//
//        $data = array('1');
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarPorPerfil($edad, $genero) {
//
//        if ($edad < 18) {
//            $in = "'Menor de 18'";
//        } else if (($edad >= 18) && ($edad <= 60)) {
//            $in = "'Mayor de 18', 'Todos', 'Desde 18 a 65'";
//        } else if (($edad > 60)) {
//            $in = "'Desde 60 y más', 'Desde 65 y más'";
//        }
//
//        $array = array(
//            'fields' => 'tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite',
//            'tables' => 'tramites',
//            'conditions' => 'estadoTramite = ? AND rangoEdadTramite IN (?) '
//            . 'AND generoTramite = ?',
//            'order' => 'RAND()',
//            'limit' => '10'
//        );
//
//        $data = array('1', $in, $genero);
//
//        return $this->db->select($array, $data);
//    }
//
//    function listarPorParticipacion($usuarioID) {
//
//        $array = array(
//            'fields' => 't.tramiteID, tituloTramite, tituloUrlTramite, descripcionTramite',
//            'tables' => 'tramites as t',
//            'join' => 'votos as v ON t.tramiteID = v.tramiteID',
//            'conditions' => 't.estadoTramite = ? AND v.usuarioID = ?',
//            'order' => 'RAND()',
//            'limit' => '10'
//        );
//
//        $data = array('1', $usuarioID);
//
//        return $this->db->select($array, $data);
//    }
//
//    function traeSucursalesTramite($tramiteID) {
//
//        $array = array(
//            'fields' => 's.sucursalID, s.nombreSucursal, s.direccionSucursal, s.fono1Sucursal',
//            'tables' => 'tramitessucursales as ts',
//            'join' => 'sucursales as s ON ts.sucursalID = s.sucursalID',
//            'conditions' => 'ts.tramiteID = ?',
//            'order' => 's.nombreSucursal'
//        );
//
//        $data = array($tramiteID);
//
//        return $this->db->select($array, $data);
//    }
}
