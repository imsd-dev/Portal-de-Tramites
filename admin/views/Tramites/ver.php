<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<div role="main" class="main">

    <section class="page-header hidden-print">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Trámites </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $this->tramite->nombreDireccion ?></h1>
                </div>
            </div>
        </div>
    </section>	

    <div class="container mt30">
        <div class="col-md-12 align-right hidden-print">
            <form action="<?php echo URL ?>Tramites/buscar" method="post">
                <div class="input-group input-search">
                    <!--input type="text" placeholder="Buscar..." id="q" name="q" class="form-control"-->
                    <input type="text" placeholder="Buscar ejemplo: Permiso circulación" name="buscar" class="typeahead form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-red fix-btn-gruop-min"><i class="fa fa-search"></i> Buscar</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <hr class="tall30 hidden-print">


        <!-- INICIO CONTENIDO -->	
        <div class="col-md-9">
            <div class="row">

                <?php include TEMPLATE . 'mensajes.php'; ?>

                <div class="col-md-12 mb30">
                    <div class="row">
                        <div class="col-md-11 col-xs-12">
                            <h2 class="mb-none"><?php echo $this->tramite->tituloTramite ?></h2>
                            <?php
                            if (!empty($this->unidad)) {
                                echo "<p>Tramite dependiente de: " . $this->unidad->nombreUnidad . "</p>";
                            } else {
                                echo "<p>Tramite dependiente de: " . $this->tramite->nombreDireccion . "</p>";
                            }

                            $str_canales = null;
                            if (!empty($this->canales)) {
                                foreach ($this->canales as $value) {
                                    switch ($value) {
                                        case 'Web':
                                            $icon = "fa-paper-plane";
                                            break;
                                        case 'Telefónico':
                                            $icon = "fa-volume-control-phone";
                                            break;
                                        case 'Presencial':
                                            $icon = "fa-street-view";
                                            break;
                                        case 'Trámite 100% en Línea':
                                            $icon = "fa fa-at";
                                            break;
                                        case 'Auto Servicio':
                                            $icon = "fa fa-at";
                                            break;
                                    }
                                    $str_canales .= '<li><i class="fa ' . $icon . '" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="' . $value . '"></i></li>';
                                }
                            }

                            if ($this->tramite->telefono1ContactoTramite != null) {
                                echo '<i data-original-title="llamanos" data-plugin-tooltip="" data-toggle="tooltip" class="fa fa-volume-control-phone"></i>' . $this->tramite->telefono1ContactoTramite;
                            }
                            if ($this->tramite->telefono2ContactoTramite != null) {
                                echo ' / <i data-original-title="llamanos" data-plugin-tooltip="" data-toggle="tooltip" class="fa fa-volume-control-phone"></i>' . $this->tramite->telefono2ContactoTramite;
                            }
                            if ($this->tramite->telefono3ContactoTramite != null) {
                                echo ' / <i data-original-title="llamanos" data-plugin-tooltip="" data-toggle="tooltip" class="fa fa-volume-control-phone"></i>' . $this->tramite->telefono3ContactoTramite;
                            }
                            if ($this->tramite->telefono4ContactoTramite != null) {
                                echo ' / <i data-original-title="llamanos" data-plugin-tooltip="" data-toggle="tooltip" class="fa fa-volume-control-phone"></i>' . $this->tramite->telefono4ContactoTramite;
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
                        <button class="mb-xs mt-xs mr-xs btn btn-borders btn-info btn-xs ml5 hidden-print" type="button" data-placement="top" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="Escuchar contenido"><i class="fa fa-volume-up" ></i> Escuchar</button>

                        <a href="javascript:window.print()" class="mb-xs mt-xs mr-xs btn btn-borders btn-info btn-xs hidden-print" data-placement="top" data-toggle="tooltip" data-plugin-tooltip=""  > <i class="fa fa-print"></i>  Imprimir</a>

                        <?php
                        if ($this->tramite->tipoTramite == '100% linea') {
                            ?>
                            <a href="<?php echo $this->tramite->urlExternaTramite ?>" target="_blank" class="btn btn-borders btn-danger mr-xs mb-sm pull-right hidden-print" type="button"><i class="fa fa-at"></i> Este trámite es 100% en línea </a>
                            <?php
                        }
                        ?>
                    </p>

                    <div class="col-md-12 mb30 pull-left">
                        <a class="icon-facebook" rel="nofollow"
                           href="http://www.facebook.com/"
                           onclick="popUp = window.open(
                                           'http://www.facebook.com/sharer.php?u=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>',
                                           'popupwindow',
                                           'scrollbars=yes,width=800,height=400');
                                   popUp.focus();
                                   return false">
                            <i class="fa fa-facebook" style="color:#3B5998;"></i>  <strong style="font-size:12px;  color:#000; margin-right:30px;">FACEBOOK</strong>
                        </a>

                        <a class="icon-twitter" rel="nofollow"
                           href="http://twitter.com/"

                           onclick="popUp = window.open(
                                           'http://twitter.com/intent/tweet?text=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloTramite ?> via @penalolen - <?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>',
                                           'popupwindow',
                                           'scrollbars=yes,width=800,height=400');
                                   popUp.focus();
                                   return false">
                            <i class="fa fa-twitter" style="color:#00ACED;"></i>  <strong style="font-size:12px;  color:#000; margin-right:30px;">TWITTER</strong>
                        </a>

                        <a class="icon-gplus" rel="nofollow"
                           href="http://www.plus.google.com/"
                           onclick="popUp = window.open(
                                           'https://plus.google.com/share?url=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>',
                                           'popupwindow',
                                           'scrollbars=yes,width=800,height=400');
                                   popUp.focus();
                                   return false">
                            <i class="fa fa-google" style="color:#DD4B39;"></i> <strong style="font-size:12px;  color:#000; margin-right:30px;">GOOGLE+</strong>

                        </a>
                        	
                        <a href="whatsapp://send?text=<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>" data-action="share/whatsapp/share">
                            <i class="fa fa-whatsapp" style="color:#00ACED;"></i>  <strong style="font-size:12px;  color:#000; margin-right:30px;">WHATSAPP</strong>
                        </a>
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
                        <div id="qrcode"></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-12">

                    <h4>Detalles del trámite</h4>
                    <div id="detalles" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#dirigido" data-parent="#detalles" data-toggle="collapse" class="accordion-toggle">
                                        <i class="fa fa-group"></i> Dirigido a:
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
                                    <a href="#requisitos" data-parent="#detalles" data-toggle="collapse" class="accordion-toggle">
                                        <i class="fa fa-check-square-o"></i> Requisitos
                                    </a>
                                </h4>
                            </div>
                            <div class="accordion-body collapse" id="requisitos">
                                <div class="panel-body">
                                    <p><?php echo $this->tramite->requisitosTramite ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#documentos" data-parent="#detalles" data-toggle="collapse" class="accordion-toggle">
                                        <i class="fa fa-files-o"></i> Documentos necesarios
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
                                    <a href="#donde" data-parent="#detalles" data-toggle="collapse" class="accordion-toggle">
                                        <i class="fa fa-map-marker"></i> Donde se realiza
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

                                            echo "<a href='#'>" . $sucursal->nombreSucursal . "</a><br>";
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
                                    <a href="#duracion" data-parent="#detalles" data-toggle="collapse" class="accordion-toggle">
                                        <i class="fa fa-clock-o"></i> Duración del trámite
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
                                        <i class="fa fa-group"></i> Vigencia
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
                                    <a href="#costos" data-parent="#detalles" data-toggle="collapse" class="accordion-toggle">
                                        <i class="fa fa-dollar"></i> Costos / ¿Cual es el valor del trámite?
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
                                    <a href="#dias" data-parent="#detalles" data-toggle="collapse" class="accordion-toggle">
                                        <i class="fa fa-history"></i> Dias y horarios de atención
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
            </div><!-- /row -->

            <div class="row hidden-print">
                <div class="col-md-12 text-center">
                    <a class="btn btn-info btn-borders btn-md" href="#" role="button" data-toggle="modal" data-target="#util"> <i class="fa fa-thumbs-o-up" ></i> |  <i class="fa fa-thumbs-o-down" ></i> ¿Te fue util esta info?</a>
                    <a class="btn btn-success btn-borders btn-lg" href="#" role="button" data-toggle="modal" data-target="#votarxtramite"> <i class="fa fa-leaf" ></i> 
                        Quiero este Trámite 100% en línea</a>
                    <a class="btn btn-warning  btn-borders " href="#" role="button" data-toggle="modal" data-target="#ErrorenInfo"> <i class="fa fa-warning" ></i> 
                        Comunicar un error</a>
                </div>
            </div><!-- /row -->
        </div><!-- col-md-9-->
        <?php
        include './public/templates/sidebar.php';
        ?>
    </div><!-- container-->

    <div class="clearfix mt30"></div>

    <?php
    include './public/templates/votaciones.php';
    ?>

