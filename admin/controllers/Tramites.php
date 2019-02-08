<?php

require './models/DireccionesModel.php';
require './models/UnidadesModel.php';
require './models/CategoriasModel.php';
require './models/SucursalesModel.php';

/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */

/**
 * Description of Tramites
 *
 * @author Ruth Escobar A.
 */
class Tramites extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->propMenu = "nav-expanded nav-active";
    }

    function error($error) {
        $msg = null;

        switch (true) {
            case strpos($error, 'IDX_Titulo_Url'):
                $msg = "El nombre del Trámite ya existe. ";
                break;
            default:
                $msg = $error;
                break;
        }
        return $msg;
    }

    function crear() {

        if ($_POST) {

            $direccionID = filter_input(INPUT_POST, 'direccion');
            $unidadID = filter_input(INPUT_POST, 'unidad');
            $tipoTramite = filter_input(INPUT_POST, 'tipo_tramite');
            $tituloTramite = filter_input(INPUT_POST, 'titulo');
            $descripcionBreveTramite = filter_input(INPUT_POST, 'descripcion_breve');
            $descripcionTramite = filter_input(INPUT_POST, 'descripcion');
            $requisitosTramite = filter_input(INPUT_POST, 'requisitos');
            $documentacionDetalleTramite = filter_input(INPUT_POST, 'documentos');
            $destinadoATramite = filter_input(INPUT_POST, 'dirigido');
            $generoTramite = filter_input(INPUT_POST, 'genero');
            $rangoEdadTramite = filter_input(INPUT_POST, 'rango');
            $costoTramite = filter_input(INPUT_POST, 'costo');
            $duracionTramite = filter_input(INPUT_POST, 'entrega');
            $vigenciaTramite = filter_input(INPUT_POST, 'vigencia');

            $hrAtencionMananaIni = filter_input(INPUT_POST, 'manana_ini');
            $hrAtencionMananaFin = filter_input(INPUT_POST, 'manana_fin');
            $hrAtencionTardeIni = filter_input(INPUT_POST, 'tarde_ini');
            $hrAtencionTardeFin = filter_input(INPUT_POST, 'tarde_fin');

            $telefono1ContactoTramite = filter_input(INPUT_POST, 'telefono1');
            $telefono2ContactoTramite = filter_input(INPUT_POST, 'telefono2');
            $telefono3ContactoTramite = filter_input(INPUT_POST, 'telefono3');
            $telefono4ContactoTramite = filter_input(INPUT_POST, 'telefono4');

            $emailContactoTramite = filter_input(INPUT_POST, 'email');

            $destacadoTramite = filter_input(INPUT_POST, 'destacado');
            $frecuenteTramite = filter_input(INPUT_POST, 'frecuente');
            $estadoTramite = filter_input(INPUT_POST, 'estado');

            $destacado = ($destacadoTramite) ? '1' : '0';
            $frecuente = ($frecuenteTramite) ? '1' : '0';
            $estado = ($estadoTramite) ? '1' : '0';

            $tagTramites = filter_input(INPUT_POST, 'tag');

            $plazoInicioTramite = filter_input(INPUT_POST, 'fch_inicio');
            $plazoFinTramite = filter_input(INPUT_POST, 'fch_fin');

            $urlExternaTramite = filter_input(INPUT_POST, 'url_externa');
            $contenidoMultimediaTramite = filter_input(INPUT_POST, 'multimedia');

            $canalesAtencionTramite = filter_input_array(INPUT_POST, array('canales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );
            $diasDeAtencionTramite = filter_input_array(INPUT_POST, array('dias' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            //categorias
            $categorias = filter_input_array(INPUT_POST, array('categorias' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            //sucursales
            $sucursales = filter_input_array(INPUT_POST, array('sucursales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );
			
			// Horarios y Dias de Atención //
			$lun_man_desde = filter_input(INPUT_POST, 'lun_man_desde');
			$mar_man_desde = filter_input(INPUT_POST, 'mar_man_desde');
			$mier_man_desde = filter_input(INPUT_POST, 'mier_man_desde');
			$juev_man_desde = filter_input(INPUT_POST, 'juev_man_desde');
			$vier_man_desde = filter_input(INPUT_POST, 'vier_man_desde');
			$sab_man_desde = filter_input(INPUT_POST, 'sab_man_desde');
			$dom_man_desde = filter_input(INPUT_POST, 'dom_man_desde');
			
			$lun_man_hasta = filter_input(INPUT_POST, 'lun_man_hasta');
			$mar_man_hasta = filter_input(INPUT_POST, 'mar_man_hasta');
			$mier_man_hasta = filter_input(INPUT_POST, 'mier_man_hasta');
			$juev_man_hasta = filter_input(INPUT_POST, 'juev_man_hasta');
			$vier_man_hasta = filter_input(INPUT_POST, 'vier_man_hasta');
			$sab_man_hasta = filter_input(INPUT_POST, 'sab_man_hasta');
			$dom_man_hasta = filter_input(INPUT_POST, 'dom_man_hasta');
			
			//Tarde
			$lun_tar_desde = filter_input(INPUT_POST, 'lun_tar_desde');
			$mar_tar_desde = filter_input(INPUT_POST, 'mar_tar_desde');
			$mier_tar_desde = filter_input(INPUT_POST, 'mier_tar_desde');
			$juev_tar_desde = filter_input(INPUT_POST, 'juev_tar_desde');
			$vier_tar_desde = filter_input(INPUT_POST, 'vier_tar_desde');
			$sab_tar_desde = filter_input(INPUT_POST, 'sab_tar_desde');
			$dom_tar_desde = filter_input(INPUT_POST, 'dom_tar_desde');
			
			$lun_tar_hasta = filter_input(INPUT_POST, 'lun_tar_hasta');
			$mar_tar_hasta = filter_input(INPUT_POST, 'mar_tar_hasta');
			$mier_tar_hasta = filter_input(INPUT_POST, 'mier_tar_hasta');
			$juev_tar_hasta = filter_input(INPUT_POST, 'juev_tar_hasta');
			$vier_tar_hasta = filter_input(INPUT_POST, 'vier_tar_hasta');
			$sab_tar_hasta = filter_input(INPUT_POST, 'sab_tar_hasta');
			$dom_tar_hasta = filter_input(INPUT_POST, 'dom_tar_hasta');
			
			$horarios = array(
				"Lunes" => array(
					 "lun_man_desde" => $lun_man_desde,
					 "lun_man_hasta" => $lun_man_hasta,
					 "lun_tar_desde" => $lun_tar_desde,
					 "lun_tar_hasta" => $lun_tar_hasta
					 ),
				"Martes" => array(
					 "mar_man_desde" => $mar_man_desde,
					 "mar_man_hasta" => $mar_man_hasta,
					 "mar_tar_desde" => $mar_tar_desde,
					 "mar_tar_hasta" => $mar_tar_hasta
					 ),
				"Miercoles" => array(
					 "mier_man_desde" => $mier_man_desde,
					 "mier_man_hasta" => $mier_man_hasta,
					 "mier_tar_desde" => $mier_tar_desde,
					 "mier_tar_hasta" => $mier_tar_hasta
					 ),
				"Jueves" => array(
					 "juev_man_desde" => $juev_man_desde,
					 "juev_man_hasta" => $juev_man_hasta,
					 "juev_tar_desde" => $juev_tar_desde,
					 "juev_tar_hasta" => $juev_tar_hasta
					 ),
				"Viernes" => array(
					 "vier_man_desde" => $vier_man_desde,
					 "vier_man_hasta" => $vier_man_hasta,
					 "vier_tar_desde" => $vier_tar_desde,
					 "vier_tar_hasta" => $vier_tar_hasta
					 ),
				"Sábado" => array(
					 "sab_man_desde" => $sab_man_desde,
					 "sab_man_hasta" => $sab_man_hasta,
					 "sab_tar_desde" => $sab_tar_desde,
					 "sab_tar_hasta" => $sab_tar_hasta
					 ),
				"Domingo" => array(
					 "dom_man_desde" => $dom_man_desde,
					 "dom_man_hasta" => $dom_man_hasta,
					 "dom_tar_desde" => $dom_tar_desde,
					 "dom_tar_hasta" => $dom_tar_hasta
					 )
				);
						
			//////////////////////

            $array = array($direccionID, $tipoTramite, $tituloTramite);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $tituloTramite = addslashes(trim($tituloTramite));

                $tramite['direccionID'] = $direccionID;
                $tramite['unidadID'] = ($unidadID == null) ? 48 : $unidadID;
                $tramite['tipoTramite'] = $tipoTramite;
                $tramite['canalesAtencionTramite'] = serialize($canalesAtencionTramite);
                $tramite['urlExternaTramite'] = $urlExternaTramite;
                $tramite['tituloUrlTramite'] = $this->seo_url($tituloTramite);
                $tramite['tituloTramite'] = $tituloTramite;
                $tramite['descripcionTramite'] = $descripcionTramite;
                $tramite['descripcionBreveTramite'] = $descripcionBreveTramite;
                $tramite['plazoInicioTramite'] = ($plazoInicioTramite != null) ? $this->dateFormat_mysql($plazoInicioTramite) : null;
                $tramite['plazoFinTramite'] = ($plazoFinTramite != null) ? $this->dateFormat_mysql($plazoFinTramite) : null;
                $tramite['contenidoMultimediaTramite'] = $contenidoMultimediaTramite;
                $tramite['destinadoATramite'] = $destinadoATramite;
                $tramite['rangoEdadTramite'] = $rangoEdadTramite;
                $tramite['generoTramite'] = $generoTramite;
                $tramite['requisitosTramite'] = $requisitosTramite;
                $tramite['documentacionDetalleTramite'] = $documentacionDetalleTramite;
                $tramite['costoTramite'] = $costoTramite;
                $tramite['duracionTramite'] = $duracionTramite;
                $tramite['vigenciaTramite'] = $vigenciaTramite;

                $tramite['telefono1ContactoTramite'] = $telefono1ContactoTramite;
                $tramite['telefono2ContactoTramite'] = $telefono2ContactoTramite;
                $tramite['telefono3ContactoTramite'] = $telefono3ContactoTramite;
                $tramite['telefono4ContactoTramite'] = $telefono4ContactoTramite;

                $tramite['emailContactoTramite'] = $emailContactoTramite;
                $tramite['diasDeAtencionTramite'] = serialize($diasDeAtencionTramite);

                //$tramite['horariosAtencionMananaTramite'] = $horariosAtencionMananaTramite;
                //$tramite['horariosAtencionTardeTramite'] = $horariosAtencionTardeTramite;

                $tramite['hrAtencionMananaIni'] = $hrAtencionMananaIni;
                $tramite['hrAtencionMananaFin'] = $hrAtencionMananaFin;
                $tramite['hrAtencionTardeIni'] = $hrAtencionTardeIni;
                $tramite['hrAtencionTardeFin'] = $hrAtencionTardeFin;

                $tramite['destacadoTramite'] = $destacado;
                $tramite['frecuenteTramite'] = $frecuente;
                $tramite['fechaCreacionTramite'] = date("Y-m-d H:i:s");
                $tramite['usuarioCreador'] = 'RARENAS';
                $tramite['ordenTramite'] = 0;
                $tramite['fechaActualizacionTramite'] = date("Y-m-d H:i:s");
                $tramite['estadoTramite'] = $estado;
                $tramite['tagTramites'] = $tagTramites;
				$tramite['horariosDiasAtencionTramite'] = serialize($horarios);

                $tramiteID = $this->model->crear($tramite);

                if ($tramiteID > 0) {

                    $categorias = $categorias['categorias'];
                    $sucursales = $sucursales['sucursales'];

                    if (!empty($categorias)) {
                        foreach ($categorias as $value) {
                            $categoria['tramiteID'] = $tramiteID;
                            $categoria['categoriaID'] = $value;
                            $rs = $this->model->crearCategoria($categoria);
                        }
                    }

                    if (!empty($sucursales)) {
                        foreach ($sucursales as $value) {
                            $sucursal['tramiteID'] = $tramiteID;
                            $sucursal['sucursalID'] = $value;
                            $rs = $this->model->crearSucursal($sucursal);
                        }
                    }

                    $this->archivoTitulos();

                    header('location: ' . URL . 'Tramites/editar/' . $tramiteID);
                } else {
                    $this->view->err = $this->error($tramiteID);
                }
            }
        }

        $this->llenaListas();
        $this->view->render($this, 'crear');
    }

    function buscar() {

        if ($_POST) {

            $tituloTramite = filter_input(INPUT_POST, 'titulo');
            $direccionID = filter_input(INPUT_POST, 'direccion');

            $array = array($tituloTramite, $direccionID);

            if ($this->allFieldNotNull($array)) {
                $this->view->warn = "Favor ingresar al menos un criterio de búsqueda.";
            } else {
                $criterios['tituloTramite'] = '%' . str_replace(' ', '%', $tituloTramite) . '%';
                $criterios['d.direccionID'] = $direccionID;

                $tramites = $this->model->buscar($criterios);

                if (empty($tramites)) {
                    $this->view->warn = "No se obtuvieron datos de la consulta.";
                } else {
                    $this->view->tramites = $tramites;
                }
            }
        }

        $dm = new DireccionesModel();
        $this->view->direcciones = $dm->listar();

        $this->view->render($this, 'buscar');
    }

    function editar($tramiteID = null) {

        if ($_POST) {

            $tramiteID = filter_input(INPUT_POST, 'id_tramite');
            $direccionID = filter_input(INPUT_POST, 'direccion');
            $unidadID = filter_input(INPUT_POST, 'unidad');
            $tipoTramite = filter_input(INPUT_POST, 'tipo_tramite');
            $tituloTramite = filter_input(INPUT_POST, 'titulo');
            $descripcionBreveTramite = filter_input(INPUT_POST, 'descripcion_breve');
            $descripcionTramite = filter_input(INPUT_POST, 'descripcion');
            $requisitosTramite = filter_input(INPUT_POST, 'requisitos');
            $documentacionDetalleTramite = filter_input(INPUT_POST, 'documentos');
            $destinadoATramite = filter_input(INPUT_POST, 'dirigido');
            $generoTramite = filter_input(INPUT_POST, 'genero');
            $rangoEdadTramite = filter_input(INPUT_POST, 'rango');
            $costoTramite = filter_input(INPUT_POST, 'costo');
            $duracionTramite = filter_input(INPUT_POST, 'entrega');
            $vigenciaTramite = filter_input(INPUT_POST, 'vigencia');

            $hrAtencionMananaIni = filter_input(INPUT_POST, 'manana_ini');
            $hrAtencionMananaFin = filter_input(INPUT_POST, 'manana_fin');
            $hrAtencionTardeIni = filter_input(INPUT_POST, 'tarde_ini');
            $hrAtencionTardeFin = filter_input(INPUT_POST, 'tarde_fin');

            $telefono1ContactoTramite = filter_input(INPUT_POST, 'telefono1');
            $telefono2ContactoTramite = filter_input(INPUT_POST, 'telefono2');
            $telefono3ContactoTramite = filter_input(INPUT_POST, 'telefono3');
            $telefono4ContactoTramite = filter_input(INPUT_POST, 'telefono4');

            $emailContactoTramite = filter_input(INPUT_POST, 'email');

            $destacadoTramite = filter_input(INPUT_POST, 'destacado');
            $frecuenteTramite = filter_input(INPUT_POST, 'frecuente');
            $estadoTramite = filter_input(INPUT_POST, 'estado');

            $destacado = ($destacadoTramite) ? '1' : '0';
            $frecuente = ($frecuenteTramite) ? '1' : '0';
            $estado = ($estadoTramite) ? '1' : '0';

            $tagTramites = filter_input(INPUT_POST, 'tag');

            $plazoInicioTramite = filter_input(INPUT_POST, 'fch_inicio');
            $plazoFinTramite = filter_input(INPUT_POST, 'fch_fin');
            $urlExternaTramite = filter_input(INPUT_POST, 'url_externa');
            $contenidoMultimediaTramite = filter_input(INPUT_POST, 'multimedia');

            $canalesAtencionTramite = filter_input_array(INPUT_POST, array('canales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );
            $diasDeAtencionTramite = filter_input_array(INPUT_POST, array('dias' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            //categorias
            $categorias = filter_input_array(INPUT_POST, array('categorias' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );

            //sucursales
            $sucursales = filter_input_array(INPUT_POST, array('sucursales' =>
                array('flags' => FILTER_REQUIRE_ARRAY)
                    )
            );
			
			
			// Horarios y Dias de Atención //
			$lun_man_desde = filter_input(INPUT_POST, 'lun_man_desde');
			$mar_man_desde = filter_input(INPUT_POST, 'mar_man_desde');
			$mier_man_desde = filter_input(INPUT_POST, 'mier_man_desde');
			$juev_man_desde = filter_input(INPUT_POST, 'juev_man_desde');
			$vier_man_desde = filter_input(INPUT_POST, 'vier_man_desde');
			$sab_man_desde = filter_input(INPUT_POST, 'sab_man_desde');
			$dom_man_desde = filter_input(INPUT_POST, 'dom_man_desde');
			
			$lun_man_hasta = filter_input(INPUT_POST, 'lun_man_hasta');
			$mar_man_hasta = filter_input(INPUT_POST, 'mar_man_hasta');
			$mier_man_hasta = filter_input(INPUT_POST, 'mier_man_hasta');
			$juev_man_hasta = filter_input(INPUT_POST, 'juev_man_hasta');
			$vier_man_hasta = filter_input(INPUT_POST, 'vier_man_hasta');
			$sab_man_hasta = filter_input(INPUT_POST, 'sab_man_hasta');
			$dom_man_hasta = filter_input(INPUT_POST, 'dom_man_hasta');
			
			//Tarde
			$lun_tar_desde = filter_input(INPUT_POST, 'lun_tar_desde');
			$mar_tar_desde = filter_input(INPUT_POST, 'mar_tar_desde');
			$mier_tar_desde = filter_input(INPUT_POST, 'mier_tar_desde');
			$juev_tar_desde = filter_input(INPUT_POST, 'juev_tar_desde');
			$vier_tar_desde = filter_input(INPUT_POST, 'vier_tar_desde');
			$sab_tar_desde = filter_input(INPUT_POST, 'sab_tar_desde');
			$dom_tar_desde = filter_input(INPUT_POST, 'dom_tar_desde');
			
			$lun_tar_hasta = filter_input(INPUT_POST, 'lun_tar_hasta');
			$mar_tar_hasta = filter_input(INPUT_POST, 'mar_tar_hasta');
			$mier_tar_hasta = filter_input(INPUT_POST, 'mier_tar_hasta');
			$juev_tar_hasta = filter_input(INPUT_POST, 'juev_tar_hasta');
			$vier_tar_hasta = filter_input(INPUT_POST, 'vier_tar_hasta');
			$sab_tar_hasta = filter_input(INPUT_POST, 'sab_tar_hasta');
			$dom_tar_hasta = filter_input(INPUT_POST, 'dom_tar_hasta');
			
			$horarios = array(
				"Lunes" => array(
					 "lun_man_desde" => $lun_man_desde,
					 "lun_man_hasta" => $lun_man_hasta,
					 "lun_tar_desde" => $lun_tar_desde,
					 "lun_tar_hasta" => $lun_tar_hasta
					 ),
				"Martes" => array(
					 "mar_man_desde" => $mar_man_desde,
					 "mar_man_hasta" => $mar_man_hasta,
					 "mar_tar_desde" => $mar_tar_desde,
					 "mar_tar_hasta" => $mar_tar_hasta
					 ),
				"Miercoles" => array(
					 "mier_man_desde" => $mier_man_desde,
					 "mier_man_hasta" => $mier_man_hasta,
					 "mier_tar_desde" => $mier_tar_desde,
					 "mier_tar_hasta" => $mier_tar_hasta
					 ),
				"Jueves" => array(
					 "juev_man_desde" => $juev_man_desde,
					 "juev_man_hasta" => $juev_man_hasta,
					 "juev_tar_desde" => $juev_tar_desde,
					 "juev_tar_hasta" => $juev_tar_hasta
					 ),
				"Viernes" => array(
					 "vier_man_desde" => $vier_man_desde,
					 "vier_man_hasta" => $vier_man_hasta,
					 "vier_tar_desde" => $vier_tar_desde,
					 "vier_tar_hasta" => $vier_tar_hasta
					 ),
				"Sábado" => array(
					 "sab_man_desde" => $sab_man_desde,
					 "sab_man_hasta" => $sab_man_hasta,
					 "sab_tar_desde" => $sab_tar_desde,
					 "sab_tar_hasta" => $sab_tar_hasta
					 ),
				"Domingo" => array(
					 "dom_man_desde" => $dom_man_desde,
					 "dom_man_hasta" => $dom_man_hasta,
					 "dom_tar_desde" => $dom_tar_desde,
					 "dom_tar_hasta" => $dom_tar_hasta
					 )
				);
			

            $array = array($direccionID, $tipoTramite, $tituloTramite);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $tituloTramite = trim($tituloTramite);

                $tramite['tramiteID'] = $tramiteID;
                $tramite['direccionID'] = $direccionID;
                $tramite['unidadID'] = ($unidadID == null) ? 48 : $unidadID;
                $tramite['tipoTramite'] = $tipoTramite;
                $tramite['canalesAtencionTramite'] = serialize($canalesAtencionTramite);
                $tramite['urlExternaTramite'] = $urlExternaTramite;
                $tramite['tituloUrlTramite'] = $this->seo_url($tituloTramite);
                $tramite['tituloTramite'] = $tituloTramite;
                $tramite['descripcionTramite'] = trim($descripcionTramite);
                $tramite['descripcionBreveTramite'] = $descripcionBreveTramite;

                $tramite['plazoInicioTramite'] = ($plazoInicioTramite != null) ? $this->dateFormat_mysql($plazoInicioTramite) : null;
                $tramite['plazoFinTramite'] = ($plazoFinTramite != null) ? $this->dateFormat_mysql($plazoFinTramite) : null;

                $tramite['contenidoMultimediaTramite'] = $contenidoMultimediaTramite;
                $tramite['destinadoATramite'] = trim($destinadoATramite);
                $tramite['rangoEdadTramite'] = $rangoEdadTramite;
                $tramite['generoTramite'] = $generoTramite;
                $tramite['requisitosTramite'] = trim($requisitosTramite);
                $tramite['documentacionDetalleTramite'] = trim($documentacionDetalleTramite);
                $tramite['costoTramite'] = $costoTramite;
                $tramite['duracionTramite'] = $duracionTramite;
                $tramite['vigenciaTramite'] = $vigenciaTramite;

                $tramite['telefono1ContactoTramite'] = $telefono1ContactoTramite;
                $tramite['telefono2ContactoTramite'] = $telefono2ContactoTramite;
                $tramite['telefono3ContactoTramite'] = $telefono3ContactoTramite;
                $tramite['telefono4ContactoTramite'] = $telefono4ContactoTramite;

                $tramite['emailContactoTramite'] = $emailContactoTramite;
                $tramite['diasDeAtencionTramite'] = serialize($diasDeAtencionTramite);

                //$tramite['horariosAtencionMananaTramite'] = $horariosAtencionMananaTramite;
                //$tramite['horariosAtencionTardeTramite'] = $horariosAtencionTardeTramite;

                $tramite['hrAtencionMananaIni'] = $hrAtencionMananaIni;
                $tramite['hrAtencionMananaFin'] = $hrAtencionMananaFin;
                $tramite['hrAtencionTardeIni'] = $hrAtencionTardeIni;
                $tramite['hrAtencionTardeFin'] = $hrAtencionTardeFin;

                $tramite['destacadoTramite'] = $destacado;
                $tramite['frecuenteTramite'] = $frecuente;
                $tramite['fechaActualizacionTramite'] = date("Y-m-d H:i:s");
                $tramite['estadoTramite'] = $estado;
                $tramite['tagTramites'] = $tagTramites;
                $tramite['horariosDiasAtencionTramite'] = serialize($horarios);
				
				$response = $this->model->editar($tramite);

                if ($response == "ok") {

                    $categorias = $categorias['categorias'];
                    $sucursales = $sucursales['sucursales'];

                    $this->eliminaSucursalesCategorias($tramiteID);

                    if (!empty($categorias)) {
                        foreach ($categorias as $value) {
                            $categoria['tramiteID'] = $tramiteID;
                            $categoria['categoriaID'] = $value;
                            $rs = $this->model->crearCategoria($categoria);
                        }
                    }

                    if (!empty($sucursales)) {
                        foreach ($sucursales as $value) {
                            $sucursal['tramiteID'] = $tramiteID;
                            $sucursal['sucursalID'] = $value;
                            $rs = $this->model->crearSucursal($sucursal);
                        }
                    }

                    $this->archivoTitulos();
                    $this->view->msg = "Trámite Modificado con éxito.";
                } else {
                    $this->view->err = $response . ': Ha ocurrido un problema con el registro.';
                }
            }
        }

        $this->trae($tramiteID);
        $this->llenaListas();
        $this->view->render($this, 'editar');
    }

    function eliminar() {

        if ($_POST) {
            $tramiteID = filter_input(INPUT_POST, 'tramite_id');

            if ($tramiteID != null) {
                $this->eliminaSucursalesCategorias($tramiteID);
                $response = $this->model->eliminar($tramiteID);

                if ($response == "ok") {
                    $this->archivoTitulos();
                    $this->view->msg = "Trámite eliminado con éxito.";
                } else {
                    $this->view->err = $response;
                }
            } else {
                header('location: ' . URL . 'Paginas/ver/404');
            }
        }

        $dm = new DireccionesModel();
        $this->view->direcciones = $dm->listar();

        $this->view->render($this, 'buscar');
    }

    function trae($tramiteID = null) {

        if ($tramiteID == null) {
            header('location: ' . URL . 'Paginas/404.php');
        } else {

            $tramite = $this->model->trae($tramiteID);

            if (empty($tramite)) {
                $this->view->info = "Trámite no encontrado o no existe. Favor revisar la información.";
            } else {

                $unidadID = $tramite->unidadID;
                if (($unidadID != null) && ($unidadID != 48)) {

                    $um = new UnidadesModel();
                    $unidad = $um->trae($unidadID);

                    $this->view->unidades = $um->listarPorDireccion($tramite->direccionID);
                    $tramite->nombreUnidad = $unidad->nombreUnidad;
                } else {
                    $tramite->nombreUnidad = "Trámite sin Unidad asociada";
                }

                $canales = unserialize($tramite->canalesAtencionTramite);
                $dias = unserialize($tramite->diasDeAtencionTramite);

                $this->view->categoriasTramites = $this->model->traeCategoriasPorTramite($tramiteID);
                $this->view->sucursalesTramites = $this->model->traeSucursalesPorTramite($tramiteID);
                $this->view->tramite = $tramite;
                $this->view->canales = (!empty($canales)) ? $canales['canales'] : null;
                $this->view->dias = (!empty($dias)) ? $dias['dias'] : null;
                $this->view->documentos = explode('|', $tramite->documentosAdjuntosTramite);
            }
        }
    }

    function llenaListas() {
        $dm = new DireccionesModel();
        $cm = new CategoriasModel();
        $sm = new SucursalesModel();

        $this->view->direcciones = $dm->listar();
        $this->view->categorias = $cm->listar();
        $this->view->sucursales = $sm->listar();
    }

    function eliminaSucursalesCategorias($tramiteID) {
        $this->model->eliminaSucursalesTramite($tramiteID);
        $this->model->eliminaCategoriasTramite($tramiteID);
    }

    function archivoTitulos() {

        $nombre_fichero = TITULOS_FIS;

        if (file_exists($nombre_fichero)) {

            $titulos = $this->model->traeTitulos();
            $str_titulos = null;

            for ($i = 0; $i < count($titulos); $i++) {
                $str_titulos .= "'" . $titulos[$i]['tituloTramite'] . "', ";
            }

            $str_titulos = substr($str_titulos, 0, -2);

            $archivo = fopen($nombre_fichero, "w");
            fwrite($archivo, $str_titulos . PHP_EOL);

            fclose($archivo);
        } else {
            echo "Error: Fichero no existe";
        }
    }

    function subirArchivo() {

        if ($_POST) {

            $tramiteID = filter_input(INPUT_POST, 'id_tramite');

            if ($tramiteID != null) {
                if ($_FILES['file']["error"] > 0) {
                    echo "Error: " . $_FILES['archivo']['error'] . "<br>";
                } else {

                    $nombre = strtolower($_FILES['file']['name']);
                    $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

                    if ($ext == 'pdf') {

                        $folder_url = './public/documentos/' . $tramiteID;

                        // Crea la carpeta si no existe
                        if (!is_dir($folder_url)) {
                            mkdir($folder_url, 0777, true);
                        }

                        $url = $folder_url . '/' . $nombre;

                        if (file_exists($url)) {
                            $this->view->err = "El nombre de archivo ya existe.  Favor verificar.";
                        } else {

                            if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {

                                //cuenta archivos en carpeta
                                $data['tramiteID'] = $tramiteID;
                                $data['documentosAdjuntosTramite'] = $this->traeDocumentosString($tramiteID);

                                $response = $this->model->editar($data);

                                if ($response == "ok") {
                                    $this->view->msg = "Proceso realizado con éxito.";
                                } else {
                                    $this->view->err = $response;
                                }
                            } else {
                                $this->view->err = $url . "<br>Problemas al mover el archivo.";
                            }
                        }
                    } else {
                        $this->view->err = "El formato de documento ingresado, no es permitido.";
                    }
                }

                $this->trae($tramiteID);
                $this->llenaListas();
                $this->view->render($this, 'editar');
            } else {
                header('location: ' . URL . 'Paginas/ver/404');
            }
        } else {
            header('location: ' . URL . 'Paginas/ver/404');
        }
    }
	
	function eliminarArchivo() {

        if ($_POST) {

            $tramiteID = filter_input(INPUT_POST, 'id_tramite');
            $nombre = filter_input(INPUT_POST, 'nombre');

            if ($tramiteID != null) {

                        $folder_url = './public/documentos/' . $tramiteID;
                        $url = $folder_url . '/' . $nombre;

                        if (!file_exists($url)) {
                            $this->view->err = "El archivo a eliminar no existe.";
                        } else {
							unlink($url);
                                //cuenta archivos en carpeta
                            $data['tramiteID'] = $tramiteID;
                            $data['documentosAdjuntosTramite'] = $this->traeDocumentosString($tramiteID);

                            $response = $this->model->editar($data);

                            if ($response == "ok") {
                                $this->view->msg = "Eliminación realizada con éxito.";
                            } else {
                                $this->view->err = $response;
                            }
						}

						$this->trae($tramiteID);
						$this->llenaListas();
						$this->view->render($this, 'editar');
            }else{
				$this->view->err = "Favor seleccionar un trámite.";
			}
        } else {
            header('location: ' . URL . 'Paginas/ver/404');
        }
    }

    function traeDocumentosString($tramiteID) {

        $directorio = opendir("./public/documentos/" . $tramiteID);
        $archivos = null;

        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                $archivos .= $archivo . "|";
            }
        }

        $str_archivos = substr($archivos, 0, -1);

        return $str_archivos;
    }

    function destacar() {

        if ($_POST) {
            $tramiteID = filter_input(INPUT_POST, 'id_tramite');

            if ($tramiteID == null) {
                $this->view->err = "Se debe seleccionar un trámite para poder destacar.";
            } else {

                $tramite['tramiteID'] = $tramiteID;
                $tramite['destacadoTramite'] = '1';

                $response = $this->model->editar($tramite);

                if ($response === "ok") {
                    $this->view->msg = "Tramite destacado con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->verDestacados();
    }

    function no_destacar() {

        if ($_POST) {
            $tramiteID = filter_input(INPUT_POST, 'id_tramite');

            if ($tramiteID == null) {
                $this->view->err = "Se debe seleccionar un trámite para poder destacar.";
            } else {

                $tramite['tramiteID'] = $tramiteID;
                $tramite['destacadoTramite'] = '0';

                $response = $this->model->editar($tramite);

                if ($response === "ok") {
                    $this->view->msg = "Tramite destacado con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->verDestacados();
    }

    function ordenar() {

        if ($_POST) {
            $tramiteID = filter_input(INPUT_POST, 'id_tramite');
            $ordenTramite = filter_input(INPUT_POST, 'orden');

            if (($tramiteID == null) || ($ordenTramite == null)) {
                $this->view->err = "El trámite o número de orden no pueden ser nulos";
            } else {

                $tramite['tramiteID'] = $tramiteID;
                $tramite['ordenTramite'] = $ordenTramite;

                $response = $this->model->editar($tramite);

                if ($response === "ok") {
                    $this->view->msg = "Tramite destacado con éxito.";
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }
        
        $this->verDestacados();
    }

    function verDestacados() {
        $this->view->tramites = $this->model->listarTodos();
        $this->view->tramites_frec = $this->model->listarDestacados();
        $this->view->render($this, 'destacar');
    }

//    function descargar($info) {
//
//        if ($info != null) {
//
//            $array = explode("|", $info);
//
//            $nombreArchivo = $array[0];
//            $planPublicidadID = $array[1];
//
//            $url = DOCS . "publicidad/" . $planPublicidadID . "/" . $nombreArchivo;
//            $path = $url;
//            $type = '';
//            $arrayURL = explode("/", $url);
//            $nombre = array_pop($arrayURL);
//
//            if (is_file($path)) {
//
//                $size = filesize($path);
//
//                if (function_exists('mime_content_type')) {
//                    $type = mime_content_type($path);
//                } else if (function_exists('finfo_file')) {
//                    $info = finfo_open(FILEINFO_MIME);
//                    $type = finfo_file($info, $path);
//                    finfo_close($info);
//                }
//                if ($type == '') {
//                    $type = "application/force-download";
//                }
//                // Definir headers
//                header("Content-Type: $type");
//                header("Content-Disposition: attachment; filename=$nombre");
//                header("Content-Transfer-Encoding: binary");
//                header("Content-Length: " . $size);
//                // Descargar archivo
//                readfile($path);
//            } else {
//            	echo $planPublicidadID;
//            	echo "<br>".$url;
//                echo "<br>El archivo no existe....<br>" . $path . "<br>";
//            }
//        }
//    }

    /*
      function ver($nombre = null) {

      if ($nombre == null) {
      $this->view->err = "Debe seleccionar un Trámite para su visualización.";
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
      }
      }

      $this->view->render($this, 'ver');
      }

      function buscar() {

      if ($_POST) {
      $criterios = filter_input(INPUT_POST, 'buscar');

      if ($criterios == null) {
      $this->view->err = "Favor ingresar un criterio de búsqueda.";
      } else {

      $tramites = $this->model->buscarporTitulo($criterios);

      if (empty($tramites)) {
      //$tramitesPalabras = $this->model->buscarporTituloPalabra(str_replace(' ', '%', $criterios));
      $tramitesTag = $this->model->buscarporTag(str_replace(' ', '%', $criterios));

      if (empty($tramitesTag)) {
      $this->view->warn = "No existen resultados para su búsqueda.";
      } else {
      //$this->view->tramitesPalabras = $tramitesPalabras;
      $this->view->tramitesTag = $tramitesTag;
      }
      } else {
      $this->view->tramites = $tramites;
      }
      }
      }

      $this->view->titulo = "búsqueda general";
      $this->view->render($this, 'listar');
      }

      function listar() {

      $tramites = $this->model->listarTodos();

      if (empty($tramites)) {
      $this->view->warn = "No existen Trámites disponibles.";
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
      $this->view->err = "No existen trámites para esta Direccíon.";
      } else {
      $this->view->titulo = "Dirección";
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
      $this->view->err = "No existen trámites para esta Unidad.";
      } else {
      $this->view->titulo = "Unidad";
      $this->view->tramites = $tramites;
      }
      }

      $this->view->render($this, 'listar');
      }

      function sucursal($sucursalID) {

      if ($sucursalID == null) {
      $this->view->err = "Debe seleccionar una Sucursal para consultar sus trámites.";
      } else {

      $tramites = $this->model->listarPorSucursal($sucursalID);

      if (empty($tramites)) {
      $this->view->err = "No existen trámites para esta Sucursal.";
      } else {
      $this->view->titulo = "Sucursal";
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
      $this->view->err = "No existen trámites para esta Categoría.";
      } else {
      $this->view->titulo = "Categorías";
      $this->view->tramites = $tramites;
      }
      }

      $this->view->render($this, 'listar');
      }

      function destacados() {

      $tramites = $this->model->listarDestacados();

      if (empty($tramites)) {
      $this->view->err = "No existen Trámites destacados.";
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
     */
}
