<?php

/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Grupo Desarrollo Multimedia
 */

/**
 * Description of anunciosModel
 *
 * @author Ruth Escobar
 */
class anunciosModel extends Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * CU24: Crear Anuncio
     * @param array $data Objeto con Datos a Crear
     */
    function crear($data) {
//retorna el ID del anuncio
        return $this->db->insert('anuncios', $data, true);
    }

    /**
     * CU25: Editar Anuncio
     * @param array $data Objeto con Datos a Editar
     */
    function editar($data) {
        return $this->db->update('anuncios', $data, 'anuncioID = ' . $data["anuncioID"]);
    }

    /**
     * CU26: Eliminar Anuncio
     * @param int $anuncioID Identificador de Anuncio
     */
    function eliminar($anuncioID) {
        return $this->db->delete('anuncios', $anuncioID);
    }

    /**
     * CU91: Buscar Anuncios
     * 
     * @param Array $data Datos de campos
     * @param Array $dataAd Datos para buscar información anexa a los campos
     * @return Object con resultados de búsqueda
     */
    function buscar($data, $dataAd) {

        $between = null;
        $condition = 'AND estadoPlan = 1 '
                . 'AND estadoModeracion = "Aprobado" '
                . 'AND estadoPublicacion = 1 ';

        if ($dataAd['anoMin'] != "TODOS") {
            $between .= " AND anoFabricacion BETWEEN '" . $dataAd['anoMin'] . "' AND '" . $dataAd['anoMax'] . "'";
        }

        if ($dataAd['precioMin'] != "TODOS") {
            $between .= " AND precioVentaArriendo BETWEEN '" . $dataAd['precioMin'] . "' AND '" . $dataAd['precioMax'] . "'";
        }

        if ($dataAd['fechaInicio'] != null) {
            $between .= " AND fechaCreacion BETWEEN '" . $dataAd['fechaInicio'] . "' AND '" . $dataAd['fechaTermino'] . "'";
        }

        $array = array(
            'fields' => '*',
            'tables' => 'anuncios AS a',
            'join' => 'usuarios AS u ON a.usuarioID = u.usuarioID '
            . 'INNER JOIN categorias AS c ON a.categoriaID = c.categoriaID '
            . 'INNER JOIN marcas AS m ON a.marcaID = m.marcaID',
            'conditions' => $data,
            'between' => $between
        );

        return $this->db->search($array, $condition);
    }

    function buscarGen($campo) {

        $array = array(
            'fields' => '*',
            'tables' => 'anuncios AS a',
            'join' => 'marcas AS m ON a.marcaID = m.marcaID ' .
            'INNER JOIN usuarios AS u ON a.usuarioID = u.usuarioID ',
            'conditions' => 'estadoPlan = 1 '
                . 'AND estadoModeracion = "Aprobado" '
                . 'AND estadoPublicacion = 1 '
                . 'OR nombreMarca LIKE "%$campo%" '
                . 'OR pais LIKE "%$campo%" '
                . 'OR tituloPublicacion LIKE "%$campo%" '
                . 'OR a.modeloMaquinaria LIKE "%$campo%" '
        );

        return $this->db->select($array);
    }

    /**
     * CU28: Mostrar Anuncio
     * @param int $anuncioID  Identificador de Anuncio
     */
    function trae($anuncioID, $isAdmin = false) {

        if ($isAdmin) {
            $array = array(
                'fields' => '*',
                'tables' => 'anuncios AS a',
                'join' => 'usuarios AS u ON a.usuarioID = u.usuarioID '
                . 'INNER JOIN categorias AS c ON a.categoriaID = c.categoriaID '
                . 'INNER JOIN subcategorias AS sc ON c.categoriaID = sc.categoriaID '
                . 'INNER JOIN marcas AS m ON a.marcaID = m.marcaID',
                'conditions' => 'anuncioID = ' . $anuncioID
            );
        } else {
            $array = array(
                'fields' => '*',
                'tables' => 'anuncios AS a',
                'join' => 'usuarios AS u ON a.usuarioID = u.usuarioID '
                . 'INNER JOIN categorias AS c ON a.categoriaID = c.categoriaID '
                . 'INNER JOIN subcategorias AS sc ON c.categoriaID = sc.categoriaID '
                . 'INNER JOIN marcas AS m ON a.marcaID = m.marcaID',
                'conditions' => 'anuncioID = ' . $anuncioID . ' '
                . 'AND estadoPlan = 1 '
                . 'AND estadoModeracion = "Aprobado" '
                . 'AND estadoPublicacion = 1'
            );
        }

        return $this->db->select($array, true);
    }

    /**
     * CU30: Listar anuncios Por Usuario
     * 
     * @param int $usuarioID Identificador de anuncios
     */
    function listarPorUsuario($usuarioID) {

        $array = array(
            'fields' => '*',
            'tables' => 'anuncios AS a',
            'join' => 'marcas AS m ON a.marcaID = m.marcaID',
            'conditions' => 'estadoPlan = 1 '
                . 'AND estadoModeracion = "Aprobado" '
                . 'AND estadoPublicacion = 1 AND usuarioID = ' . $usuarioID,
            'order' => 'fechaCreacion'
        );

        return $this->db->select($array);
    }

    /**
     * CU104: Listar Anuncios Pendientes
     */
    function listarPendientes() {

        $array = array(
            'fields' => '*',
            'tables' => 'anuncios as a',
            'join' => 'usuarios AS u ON a.usuarioID = u.usuarioID '
            . 'INNER JOIN categorias AS c ON a.categoriaID = c.categoriaID ',
            'conditions' => 'estadoModeracion = "Pendiente"',
            'order' => 'fechaCreacion'
        );

        return $this->db->select($array);
    }

    /**
     * CU31: Cambiar Estado Anuncio
     * @param array $estado Objeto con datos a cambiar
     */
    function cambiarEstado($estado) {
        
    }

    /**
     * CU61: Listar Anuncio por Categoría
     * @param int $categoriaID Identificador de la Categoría
     */
    function listarPorCategoria($categoriaID) {

        $array = array(
            'fields' => 'anuncioID, tipoUsuario, anoFabricacion, tituloPublicacion, precioVentaArriendo, '
            . 'modeloMaquinaria, pais, ciudad, imagenPrincipal, comentarioAnuncio, nombreMarca, tipoMoneda ',
            'tables' => 'anuncios AS a',
            'join' => 'usuarios AS u ON a.usuarioID = u.usuarioID '
            . 'INNER JOIN marcas AS m ON a.marcaID = m.marcaID ',
            'conditions' => 'estadoPlan = 1 '
            . 'AND estadoModeracion = "Aprobado" '
            . 'AND estadoPublicacion = 1 '
            . 'AND categoriaID = ' . $categoriaID
        );

        return $this->db->select($array);
    }

    /**
     * CU78: Listar Anuncio por Marca
     * 
     * @param int $marcaID Identificador de la Marca
     * @return Object Array con anuncios filtrados por Marca
     */
    function listarporMarca($marcaID) {

        $array = array(
            'fields' => 'anuncioID, tipoUsuario, anoFabricacion, tituloPublicacion, precioVentaArriendo, '
            . 'modeloMaquinaria, pais, ciudad, imagenPrincipal, comentarioAnuncio, nombreMarca, tipoMoneda ',
            'tables' => 'anuncios AS a',
            'join' => 'usuarios AS u ON a.usuarioID = u.usuarioID '
            . 'INNER JOIN marcas AS m ON a.marcaID = m.marcaID ',
            'conditions' => 'a.estadoPlan = 1 '
            . 'AND estadoModeracion = "Aprobado" '
            . 'AND estadoPublicacion = 1 '
            . 'AND m.marcaID = ' . $marcaID
        );

        return $this->db->select($array);
    }

    /**
     * CU29: Listar anuncios de Usuario
     * 
     * @param int $usuarioID Identificador del Usuario
     */
    function misanuncios($usuarioID) {

        $array = array(
            'fields' => '*',
            'tables' => 'anuncios AS a',
            'join' => 'categorias AS c ON a.categoriaID = c.categoriaID',
            'conditions' => 'usuarioID = ' . $usuarioID,
            'order' => 'fechaCreacion'
        );

        return $this->db->select($array);
    }

    /**
     * CU102: Contar Anuncios Activos de Usuario
     * 
     * @param int $usuarioID Identificador del Usuario
     * @return int contador
     */
    function cuentaAnunciosUsuario($usuarioID) {
        $array = array(
            'fields' => 'count(*) as count',
            'tables' => 'anuncios',
            'conditions' => 'usuarioID = ' . $usuarioID . ' '
            . 'AND estadoPublicacion = 1',
        );

        return $this->db->select($array, true);
    }

}