</div>

<div class="modal fade" id="util" tabindex="-1" role="dialog" aria-labelledby="util" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content featured-box featured-box-primary align-left ">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="heading-primary text-uppercase mb-md"><i class="fa fa-thumbs-o-up" ></i> |  <i class="fa fa-thumbs-o-down" ></i>  &nbsp; ¿Te fue útil esta información?</h4>
            </div>
            <?php
            if (Session::exist()) {
                ?> 
                <form action="<?php echo URL ?>Tramites/votar" method="post">
                    <div class="modal-body">

                        <center><h5>Trámite: <?php echo $this->tramite->tituloTramite ?></h5></center>

                        <div class="col-md-3"></div>

                        <div class="col-sm-4">
                            <div class="radio">
                                <label><input type="radio" name="option" value="SI" checked><i class="fa fa-thumbs-o-up" ></i> SI</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="radio">
                                <label><input type="radio" name="option" value="NO"><i class="fa fa-thumbs-o-down" ></i> NO</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt30">
                        <input type="hidden" value="UTILIDAD" name="tipo">
                        <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="id_tramite">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

                <?php
            } else {
                ?>
                <div class="modal-body">

                    <div class="col-md-1"> 
                        <h2><i class="fa fa-frown-o"></i></h2>
                    </div>

                    <div class="col-md-10">
                        Debes estar registrado para poder participar 

                        <div class="col-md-12 mt20">
                            <div class="signin-form">
                                <form action="<?php echo URL ?>Usuarios/login" method="post">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12 p-none">
                                                <label>Run</label>
                                                <input type="text" name="username" value="" class="form-control input-lg" tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12 p-none">
                                                <a class="pull-right mt-none p-none"  href="page-recovery.html">(¿olvidó su contraseña?)</a>
                                                <label>Contraseña</label>
                                                <input type="password" name="passwd" value="" class="form-control input-lg" tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pl-none">
                                            <span class="remember-box checkbox">
                                                <label for="rememberme">
                                                    <input type="checkbox" id="rememberme" name="rememberme">Recordar
                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-md-6 pr-none">
                                            <?php if (isset($this->tramite->tituloUrlTramite)) { ?>
                                                <input type="hidden" value="<?php echo $this->tramite->tituloUrlTramite ?>" name="titulo_tramites">
                                                <?php
                                            }
                                            ?>
                                            <input type="submit" value="INGRESAR" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?php echo URL ?>Usuarios/registrar" class="btn btn-success pull-left">Regístrate</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="votarxtramite" tabindex="-1" role="dialog" aria-labelledby="votarxtramite" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="heading-success text-uppercase mb-md"><i class="fa fa-leaf" ></i> &nbsp; Quiero este Trámite 100% en línea</h4>
            </div>
            <?php
            if (Session::exist()) {
                ?> 
                <form action="<?php echo URL ?>Tramites/votar" method="post">
                    <div class="modal-body">
                        <center>
                            <h5>Trámite: <?php echo $this->tramite->tituloTramite ?></h5>

                            <div class="col-sm-12 mb30">
                                <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox" checked disabled>
                                    <label for="votasi">Quiero este Trámite en Línea</label>
                                </div>
                            </div>
                        </center>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" value="LINEA" name="tipo">
                        <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="id_tramite">

                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

                <?php
            } else {
                ?>
                <div class="modal-body">

                    <div class="col-md-1"> 
                        <h2><i class="fa fa-frown-o"></i></h2>
                    </div>

                    <div class="col-md-10">
                        Debes estar registrado para poder participar 

                        <div class="col-md-12 mt20">
                            <div class="signin-form">
                                <form action="<?php echo URL ?>Usuarios/login" method="post">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12 p-none">
                                                <label>Run</label>
                                                <input type="text" name="username" value="" class="form-control input-lg" tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12 p-none">
                                                <a class="pull-right mt-none p-none"  href="page-recovery.html">(¿olvidó su contraseña?)</a>
                                                <label>Contraseña</label>
                                                <input type="password" name="passwd" value="" class="form-control input-lg" tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pl-none">
                                            <span class="remember-box checkbox">
                                                <label for="rememberme">
                                                    <input type="checkbox" id="rememberme" name="rememberme">Recordar
                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-md-6 pr-none">
                                            <?php if (isset($this->tramite->tituloUrlTramite)) { ?>
                                                <input type="hidden" value="<?php echo $this->tramite->tituloUrlTramite ?>" name="titulo_tramites">
                                                <?php
                                            }
                                            ?>
                                            <input type="submit" value="INGRESAR" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?php echo URL ?>Usuarios/registrar" class="btn btn-success pull-left">Regístrate</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="ErrorenInfo" tabindex="-1" role="dialog" aria-labelledby="ErrorenInfo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="heading-warning text-uppercase mb-md"><i class="fa fa-warning" ></i> &nbsp; Quiero este Trámite 100% en línea</h4>
            </div>
            <?php
            if (Session::exist()) {
                ?> 
                <form action="<?php echo URL ?>Comentarios/crear" method="post">
                    <div class="modal-body">

                        <h5>Detalles del trámite</h5>

                        <div class="col-sm-12">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="items[]" value="Trámite no actualizado">
                                <label for="noActualizado">Trámite no actualizado</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="items[]" value="Error en la información de contacto">
                                <label for="1">Error en la información de contacto</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="items[]" value="Otro">
                                <label for="2">Otro</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Detalle del problema (Maximo 250 caracteres)</label>
                                <textarea rows="5" name="comentario" class="form-control" placeholder="Ingresar su comentario" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" value="<?php echo $this->tramite->tituloUrlTramite ?>" name="titulo">
                        <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="id_tramite">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>

                <?php
            } else {
                ?>
                <div class="modal-body">
                    <div class="col-md-1"> 
                        <h2><i class="fa fa-frown-o"></i></h2>
                    </div>
                    <div class="col-md-10">
                        Debes estar registrado para poder participar 

                        <div class="col-md-12 mt20">
                            <div class="signin-form">
                                <form action="<?php echo URL ?>Usuarios/login" method="post">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12 p-none">
                                                <label>Run</label>
                                                <input type="text" name="username" value="" class="form-control input-lg" tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12 p-none">
                                                <a class="pull-right mt-none p-none"  href="page-recovery.html">(¿olvidó su contraseña?)</a>
                                                <label>Contraseña</label>
                                                <input type="password" name="passwd" value="" class="form-control input-lg" tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pl-none">
                                            <span class="remember-box checkbox">
                                                <label for="rememberme">
                                                    <input type="checkbox" id="rememberme" name="rememberme">Recordar
                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-md-6 pr-none">
                                            <?php if (isset($this->tramite->tituloUrlTramite)) { ?>
                                                <input type="hidden" value="<?php echo $this->tramite->tituloUrlTramite ?>" name="titulo_tramites">
                                                <?php
                                            }
                                            ?>
                                            <input type="submit" value="INGRESAR" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo URL ?>Usuarios/registrar" class="btn btn-success pull-left">Regístrate</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>



