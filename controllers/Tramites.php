<?php

require './models/UnidadesModel.php';
require LIBS . 'sphinxapi.php';

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Tramites
 *
 * @author Ruth Escobar A.
 */
class Tramites extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render_404();
    }

    function ver($nombre = null) {

        if ($nombre == null) {
            $this->view->render_404();
        } else {
            $tramite = $this->model->traePorNombre($nombre);

            if (empty($tramite)) {
                header('location: ' . URL . 'Paginas/ver/404');
            } else {
                $um = new UnidadesModel();

                $this->view->unidad = $um->trae($tramite->unidadID);
                $this->view->sucursales = $this->model->traeSucursalesTramite($tramite->tramiteID);
                $this->view->categorias = $this->model->traeCategoriasPorTramite($tramite->tramiteID);
                $this->view->tramite = $tramite;

                $canales = unserialize($tramite->canalesAtencionTramite);
                $this->view->canales = $canales['canales'];

                //Guardar Trámite Frecuente
                $tramitesFrecuentes['tramiteID'] = $tramite->tramiteID;
                $tramitesFrecuentes['tituloTramite'] = $tramite->tituloTramite;
                $tramitesFrecuentes['tituloUrlTramite'] = $tramite->tituloUrlTramite;
                $tramitesFrecuentes['ipTramiteFrecuente'] = $_SERVER['REMOTE_ADDR'];

                $this->model->guardaTramiteFrecuente($tramitesFrecuentes);
            }
        }

        $this->view->render($this, 'ver');
    }

    /**
     * Buscador Sphinx Search
     */
    function buscar() {

        //trile //trile.2016    [a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]+
        $variable = addslashes(filter_input(INPUT_POST, 'buscar'));
         $criterios= preg_replace("/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+/", " ", $variable);
        //Guardar búsquedas
        $busqueda['campoBusqueda'] = $criterios;
        $busqueda['fechaBusqueda'] = date("Y-m-d H:i:s");
        $busqueda['ipBusqueda'] = $_SERVER['REMOTE_ADDR'];

        $this->model->guardaBusqueda($busqueda);
       
        $res_tramites   = $this->model->buscarporTituloPalabra($criterios);
        $res_direcciones= $this->model->buscarporDireccionPalabra($criterios);
        $res_unidades   = $this->model->buscarporUnidadPalabra($criterios);
        $res_sucursales = $this->model->buscarporSucursalPalabra($criterios);
       


        /* 
            $client = new SphinxClient();
            $client->SetServer(IP_SPHINX, 9312);

            $res_tramites = $client->Query($criterios, 'busqueda_general');
            $res_direcciones = $client->Query($criterios, 'busqueda_direcciones');
            $res_unidades   = $client->Query($criterios, 'busqueda_unidades');
            $res_sucursales = $client->Query($criterios, 'busqueda_sucursales');
             
            

            if (!$res_tramites) {
                $this->view->err = $client->GetLastError();
            } else {
                if (empty($res_tramites['matches']) && empty($res_direcciones['matches']) && empty($res_unidades['matches']) && empty($res_sucursales['matches'])) {
                    $this->view->search = $criterios;
                } else {
                    $this->view->tramites = (!empty($res_tramites['matches'])) ? $res_tramites['matches'] : null;
                    $this->view->res_direcciones = (!empty($res_direcciones['matches'])) ? $res_direcciones['matches'] : null;
                    $this->view->res_unidades = (!empty($res_unidades['matches'])) ? $res_unidades['matches'] : null;
                    $this->view->res_sucursales = (!empty($res_sucursales['matches'])) ? $res_sucursales['matches'] : null;
                }
            }
        */
        if (!$res_tramites) {
            $this->view->search = $criterios;
        } else {
            if (empty($res_tramites) && empty($res_direcciones) && empty($res_unidades) && empty($res_sucursales)) {
                $this->view->search = $criterios;
            } else {
                $this->view->tramites = (!empty($res_tramites)) ? $res_tramites : null;
                $this->view->res_direcciones = (!empty($res_direcciones)) ? $res_direcciones : null;
                $this->view->res_unidades = (!empty($res_unidades)) ? $res_unidades : null;
                $this->view->res_sucursales = (!empty($res_sucursales)) ? $res_sucursales : null;
            }
        }

        $this->view->render($this, 'listar-sphinx');
    }

    function listar() {

        $tramites = $this->model->listarTodos();

        if (empty($tramites)) {
            $this->view->search = "No existen Trámites disponibles.";
        } else {
            $this->view->tramites = $tramites;
        }

        $this->view->render($this, 'listar');
    }

    function direccion($direccionID = null) {

        if ($direccionID == null) {
            header('location: ' . URL . 'Paginas/ver/404');
        } else {
            $tramites = $this->model->listarPorDireccion($direccionID);

            if (empty($tramites)) {
                $this->view->search = "esta Direccíon";
                $this->view->titulo = "Dirección";
                $this->view->nombre = "";
            } else {
                $this->view->titulo = "Dirección";
                $this->view->nombre = $tramites['0']['departamento'];
                $this->view->tramites = $tramites;
            }
        }

        $this->view->render($this, 'listar');
    }

    function unidad($unidadID = null) {

        if ($unidadID == null) {
            header('location: ' . URL . 'Paginas/ver/404');
        } else {

            $tramites = $this->model->listarPorUnidad($unidadID);

            if (empty($tramites)) {
                $this->view->titulo = "Unidad";
                $this->view->nombre = $tramites['0']['departamento'];;
                $this->view->search = "esta Unidad";
            } else {
                $this->view->titulo = "Unidad";
                $this->view->nombre = $tramites['0']['departamento'];;
                $this->view->tramites = $tramites;
            }

            $this->view->render($this, 'listar');
        }
    }

    function sucursal($sucursalID) {

        if ($sucursalID == null) {
            $this->view->err = "Debe seleccionar una Sucursal para consultar sus trámites.";
        } else {

            $tramites = $this->model->listarPorSucursal($sucursalID);

            if (empty($tramites)) {
                $this->view->search = "esta Sucursal";
                $this->view->titulo = "";
                $this->view->nombre = "esta Sucursal";
            } else {
                $this->view->titulo = "Sucursal";
                $this->view->nombre = $tramites['0']['departamento'];
                $this->view->tramites = $tramites;
            }
        }

        $this->view->render($this, 'listar');
    }

    function categoria($categoriaID) {

        if ($categoriaID == null) {
            header('location: ' . URL . 'Paginas/ver/404');
        } else {

            $tramites = $this->model->listarPorCategoria($categoriaID);

            if (empty($tramites)) {
                $this->view->search = "esta Categoría";
                $this->view->titulo = "Categorías";
                $this->view->nombre = "esta categoría.";
            } else {
                $this->view->titulo = "Categorías";
                $this->view->nombre = "esta categoría.";
                $this->view->tramites = $tramites;
            }
        }

        $this->view->render($this, 'listar');
    }

    function destacados() {

        $tramites = $this->model->listarDestacados();

        if (empty($tramites)) {
            $this->view->search = "Trámites destacados";
        } else {
            $this->view->tramites = $tramites;
        }

        $this->view->render($this, 'listar');
    }

    function nuevos() {

        $tramites = $this->model->listarNuevos();

        if (empty($tramites)) {
            $this->view->search = "Trámites Nuevos.";
        } else {
            $this->view->tramites = $tramites;
        }

        $this->view->render($this, 'listar');
    }

    function frecuentes() {

        $tramites = $this->model->listarFrecuentes();

        if (empty($tramites)) {
            $this->view->search = "Trámites Frecuentes";
        } else {
            $this->view->tramites = $tramites;
        }

        $this->view->render($this, 'listar');
    }

    function votar() {

        if ($_POST) {

            $tramiteID = filter_input(INPUT_POST, 'id_tramite');
            $tipoVoto = filter_input(INPUT_POST, 'tipo');
            $option = filter_input(INPUT_POST, 'option');
            $usuarioID = Session::getValue('U_ID');

            $array = array($tramiteID, $tipoVoto);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                if ($this->comprobarVotoUsuario($tramiteID, $usuarioID, $tipoVoto)) {

                    $voto['tramiteID'] = $tramiteID;
                    $voto['usuarioID'] = Session::getValue('U_ID');
                    $voto['tipoVoto'] = $tipoVoto;
                    $voto['detalleVoto'] = $option;
                    $voto['fechaCreacionVoto'] = date("Y-m-d H:i:s");

                    $response = $this->model->creaVoto($voto);

                    if ($response == 'ok') {
                        $this->view->msg = 'Votación creada con éxito. Gracias por participar.';
                    } else {
                        $this->view->err = $response . ': Ocurrio un problema con su votación. Favor inténtelo mas tarde.';
                    }
                } else {
                    $this->view->err = 'Nuestros sistemas indican que usted ya votó por este trámite.';
                }
            }
        }

        if ($tramiteID != null) {
            $tramite = $this->model->traePorID($tramiteID);
            $nombreTramite = $tramite->tituloUrlTramite;
            $this->ver($nombreTramite);
        } else {
            header('location: ' . URL . 'Paginas/ver/404');
        }
    }

    function comprobarVotoUsuario($tramiteID, $usuarioID, $tipoVoto) {

        $voto = $this->model->comprobarVotoUsuario($tramiteID, $usuarioID, $tipoVoto);

        if (empty($voto)) {
            $isValido = true;
        } else {
            $isValido = false;
        }

        return $isValido;
    }

    function listarPorPerfil($edad, $genero) {
        return $this->model->listarPorPerfil($edad, $genero);
    }

    function listarPorParticipacion($usuarioID) {
        return $this->model->listarPorParticipacion($usuarioID);
    }

    function listarMasVotados() {
        return $this->model->listarMasVotados();
    }

    function listarFrecuentes() {
        return $this->model->listarFrecuentes();
    }

    function listarNuevos() {
        return $this->model->listarNuevos();
    }

    function orden() {
        $this->view->tramites = $this->model->listarTodos();
        $this->view->render($this, 'alfabetico');
    }

    function descargar($titulo = null) {

        if ($titulo == null) {
            header('location: ' . URL . 'Paginas/ver/404');
        } else {
            $array = explode('|', $titulo);

            $titulo = $array[0];
            $tramiteID = $array[1];

            $url = DOCUMENTOS . $tramiteID . "/" . $titulo;
            $path = $url;
            $type = '';

            if (is_file($path)) {

                $size = filesize($path);

                if (function_exists('mime_content_type')) {
                    $type = mime_content_type($path);
                } else if (function_exists('finfo_file')) {
                    $info = finfo_open(FILEINFO_MIME);
                    $type = finfo_file($info, $path);
                    finfo_close($info);
                }
                if ($type == '') {
                    $type = "application/force-download";
                }
                // Definir headers
                header("Content-Type: $type");
                header("Content-Disposition: attachment; filename=$titulo");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: " . $size);
                // Descargar archivo
                readfile($path);
            } else {
                echo "<br>El archivo no existe....<br>" . $path . "<br>";
            }
        }
    }

}
