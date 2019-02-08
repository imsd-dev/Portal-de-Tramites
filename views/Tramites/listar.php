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
                    <h1>
                        <?php
                        if (!empty($this->titulo)) {
                            echo "Trámites por " . $this->titulo;

                            switch ($this->titulo) {
                                case 'Categorías':
                                    $controller = 'Categorias/listar';
                                    $mensaje = '';
                                    break;
                                case 'Dirección':
                                    $controller = 'Direcciones/listar';
                                    $mensaje = 'Nuestras Direcciones Municipales';
                                    break;
                                case 'Sucursal':
                                    $controller = 'Sucursales/listar';
                                    $mensaje = 'Nuestras Sucursales Municipales';
                                    break;
                                case 'Unidad':
                                    $controller = 'Direcciones/listar';
                                    $this->titulo = 'Direcciones';
                                    $mensaje = 'Nuestras Unidades Municipales';
                                    break;
                            }
                        } else {
                            echo "Sin Trámites";
                            $controller = "";
                        }
                        ?>
                    </h1>
                </div>

                <div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>">Inicio</a></li>
                        <li><a href="<?php echo URL . $controller ?>"><?php echo $this->titulo ?></a></li>
                        <li class="active">Búsqueda</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>	

    <div class="container mt30">

        <div class="row hidden-md visible-xs">

            <div class="col-md-12 align-right">
                <?php include TEMPLATE . 'buscador-mobile.php'; ?>
            </div>
            <div class="clearfix"></div>
            <hr class="tall30">
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-none"><strong>Trámites</strong> que puedes realizar en <strong><?php echo $this->nombre ?></strong></h2>
                <p><?php echo $mensaje ?></p>
            </div> 
        </div>

        <!-- ID  LEER -->
        <div id="leer"> 
            <div class="row">

                <div class="col-md-9 mb30">

                    <div class="row">

                        <div class="col-md-12">
                            <?php //EM include TEMPLATE . 'mensajes.php'; ?>
                        </div>

                        <?php
                        if (!empty($this->tramites)) {

                            $count = count($this->tramites);
                            for ($i = 0; $i < $count; $i++) {
                                $tramite = (object) $this->tramites[$i];
                                ?>
                                <div class="col-md-12 col-sm-12">
                                    <div class="box-t1">
                                        <div class="text-left resultado">
                                            <a href="<?php echo URL ?>Tramites/ver/<?php echo $tramite->tituloUrlTramite ?>" title="Ver Trámite"><h4 class="mb-none"><?php echo $tramite->tituloTramite ?></h4></a>
                                            <?php
                                            if (!empty($tramite->departamento)) {
                                                echo "<p>Este Trámite depende de: " . $tramite->departamento . "</p>";
                                            }

                                            $canales = unserialize($tramite->canalesAtencionTramite);

                                            $str_canales = null;
                                            if (!empty($canales)) {

                                                $cnl = $canales['canales'];

                                                foreach ($cnl as $value) {
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
                                                    $str_canales .= '<li><i class="fa ' . $icon . '" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="' . $value . '"></i></li>';
                                                }
                                            }
                                            ?>

                                            <div id="info_type_tramite_mini" class="mt-lg">
                                                <ul>
                                                    <?php echo $str_canales ?>
                                                </ul>
                                            </div>

                                            <div class="line"></div>

                                            <div class="col-md-9">
                                                <p><?php echo $tramite->descripcionBreveTramite ?></p>
                                            </div>

                                            <div class="col-md-2 col-xs-12 pull-right">
                                                <a href="<?php echo URL ?>Tramites/ver/<?php echo $tramite->tituloUrlTramite ?>" class="btn btn-success btn-sm btn-block"> Ver Trámite</a> 
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        //Búsqueda por Tag
                        if (!empty($this->tramitesTag)) {

                            $count = count($this->tramitesTag);
                            for ($i = 0; $i < $count; $i++) {
                                $tramite = (object) $this->tramitesTag[$i];
                                ?>
                                <div class="col-md-12 col-sm-12 ">

                                    <div class="box-t1">
                                        <div class="text-left">
                                            <h4 class="mb-none"><?php echo $tramite->tituloTramite ?></h4>
                                            <?php
                                            if (!empty($tramite->departamento)) {
                                                echo "<p>Este Trámite depende de: " . $tramite->departamento . "</p>";
                                            }

                                            $canales = unserialize($tramite->canalesAtencionTramite);

                                            $str_canales = null;
                                            if (!empty($canales)) {

                                                $cnl = $canales['canales'];

                                                foreach ($cnl as $value) {
                                                    switch ($value) {
                                                        case 'Solicitud en Línea':
                                                            $icon = "fa-paper-plane";
                                                            break;
                                                        case 'Atención Telefónica':
                                                            $icon = "fa-volume-control-phone";
                                                            break;
                                                        case 'Presencial':
                                                            $icon = "fa-street-view";
                                                            break;
                                                        case 'Trámite 100% en Línea':
                                                            $icon = "fa fa-at";
                                                            break;
                                                    }
                                                    $str_canales .= '<li><i class="fa ' . $icon . '" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="' . $value . '"></i></li>';
                                                }
                                            }
                                            ?>

                                            <div id="info_type_tramite_mini" class="mt-lg">
                                                <ul>
                                                    <?php echo $str_canales ?>
                                                </ul>
                                            </div>

                                            <div class="line"></div>

                                            <div class="col-md-9">
                                                <p><?php echo $tramite->descripcionBreveTramite ?></p>
                                            </div>

                                            <div class="col-md-2 col-xs-12 pull-right">
                                                <a href="<?php echo URL ?>Tramites/ver/<?php echo $tramite->tituloUrlTramite ?>" class="btn btn-success btn-sm btn-block"> Ver Trámite</a> 
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div><!-- row -->


                </div>
                <div class="col-md-3">
                    <?php include TEMPLATE . 'sidebar-dire-tramite.php'; ?>
                </div>
            </div><!-- /row -->

        </div><!-- /ID  LEER -->

    </div><!-- container-->

    <div class="clearfix"></div>

  

</div> <!-- /MAIN -->	

