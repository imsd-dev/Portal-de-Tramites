<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * UI/UX Alan Pereda N. 
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<div role="main" class="main">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <h1><?php echo $this->tramite->nombreDireccion ?></h1>
                </div>
 
                <div class="col-md-6 col-xs-12 hidden-print"> 
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>">Inicio</a></li>
                        <li><a href="<?php echo URL ?>Tramites/orden">Trámites</a></li>
                        <li class="active">Ver</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>	



    <div class="container mt30">
        <div class="col-md-12 align-right hidden-print">
            <form action="<?php echo URL ?>Tramites/buscar" method="post">
                <div class="input-group input-search">
                    <input type="text" placeholder="Buscar ejemplo: Permiso circulación" name="buscar" class="typeahead form-control input-lg mb-md tt-input" aria-labelledby="buscartramite">
                    <span class="input-group-btn">
						<button type="submit" class="btn btn-red mb-md btn-lg fix-btn-gruop" id="buscartramite">
						<span class="hidden-xs"><i class="fa fa-search"></i> Buscar Trámite</span>
						<span class="visible-xs">Buscar</span>
						
						</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <hr class="tall30 hidden-print">


        <!-- INICIO CONTENIDO -->	
        <div class="col-md-9">

            <div class="row">
                <!-- ID  LEER -->
                <div id="leer">
                    <?php //include TEMPLATE . 'mensajes.php'; ?>

                    <div class="col-md-12 mb30">
                        <div class="row">
                            <div class="col-md-11 col-xs-12">
                                <h2 class="mb-none"><?php echo $this->tramite->tituloTramite ?></h2>
                                <?php
                                if (!empty($this->unidad)) {
                                    echo "<p>Este trámite depende de: " . $this->unidad->nombreUnidad . "</p>";
                                } else {
                                    echo "<p>Este trámite depende de: " . $this->tramite->nombreDireccion . "</p>";
                                }

                                $str_canales = null;
                                if (!empty($this->canales)) {
                                    $icon = null;
                                    foreach ($this->canales as $value) {
                                        switch ($value) {
                                            case 'Web':
                                                $icon = "fa-at";
                                                break;
                                            case 'Telefónico':
                                                $icon = "fa-volume-control-phone";
                                                break;
                                            case 'Presencial':
                                                $icon = "fa-street-view";
                                                break;
                                            case '100% en Línea':
                                                $icon = "fa fa-check-circle";
                                                break;
                                            case 'Auto Servicio':
                                                $icon = "fa fa-male";
                                                break;
                                        }
                                        $str_canales .= '<li><i class="fa ' . $icon . '" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="' . $value . '"></i> '
                                                . '<span>' . $value . '</span></li>';
                                    }
                                }
                                ?>
                            </div> 

                        </div>

                        <div id="info_type_tramite_mini">
                            <ul>
                                <?php echo $str_canales ?>
                            </ul>
                        </div>
                        <p>
                            Última actualización <?php echo $this->tramite->fechaActualizacionTramite ?>     


                            <?php
                            /*
                              if ($this->tramite->tipoTramite == '100% linea') {
                              ?>
                              <a href="<?php echo $this->tramite->urlExternaTramite ?>" target="_blank" class="btn  btn-success mr-xs mb-sm pull-right hidden-print" type="button"><i class="fa fa-at"></i> Este trámite es 100% en línea </a>
                              <?php
                              }
                             */
                            ?>
                        </p>

                        <?php
                        if ($this->tramite->tipoTramite == '100% linea') {
                            ?>

                            <section class="call-to-action with-borders mb-xl">
                                <div class="call-to-action-content mt20">
								<div class="mt20 visible-xs"></div>
                                    <h3> Este <strong>Trámite </strong> esta disponible <strong>100% en línea</strong> </h3>

                                </div>
                                <div class="call-to-action-btn">
                                    <a class="btn btn-lg btn-success" target="_blank"  title="Clic para realizar este trámite en línea" href="<?php echo $this->tramite->urlExternaTramite ?>"><i class="fa fa-at"></i> Realizar Trámite</a>
                                </div>
                            </section>


                            <?php
                        }
                        ?>


                        <div class="clearfix"></div>

                        <div class="col-md-12 mb30 pull-left hidden-print">

                            <div class="social-gdm">
                                <a class="icon-facebook" rel="nofollow"
                                   href="http://www.facebook.com/"
                                   onclick="popUp = window.open(
                                                   'http://www.facebook.com/sharer.php?u=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>',
                                                   'popupwindow',
                                                   'scrollbars=yes,width=800,height=400');
                                           popUp.focus();
                                           return false">
                                    <i class="fa fa-facebook" style="color:#3B5998;"></i>  <strong style="font-size:12px;   margin-right:30px;" title="Compartir en: Facebook">FACEBOOK</strong>
                                </a>
                            </div>
                            <div class="social-gdm">
                                <a class="icon-twitter" rel="nofollow"
                                   href="http://twitter.com/"

                                   onclick="popUp = window.open(
                                                   'http://twitter.com/intent/tweet?text=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloTramite ?> via @penalolen - <?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>',
                                                   'popupwindow',
                                                   'scrollbars=yes,width=800,height=400');
                                           popUp.focus();
                                           return false">
                                    <i class="fa fa-twitter" style="color:#00ACED;"></i>  <strong style="font-size:12px;  margin-right:30px;" title="Compartir en: twitter">TWITTER</strong>
                                </a>
							</div>

                            <div class="social-gdm">
                                <a class="icon-gplus" rel="nofollow"
                                   href="http://www.plus.google.com/"
                                   onclick="popUp = window.open(
                                                   'https://plus.google.com/share?url=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>',
                                                   'popupwindow',
                                                   'scrollbars=yes,width=800,height=400');
                                           popUp.focus();
                                           return false">
                                    <i class="fa fa-google" style="color:#DD4B39;"></i> <strong style="font-size:12px;  margin-right:30px;" title="Compartir en: Google +">GOOGLE+</strong>

                                </a>
							</div>

                            <div class="social-gdm">
                                <a href="whatsapp://send?text=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>" data-action="share/whatsapp/share">
                                    <i class="fa fa-whatsapp" style="color:#1EA211;"></i>  <strong style="font-size:12px;  margin-right:30px;" title="Compartir en: WHATSAPP">WHATSAPP</strong>
                                </a>
							</div>
                        </div>

                        <div class="clearfix"></div>

                        <div  class="col-md-10"> 
                            <blockquote>
                                <p class="lead"><?php echo $this->tramite->descripcionBreveTramite ?></p>
                            </blockquote>

                            <p><?php echo $this->tramite->descripcionTramite ?></p>
                        </div>

                        <div class="col-md-2 col-sm-3" style="margin-left: -10px !important"> 
                            <input id="text" type="hidden" value="<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>" />
                            <div id="qrcode" class="hidden-sm hidden-xs "></div>
                        </div>

                        <div class="clearfix"></div>



                        <div class="col-md-10 mb20"><strong>Teléfonos: </strong>
						<p>
                            <?php
                            if ($this->tramite->telefono1ContactoTramite != null) {
                                echo '<i class="fa fa-phone ml10"></i> ' . $this->tramite->telefono1ContactoTramite;
                            }
                            if ($this->tramite->telefono2ContactoTramite != null) {
                                echo '<i class="fa fa-phone ml10"></i> ' . $this->tramite->telefono2ContactoTramite;
                            }
                            if ($this->tramite->telefono3ContactoTramite != null) {
                                echo '<i class="fa fa-phone ml10"></i> ' . $this->tramite->telefono3ContactoTramite;
                            }
                            if ($this->tramite->telefono4ContactoTramite != null) {
                                echo '<i class="fa fa-phone ml10"></i> ' . $this->tramite->telefono4ContactoTramite;
                            }
                            ?>
							</p>
                        </div>

                        <div class="clearfix"></div>
                        <?php
                        $fecha_ini = $this->tramite->plazoInicioTramite;
                        $fecha_fin = $this->tramite->plazoFinTramite;

                        if ($fecha_fin != null) {
 
                            $hoy = date("Y-m-d");

                            if (($hoy > $fecha_ini) && ($hoy < $fecha_fin)) {
                                echo '<div class="alert alert-success">
                                    <span class="title"><i class="fa fa-bullhorn ico30"></i> <strong>TRÁMITE VIGENTE</strong></span>
                                    Este Trámite se encuentra vigente. Periodo de vigencia desde el <strong>' . $this->dateFormat_view($fecha_ini) . '</strong> hasta el <strong>' . $this->dateFormat_view($fecha_fin) . '</strong>.    
                              </div>';
                            } else {
                                echo '<div class="alert alert-danger">
                                    <span class="title"><i class="fa fa-exclamation-triangle ico30"></i> <strong>TRÁMITE NO VIGENTE</strong></span>
                                    Este Trámite no se encuentra vigente actualmente. Inicia el <strong>'.$this->dateFormat_view($fecha_ini).'</strong> y vence el <strong>' . $this->dateFormat_view($fecha_fin) . '</strong>.
                              </div>';
                            }
                        }
                        ?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12">

                        <h4>Detalles del trámite</h4>
                        <div id="detalles" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#dirigido" data-parent="#dirigido" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-group"></i> Dirigido a: <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="accordion-body collapse in" id="dirigido">
                                    <div class="panel-body">
                                        <p><?php echo $this->tramite->destinadoATramite ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#requisitos" data-parent="#requisitos" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-check-square-o"></i> Requisitos: <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="accordion-body collapse" id="requisitos">
                                    <div class="panel-body">
                                        <?php echo $this->tramite->requisitosTramite ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#documentos" data-parent="#documentos" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-files-o"></i> Documentos necesarios: <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="accordion-body collapse" id="documentos">
                                    <div class="panel-body">

                                        <?php
                                        if ($this->tramite->documentacionDetalleTramite == null) {
                                            echo "Sin información";
                                        } else {
                                            echo $this->tramite->documentacionDetalleTramite;
                                        }

                                        if ($this->tramite->documentosAdjuntosTramite != null) {

                                            $doctos = explode('|', $this->tramite->documentosAdjuntosTramite);
                                            $str_doctos = null;

                                            foreach ($doctos as $value) {
                                                $str_doctos .= '<li><a href="' . URL . 'Tramites/descargar/' . $value . '|' . $this->tramite->tramiteID . '" title="Descargar Documento"><i class="fa fa-cloud-download"></i> ' . $value . '<span class="list_over_right">DESCARGAR</span></a></li>';
                                            }
                                            ?>
                                            <div class="mt20"></div>
                                            <h5 >Documentos asociados al Trámite </h5>

                                            <div class="col-xs-10 list_over hidden-print">
                                                <ul>
                                                    <?php echo $str_doctos; ?>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#donde" data-parent="#donde" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-map-marker"></i> Donde se realiza: <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="accordion-body collapse" id="donde">
                                    <div class="panel-body">
                                        <?php
                                        if (!empty($this->sucursales)) {

                                            $count_suc = count($this->sucursales);
                                            for ($i = 0; $i < $count_suc; $i++) {

                                                $sucursal = (object) $this->sucursales[$i];

                                                echo $sucursal->nombreSucursal . "<br>";
                                                echo $sucursal->direccionSucursal . "<br>";
                                                echo $sucursal->fono1Sucursal . " / " . $sucursal->fono2Sucursal;
                                                echo "<hr>";
                                            }
                                        } else {
                                            echo "No existen sucursales asociadas a este Trámite.";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#duracion" data-parent="#duracion" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-clock-o"></i> Duración del trámite: <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
										
                                    </h4>
                                </div>
                                <div class="accordion-body collapse" id="duracion">
                                    <div class="panel-body">
                                        <p><?php echo $this->tramite->duracionTramite ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#vigencia" data-parent="#vigencia" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-group"></i> Vigencia: <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="accordion-body collapse" id="vigencia">
                                    <div class="panel-body">
                                        <?php
                                        if ($this->tramite->vigenciaTramite == null) {
                                            echo '<p>Sin información.</p>';
                                        } else {
                                            echo '<p>' . $this->tramite->vigenciaTramite . '</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#costos" data-parent="#costos" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-dollar"></i> Costos / ¿Cual es el valor del trámite?: 
											<span class="pull-right fix-aco hidden-xs"> <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="accordion-body collapse" id="costos">
                                    <div class="panel-body">
                                        <p><?php echo $this->tramite->costoTramite ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#dias" data-parent="#dias" data-toggle="collapse" class="accordion-toggle">
                                            <i class="fa fa-history"></i> Dias y horarios de atención: <span class="pull-right fix-aco hidden-xs"> <i class="fa fa-plus"></i> Clic para ver más info </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="accordion-body collapse" id="dias">
                                    <div class="panel-body">
                                        <strong>Días de Atención:</strong><br>
                                        <?php
                                        $dias = unserialize($this->tramite->diasDeAtencionTramite);

                                        if (!empty($dias)) {
                                            $atencion = $dias['dias'];
                                            foreach ($atencion as $value) {
                                                echo $value . ", ";
                                            }
                                        } else {
                                            echo "No existe información.";
                                        }
                                        ?>
                                        <hr>
                                        <strong>Horarios:</strong> <br>

                                        <?php
                                        if ($this->tramite->hrAtencionMananaIni != null) {
                                            echo "Mañana: Desde las " . $this->tramite->hrAtencionMananaIni . " hasta las " . $this->tramite->hrAtencionMananaFin;
                                        }
                                        ?>
                                        <?php
                                        if ($this->tramite->hrAtencionTardeIni != null) {
                                            echo "<br>Tarde: Desde las " . $this->tramite->hrAtencionTardeIni . " hasta las " . $this->tramite->hrAtencionTardeFin;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /ID  LEER -->
            </div><!-- /row --> 


            <!--EM div class="row hidden-print">
                <div class="col-md-12 text-center">
                    <a class="btn btn-info btn-borders btn-lg btn-icon" href="#" role="button" data-toggle="modal" data-target="#util"><i class="fa fa-thumbs-o-up" ></i> | <i class="fa fa-thumbs-o-down" ></i>&nbsp; ¿Te fue util esta info?</a>
                    <?php
                    // if ($this->tramite->tipoTramite != '100% linea') {
                        ?>
                        <a class="btn btn-success btn-borders btn-lg btn-icon" href="#" role="button" data-toggle="modal" data-target="#votarxtramite"> <i class="fa fa-leaf" ></i>Quiero este Trámite 100% en línea</a>
                        <?php
                    //}
                    ?>
                    <a class="btn btn-warning btn-borders btn-lg btn-icon" href="#" role="button" data-toggle="modal" data-target="#ErrorenInfo"> <i class="fa fa-warning" ></i> Comunicar un error</a>
                </div>
            </div><!-- /row -->
        </div><!-- col-md-9-->
        <?php
        include './public/templates/sidebar.php';
        ?>
    </div><!-- container-->

    <div class="clearfix mt30"></div>

    <?php
   // include './public/templates/votaciones.php';
    ?>

</div>
