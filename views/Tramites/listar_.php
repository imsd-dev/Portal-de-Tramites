<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<div role="main" class="main">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Trámites </li>
                        <li class="active" style="color: #fff;">Ver </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h1><?php
                        if (!empty($this->titulo)) {
                            echo "Ver Trámites por " . $this->titulo;
                        } else {
                            echo "Sin Trámites";
                        }
                        ?></h1>
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
        <hr class="tall30 hidden-print">

        <div class="row">

            <div class="col-md-9 mb30">

                <div class="row">

                    <div class="col-md-12">
                        <?php include TEMPLATE . 'mensajes.php'; ?>
                    </div>

                    <?php
                    if (!empty($this->tramites)) {

                        $count = count($this->tramites);
                        for ($i = 0; $i < $count; $i++) {
                            $tramite = (object) $this->tramites[$i];
                            ?>
                            <div class="col-md-12 col-sm-12 ">
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

            <?php include TEMPLATE . 'sidebar.php'; ?>´
        </div><!-- /row -->
    </div><!-- container-->

    <div class="clearfix"></div>

    <?php include './public/templates/votaciones.php'; ?>

</div> <!-- /MAIN -->	

