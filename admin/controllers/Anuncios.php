<?php

/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Grupo Desarrollo Multimedia
 */

/**
 * Description of Anuncios
 *
 * @author Ruth Escobar
 */
require './models/PlanesModel.php';
require './models/MensajesModel.php';

class Anuncios extends Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * CU24: Crear Anuncio
     */
    function crear() {

        if ($_POST) {

            $categoriaID = filter_input(INPUT_POST, 'categoriaID');
            $subCategoriaID = filter_input(INPUT_POST, 'subCategoriaID');
            $marcaID = filter_input(INPUT_POST, 'marcaID');
            $tituloPublicacion = ucwords(strtolower(filter_input(INPUT_POST, 'tituloPublicacion')));
            $pais = filter_input(INPUT_POST, 'pais');
            $ciudad = ucwords(strtolower(filter_input(INPUT_POST, 'ciudad')));
            $anoFabricacion = filter_input(INPUT_POST, 'anoFabricacion');
            $modeloMaquinaria = ucwords(strtolower(filter_input(INPUT_POST, 'modeloMaquinaria')));
            $kilometraje = filter_input(INPUT_POST, 'kilometraje');
            $tipoKilometraje = filter_input(INPUT_POST, 'tipoKilometraje');
            $tipoCombustible = filter_input(INPUT_POST, 'tipoCombustible');
            $estadoMaquinaria = filter_input(INPUT_POST, 'estadoMaquinaria');
            $precioVentaArriendo = filter_input(INPUT_POST, 'precioVentaArriendo');
            $tipoMoneda = filter_input(INPUT_POST, 'tipoMoneda');
            $tipoTransaccion = filter_input(INPUT_POST, 'tipoTransaccion');
            $unicoDueno = filter_input(INPUT_POST, 'unicoDueno');
            $comentarioAnuncio = filter_input(INPUT_POST, 'comentarioAnuncio');
			
			$cantidadCaract = strlen($comentarioAnuncio);
			
			if($cantidadCaract > 350){
				$this->view->warn = "La descripción del anuncio no puede superar los 350 caracteres.";
				$this->view->render_admin($this, 'crear');
			}else{

				$array = array($categoriaID, $subCategoriaID, $marcaID, $tituloPublicacion,
					$pais, $ciudad, $anoFabricacion, $kilometraje, $tipoTransaccion, $comentarioAnuncio);

				if ($this->fieldRequired($array)) {
					$this->view->warn = "Favor revisar campos requeridos.";
				} else {

					$data["categoriaID"] = $categoriaID;
					$data["subCategoriaID"] = $subCategoriaID;
					$data["usuarioID"] = Session::getValue('U_ID');
					$data["marcaID"] = $marcaID;
					$data["tituloPublicacion"] = $tituloPublicacion;
					$data["pais"] = $pais;
					$data["ciudad"] = $ciudad;
					$data["anoFabricacion"] = $anoFabricacion;
					$data["modeloMaquinaria"] = $modeloMaquinaria;
					$data["kilometraje"] = $kilometraje;
					$data["tipoKilometraje"] = $tipoKilometraje;
					$data["tipoCombustible"] = $tipoCombustible;
					$data["estadoMaquinaria"] = $estadoMaquinaria;
					$data["precioVentaArriendo"] = $precioVentaArriendo;
					$data["tipoMoneda"] = $tipoMoneda;
					$data["tipoTransaccion"] = $tipoTransaccion;
					$data["unicoDueno"] = $unicoDueno;
					$data["comentarioAnuncio"] = $comentarioAnuncio;
					$data["fechaCreacion"] = date("Y-m-d H:i:s");
					$data["usuarioCreador"] = Session::getValue('U_USERNAME');
					$data["estadoPublicacion"] = 1;
					$data["estadoPlan"] = 1;
					$data["estadoModeracion"] = 'Pendiente';
					$data['comentarioInterno'] = 'Pendiente de Aprobación';

					$response = $this->model->crear($data);
					$this->view->anuncio = $this->model->trae($response, true);

					$this->setbuscador();

					if ($response != 0) {
						$this->view->msg = "Anuncio agregado con éxito.";
						$this->view->render_admin($this, 'editar');
					} else {
						$this->view->err = $response;
						$this->view->render_admin($this, 'crear');
					}
				}
			}
			
			
        } else {

            $usuarioID = Session::getValue('U_ID');

            $pm = new PlanesModel();
            $planes = $pm->validaPlanActivo($usuarioID);

            if (!empty($planes)) {

                //CU102: Contar Anuncios Activos de Usuario
                $cuentaAnuncios = $this->model->cuentaAnunciosUsuario($usuarioID);
                $cantidadPubl = $planes->cantidadPublicaciones;

                if ($cuentaAnuncios->count >= $cantidadPubl) {
                    $this->view->err = "Usted ha superado la cantidad máxima de post contratadas. Para agregar mas publicaciones acceda al siguiente link. "
                            . "<a href='" . URL . "Planes/contratar' class='btn btn-warning'>Contratar Plan Aquí</a>";
                    $this->view->render('Index', 'admin', 'no-autorizado');
                } else {
                    $this->setbuscador();
                    $this->view->render_admin($this, 'crear');
                }
            } else {
                $this->view->err = "Usted no cuenta con un Plan Activo. "
                        . "<a href='" . URL . "Planes/contratar' class='btn btn-warning'>Contratar Plan Aquí</a>";
                $this->view->render('Index', 'admin', 'no-autorizado');
            }
        }
    }

    /**
     * CU25: Editar Anuncio
     * @param int $anuncioID Identificador del anuncio a modificar
     */
    function editar($anuncioID = null) {

        if ($_POST) {

            $anuncioID = filter_input(INPUT_POST, 'anuncioID');
            $categoriaID = filter_input(INPUT_POST, 'categoriaID');
            $subCategoriaID = filter_input(INPUT_POST, 'subCategoriaID');
            $marcaID = filter_input(INPUT_POST, 'marcaID');
            $tituloPublicacion = filter_input(INPUT_POST, 'tituloPublicacion');
            $pais = filter_input(INPUT_POST, 'pais');
            $ciudad = filter_input(INPUT_POST, 'ciudad');
            $anoFabricacion = filter_input(INPUT_POST, 'anoFabricacion');
            $modeloMaquinaria = filter_input(INPUT_POST, 'modeloMaquinaria');
            $kilometraje = filter_input(INPUT_POST, 'kilometraje');
            $tipoKilometraje = filter_input(INPUT_POST, 'tipoKilometraje');
            $tipoCombustible = filter_input(INPUT_POST, 'tipoCombustible');
            $estadoMaquinaria = filter_input(INPUT_POST, 'estadoMaquinaria');
            $precioVentaArriendo = filter_input(INPUT_POST, 'precioVentaArriendo');
            $tipoMoneda = filter_input(INPUT_POST, 'tipoMoneda');
            $tipoTransaccion = filter_input(INPUT_POST, 'tipoTransaccion');
            $unicoDueno = filter_input(INPUT_POST, 'unicoDueno');
            $comentarioAnuncio = filter_input(INPUT_POST, 'comentarioAnuncio');	
			
			$cantidadCaract = strlen($comentarioAnuncio);
			
			if($cantidadCaract > 350){
				$this->view->warn = "La descripción del anuncio no puede superar los 350 caracteres.";
			}else{

				$array = array($anuncioID, $categoriaID, $subCategoriaID, $marcaID, $tituloPublicacion,
					$pais, $ciudad, $anoFabricacion, $kilometraje, $tipoTransaccion, $comentarioAnuncio);

				if ($this->fieldRequired($array)) {
					$this->view->warn = "Favor revisar campos requeridos.";
				} else {

					$data["categoriaID"] = $categoriaID;
					$data["subCategoriaID"] = $subCategoriaID;
					$data["anuncioID"] = $anuncioID;
					$data["marcaID"] = $marcaID;
					$data["tituloPublicacion"] = $tituloPublicacion;
					$data["pais"] = $pais;
					$data["ciudad"] = $ciudad;
					$data["anoFabricacion"] = $anoFabricacion;
					$data["modeloMaquinaria"] = $modeloMaquinaria;
					$data["kilometraje"] = $kilometraje;
					$data["tipoKilometraje"] = $tipoKilometraje;
					$data["tipoCombustible"] = $tipoCombustible;
					$data["estadoMaquinaria"] = $estadoMaquinaria;
					$data["precioVentaArriendo"] = $precioVentaArriendo;
					$data["tipoMoneda"] = $tipoMoneda;
					$data["tipoTransaccion"] = $tipoTransaccion;
					$data["unicoDueno"] = $unicoDueno;
					$data["comentarioAnuncio"] = $comentarioAnuncio;

					$response = $this->model->editar($data);

					if ($response == "true") {
						$this->view->msg = "Anuncio actualizado con éxito.";
					} else {
						$this->view->err = $response;
					}

					$this->view->anuncio = $this->model->trae($anuncioID);
				}
			}
        }

        if ($anuncioID != null) {
            $this->view->anuncio = $this->model->trae($anuncioID, true);
        }

        $this->setbuscador();
        $this->view->render_admin($this, 'editar');
    }

    /**
     * Cuenta las imagenes adicionales que posee un Anuncio y guarda su registro 
     * en la base de datos.
     */
    function cuenta() {

        $anuncioID = filter_input(INPUT_POST, 'anuncioID');

        $directorio = opendir("./public/admin/data/anuncios/" . $anuncioID . "/img/");
        $imgs = "0";

        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                $imgs .= "|" . $archivo;
            }
        }

        $data['imagenesAdicionales'] = $imgs;
        $data['anuncioID'] = $anuncioID;

        $this->model->editar($data);
    }

    /**
     * CU26: Eliminar Anuncio
     */
    function eliminar() {

        $anuncioID = filter_input(INPUT_POST, 'anuncioID');

        if ($anuncioID !== null) {

            $response = $this->model->eliminar($anuncioID);

            if ($response == "true") {
                $this->view->msg = "Anuncio eliminado con éxito.";
            } else {
                $this->view->err = $response;
            }
        } else {
            $this->view->err = "Favor seleccionar un estado para eliminar.";
        }
    }

    /**
     * CU91: Buscar Anuncios
     */
    function buscar() {

        if ($_POST) {

            $categoriaID = filter_input(INPUT_POST, 'tipo');
            $subCategoriaID = filter_input(INPUT_POST, 'subTipo');
            $pais = filter_input(INPUT_POST, 'pais');
            $ciudad = filter_input(INPUT_POST, 'ciudad');
            $marca = filter_input(INPUT_POST, 'marca');
            $modelo = filter_input(INPUT_POST, 'modelo');
            $tipoUsuario = filter_input(INPUT_POST, 'vendedor');
            $estado = filter_input(INPUT_POST, 'estado');
            $anoMin = filter_input(INPUT_POST, 'anoMin');
            $anoMax = filter_input(INPUT_POST, 'anoMax');
            $precioMin = filter_input(INPUT_POST, 'precioMin');
            $precioMax = filter_input(INPUT_POST, 'precioMax');

            $array = array($categoriaID, $subCategoriaID, $pais, $ciudad, $marca, $modelo,
                $tipoUsuario, $estado, $anoMin, $anoMax, $precioMin, $precioMax);

            if ($this->allFieldNotNull($array)) {
                $this->view->warn = "Favor ingrese criterios de búsqueda";
            } else {

                $data['c.categoriaID'] = $categoriaID;
                $data['subCategoriaID'] = $subCategoriaID;
                $data['pais'] = $pais;
                $data['ciudad'] = $ciudad;
                $data['m.marcaID'] = $marca;
                $data['modeloMaquinaria'] = $modelo;
                $data['tipoUsuario'] = $tipoUsuario;
                $data['estadoMaquinaria'] = $estado;
                $data['estadoPublicacion'] = "1";
                $data['estadoPlan'] = "1";

                $dataAd['anoMin'] = $anoMin;
                $dataAd['anoMax'] = $anoMax;
                $dataAd['precioMin'] = $precioMin;
                $dataAd['precioMax'] = $precioMax;
                $dataAd['fechaInicio'] = null;

                $anuncios = $this->model->buscar($data, $dataAd);

                if (empty($anuncios)) {
                    $this->view->msg = "No existen datos para la consulta realizada.";
                } else {
                    $this->view->anuncios = $anuncios;
                }
            }
        }

        $this->setbuscador();
        $this->view->render_web($this, 'listar');
    }

    function buscarAv() {

        if ($_POST) {

            $categoriaID = filter_input(INPUT_POST, 'tipo');
            $subCategoriaID = filter_input(INPUT_POST, 'subTipo');
            $pais = filter_input(INPUT_POST, 'pais');
            $ciudad = filter_input(INPUT_POST, 'ciudad');
            $marca = filter_input(INPUT_POST, 'marca');
            $modelo = filter_input(INPUT_POST, 'modelo');
            $tipoUsuario = filter_input(INPUT_POST, 'vendedor');
            $estado = filter_input(INPUT_POST, 'estado');
            $anoMin = filter_input(INPUT_POST, 'anoMin');
            $anoMax = filter_input(INPUT_POST, 'anoMax');
            $precioMin = filter_input(INPUT_POST, 'precioMin');
            $precioMax = filter_input(INPUT_POST, 'precioMax');
            $fechaInicio = filter_input(INPUT_POST, 'fechaInicio');
            $fechaTermino = filter_input(INPUT_POST, 'fechaTermino');

            $array = array($categoriaID, $subCategoriaID, $pais, $ciudad, $marca, $modelo,
                $tipoUsuario, $estado, $anoMin, $anoMax, $precioMin, $precioMax,
                $fechaInicio, $fechaTermino);

            if ($this->allFieldNotNull($array)) {
                $this->view->warn = "Favor ingrese criterios de búsqueda";
            } else {

                $data['c.categoriaID'] = $categoriaID;
                $data['subCategoriaID'] = $subCategoriaID;
                $data['pais'] = $pais;
                $data['ciudad'] = $ciudad;
                $data['m.marcaID'] = $marca;
                $data['modeloMaquinaria'] = $modelo;
                $data['tipoUsuario'] = $tipoUsuario;
                $data['estadoMaquinaria'] = $estado;
                $data['estadoPublicacion'] = "1";
                $data['estadoPlan'] = "1";

                $dataAd['anoMin'] = $anoMin;
                $dataAd['anoMax'] = $anoMax;
                $dataAd['precioMin'] = $precioMin;
                $dataAd['precioMax'] = $precioMax;
                $dataAd['fechaInicio'] = $this->dateFormat_mysql($fechaInicio);
                $dataAd['fechaTermino'] = $this->dateFormat_mysql($fechaTermino);

                $anuncios = $this->model->buscar($data, $dataAd);

                if (empty($anuncios)) {
                    $this->view->warn = "No existen datos para la consulta realizada.";
                } else {
                    $this->view->anuncios = $anuncios;
                }
            }
        }

        $this->setbuscador();
        $this->view->render_web($this, 'buscar-avanzada');
    }

    function buscarGen() {

        if ($_POST) {

            $campo = filter_input(INPUT_POST, 'campo');

            $array = array($campo);

            if ($this->allFieldNotNull($array)) {
                $this->view->warn = "Favor ingrese criterios de búsqueda";
            } else {

                $anuncios = $this->model->buscarGen($campo);

                if (empty($anuncios)) {
                    $this->view->warn = "No existen datos para la consulta realizada.";
                } else {
                    $this->view->anuncios = $anuncios;
                }
            }
        }

        $this->setbuscador();
        $this->view->render_web($this, 'listar');
    }

    /**
     * CU28: Mostrar Anuncio
     * @param int $anuncioID Identificador del anuncio a modificar
     */
    function trae($anuncioID = null) {

        if ($anuncioID == null) {
            $this->view->err = "Debe seleccionar un anuncio para visualizarlo.";
        } else {

            $anuncio = $this->model->trae($anuncioID);

            if (empty($anuncio)) {
                $this->view->msg = "No existen resultados para esta consulta.";
            } else {
                $usuarioID = $anuncio->usuarioID;

                $this->view->anunciosUsu = $this->model->listarPorUsuario($usuarioID);
                $this->view->anuncio = $anuncio;
            }
        }

        $this->view->render_web($this, 'ver');
    }

    /**
     * CU30: Listar Anuncios Por Usuario
     * @param type $usuarioID
     */
    function listarPorUsuario($usuarioID = null) {

        if ($usuarioID != null) {

            $anuncios = $this->model->listarPorUsuario($usuarioID);

            if (empty($anuncios)) {
                $this->view->msg = "No existen resultados para esta consulta.";
            } else {
                $this->view->anuncios = $anuncios;
            }
        }
    }

    /**
     * CU78: Listar Anuncio por Marca
     * 
     * @param int $marcaID Identificador de la Marca
     */
    function listarporMarca($marcaID) {

        if ($marcaID != null) {

            $anuncios = $this->model->listarporMarca($marcaID);

            if (empty($anuncios)) {
                $this->view->msg = "No existen resultados para esta consulta.";
            } else {
                $this->view->anuncios = $anuncios;
            }
        }

        $this->setbuscador();
        $this->view->render_web($this, 'listar');
    }

    /**
     * CU31: Cambiar Estado Anuncio
     * @param int $anuncioID Identificador del anuncio a modificar
     */
    function cambiaEstado($anuncioID = null) {

        $anuncioID = filter_input(INPUT_POST, 'anuncioID');

        if ($anuncioID !== null) {

            $estado = 0;
            $response = $this->model->cambiarEstado($estado);

            if ($response == "true") {
                $this->view->msg = "Cambio de Estado realizado con éxito.";
            } else {
                $this->view->err = $response;
            }
        } else {
            $this->view->err = "Favor seleccionar un Anuncio para cambiar de estado.";
        }
    }

    /**
     * CU61: Listar Anuncio por Categoría
     * @param int $categoriaID Identificador de la Categoría
     */
    function listarPorCategoria($categoriaID = null) {

        if ($categoriaID != null) {

            $anuncios = $this->model->listarPorCategoria($categoriaID);
            $this->view->countAnuncios = count($anuncios);

            if (empty($anuncios)) {
                $this->view->warn = "No existen resultados para esta consulta.";
            } else {
                $this->view->anuncios = $anuncios;
            }
        }

        $this->setbuscador();

        $this->view->render_web($this, 'listar');
    }

    /**
     * CU62: Enviar Email a Usuario
     */
    function enviarMensaje($pagina = null) {

        if ($_POST) {

            $nombre = filter_input(INPUT_POST, 'nombre');
            $email = filter_input(INPUT_POST, 'email');
            $telefono = filter_input(INPUT_POST, 'telefono');
            $comentario = filter_input(INPUT_POST, 'comentario');
            $mailVendedor = filter_input(INPUT_POST, 'mailVendedor');
            $anuncioID = filter_input(INPUT_POST, 'anuncioID');
            $usuarioID = filter_input(INPUT_POST, 'usuarioID');
            $tituloAnuncio = filter_input(INPUT_POST, 'tituloAnuncio');

            if ($tituloAnuncio != null) {
                $mensaje = "Usted ha recibido un mensaje sobre su artículo: <a href='" . URL . "Anuncios/trae/" . $anuncioID . "' target'_blank'>" . $tituloAnuncio . "</a>";
            } else {
                $mensaje = "Usted ha recibido un mensaje desde su página principal.";
            }
            $emailMensaje = $mensaje . '<br><br>' .
                    '<strong>Datos de Contacto:</strong><br>' .
                    'Nombre: ' . $nombre . '<br>' .
                    'Teléfono: ' . $telefono . '<br>' .
                    'E-mail: ' . $email . '<br>' .
                    'Mensaje: <br><br>' . $comentario;


            /** ENVIA EMAIL * */
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'From: ' . $nombre . ' <' . $email . '>' . "\r\n";
            $headers .= 'Bcc: ' . MAIL_BCC . "\r\n";


            if (mail($mailVendedor, MAIL_SUBJECT, $emailMensaje, $headers)) {
                $this->view->msg = "Mensaje enviado al vendedor correctamente.";

                /**
                 * CU79: Guardar Mensajes
                 */
                $mm = new MensajesModel();

                if ($anuncioID != null) {
                    $data['anuncioID'] = $anuncioID;
                }

                $data['usuarioID'] = $usuarioID;
                $data['nombreRemitente'] = $nombre;
                $data['emailRemitente'] = $email;
                $data['telefonoRemitente'] = $telefono;
                $data['comentarioMensaje'] = $emailMensaje;
                $data['fechaCreacion'] = date("Y-m-d H:i:s");
                $data['estadoMensaje'] = "1";

                $response = $mm->crear($data);
                if ($response != "true") {
                    $this->view->err = $response;
                }
            } else {
                $this->view->msg = "Ha ocurrido un problema. Inténtelo nuevamente.";
            }

            $this->view->anunciosUsu = $this->model->listarPorUsuario($usuarioID);

            if ($pagina == 'perfil') {
                header('Location: ' . URL . 'Usuarios/verPerfil/' . $usuarioID . '?m=1');
            } else {
                $this->view->anuncio = $this->model->trae($anuncioID);
                $this->view->render_web($this, 'ver');
            }
        }
    }

    /**
     * CU29: Listar Anuncios de Usuario
     */
    function misAnuncios() {

        $usuarioID = Session::getValue('U_ID');

        if ($usuarioID) {

            $anuncios = $this->model->misAnuncios($usuarioID);

            if (empty($anuncios)) {
                $this->view->warn = "Usted no posee anuncios creados.";
            } else {
                $this->view->anuncios = $anuncios;
            }

            $this->view->render_admin($this, 'listar-mis-anuncios');
        }
    }

    function setbuscador() {

        $this->categorias = $this->loadModelExt('CategoriasModel');
        $this->marcas = $this->loadModelExt('MarcasModel');

        $this->view->categorias = $this->categorias->listar();
        $this->view->marcas = $this->marcas->listar();
    }

    function uploadImg() {

        if ($_POST) {

            $anuncioID = filter_input(INPUT_POST, 'anuncioID');
            $comprobantePago = null;

            if ($_FILES['file']["error"] > 0) {
                echo "Error: subir archivo";
            } else {

                $nombre = $_FILES['file']['name'];
                $ext = pathinfo($nombre, PATHINFO_EXTENSION);

                $carpTemp = $_FILES['file']['tmp_name'];
                $folder_url = DOCS . "anuncios/" . $anuncioID;

                // create the folder if it does not exist
                if (!is_dir($folder_url)) {
                    mkdir($folder_url, 0777, true);
                }

                $url = $folder_url . "/portada." . $ext;

                $data["anuncioID"] = $anuncioID;
                $data["imagenPrincipal"] = "portada." . $ext;

                if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {

                    $response = $this->model->editar($data);

                    if ($response == "true") {
                        $this->view->msg = "Imagen subida con éxito.";
                    } else {
                        $this->view->err = $response;
                    }
                } else {
                    echo "Problemas al mover archivo";
                }
            }

            
        }

        $this->view->anuncio = $this->model->trae($anuncioID, true);
        $this->view->render_admin($this, 'editar');
    }

    /*
     * CU104: Listar Anuncios Pendientes
     */

    function moderar() {

        //CU103: Aprobar Anuncio
        if ($_POST) {

            $anuncioID = filter_input(INPUT_POST, 'anuncioID');

            if ($anuncioID != null) {

                $data['anuncioID'] = $anuncioID;
                $data['estadoModeracion'] = 'Aprobado';
                $data['comentarioInterno'] = 'Aprobado';

                $response = $this->model->editar($data);

                if ($response == "true") {
                    $this->view->msg = 'Aprobación realizada con éxito.';
                } else {
                    $this->view->err = "Problemas para realizar Aprobación.";
                }
            } else {
                $this->view->err = "Debe seleccionar un anuncio para actualizar.";
            }
        }

        ////CU104: Listar Anuncios Pendientes
        $this->view->anuncios = $this->model->listarPendientes();
        $this->view->render_admin($this, 'moderar');
    }

    function rechazar($anuncioID = null) {

        if ($_POST) {

            $anuncioID = filter_input(INPUT_POST, 'anuncioID');
            $glosa = filter_input(INPUT_POST, 'glosa');

            $array = array($anuncioID, $glosa);

            if ($this->fieldRequired($array)) {
                $this->view->err = "Favor verificar campos requeridos.";
            } else {

                $data['anuncioID'] = $anuncioID;
                $data['estadoModeracion'] = 'Rechazado';
                $data['comentarioInterno'] = $glosa;
                $data['estadoPublicacion'] = '0';

                $response = $this->model->editar($data);

                if ($response == "true") {
                    $this->view->msg = "Anuncio rechazado correctamente.";
                } else {
                    $this->view->err = "Ha ocurrido un problema en el rechazo del Anuncio.";
                }

                $this->view->anuncios = $this->model->listarPendientes();
                $this->view->render_admin($this, 'moderar');
            }
        } else {
            if ($anuncioID != null) {
                $this->view->anuncio = $this->model->trae($anuncioID, true);
                $this->view->loadModal($this, 'rechazar');
            }
        }
    }

    function verAdmin($anuncioID) {

        $perfil = Session::getValue('U_PERFIL');

        if ($perfil == "ADMINISTRADOR") {

            if ($anuncioID == null) {
                $this->view->err = "Debe seleccionar un anuncio para visualizarlo.";
            } else {

                $anuncio = $this->model->trae($anuncioID, true);

                if (empty($anuncio)) {
                    $this->view->msg = "No existen resultados para esta consulta.";
                } else {
                    $usuarioID = $anuncio->usuarioID;

                    $this->view->anunciosUsu = $this->model->listarPorUsuario($usuarioID);
                    $this->view->anuncio = $anuncio;
                }
            }
        } else {
            $this->view->err = "Usuario no autorizado para ver esta página";
        }

        $this->view->render_web($this, 'ver');
    }

    function estados() {

        if ($_POST) {

            $anuncioID = filter_input(INPUT_POST, 'anuncioID');
            $accion = filter_input(INPUT_POST, 'accion');
            $ejecutar = "no";

            $array = array($anuncioID, $accion);

            if ($this->fieldRequired($array)) {
                $this->view->err = "Favor verificar campos requeridos.";
            } else {

                if ($accion == "habilitar") {

                    if ($this->tieneDisponiblidad()) {
                        $data['estadoPublicacion'] = "1";
                        $ejecutar = "si";
                    } else {
                        $this->view->err = "Usted ya cuenta con el máximo de Anuncios activos que permite su Plan.";
                    }
                } else if ($accion == "deshabilitar") {
                    $data['estadoPublicacion'] = "0";
                    $ejecutar = "si";
                }

                if ($ejecutar == "si") {

                    $data['anuncioID'] = $anuncioID;
                    $response = $this->model->editar($data);

                    if ($response == "true") {
                        $this->view->msg = "Anuncio actualizado correctamente.";
                    } else {
                        $this->view->err = "Ha ocurrido un problema con la actualización del Anuncio.";
                    }
                }
            }
        }

        $this->misAnuncios();
    }

    function tieneDisponiblidad() {

        $usuarioID = Session::getValue('U_ID');
        $isDisponible = false;

        $pm = new PlanesModel();
        $planes = $pm->validaPlanActivo($usuarioID);

        if (!empty($planes)) {

            //CU102: Contar Anuncios Activos de Usuario
            $cuentaAnuncios = $this->model->cuentaAnunciosUsuario($usuarioID);
            $cantidadPubl = $planes->cantidadPublicaciones;

            if ($cuentaAnuncios->count < $cantidadPubl) {
                $isDisponible = true;
            } else {
                $isDisponible = false;
            }
        }

        return $isDisponible;
    }

}
