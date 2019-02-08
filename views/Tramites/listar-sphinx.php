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
                    <h1><?php
                        if (!empty($this->titulo)) {
                            echo "Ver Trámites por " . $this->titulo;
                        } else {
                            echo "Resultados de Busqueda";
                        } 
                        ?></h1>
                </div>
				
                <div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="http://tramites.santodomingo.cl/" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Trámites </li>
                        <li class="active" style="color: #fff;">Ver </li>
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

        <div class="col-md-12 align-right hidden-print hidden-xs">
            <form action="<?php echo URL ?>Tramites/buscar" method="post">
                <div class="input-group input-search">
                    <!--input type="text" placeholder="Buscar..." id="q" name="q" class="form-control"-->
                    <input type="text" placeholder="Buscar ejemplo: Permiso circulación" name="buscar" class="typeahead form-control input-lg mb-md tt-input">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-red mb-md btn-lg fix-btn-gruop"><i class="fa fa-search"></i> Buscar Trámite</button>
                    </span>
                </div>
            </form>
            <div class="clearfix"></div>
            <hr class="tall30 hidden-print">
        </div>

        <div class="row">

            <div class="col-md-9 mb30">
                <div class="row">
				<!-- ID  LEER -->
    				<div id="leer"> 
                        <div class="col-md-12">
                            <?php include TEMPLATE . 'mensajes.php'; ?>
                        </div>

                        <?php
                        if (!empty($this->res_direcciones)) {

                            foreach ($this->res_direcciones as $key => $value) {

                                $titulo =             $value['nombredireccion'];
                                $descripcion =        $value['descripciondireccion'];
                                $nombreUrlDireccion = $value['nombreurldireccion'];
                                $direccionID = $key;
                                ?>

                                <div class="col-md-12 col-sm-12 ">



                                    <div class="box-t1">
                                        <div class="text-left resultado">
                                            <a href="<?php echo URL ?>Direcciones/ver/<?php echo $nombreUrlDireccion ?>" title="Ver Dirección"><h4 class="mb-none"><?php echo $titulo ?></h4></a>

                                            <div class="line"></div>

                                            <div class="col-md-9">
                                                <p><?php echo $descripcion ?></p>
                                            </div>

                                            <div class="col-md-2 col-xs-12 pull-right">
                                                <a href="<?php echo URL ?>Direcciones/ver/<?php echo $nombreUrlDireccion ?>" class="btn btn-success btn-md btn-block"> Ver Dirección</a>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        if (!empty($this->tramites))        {

                            foreach ($this->tramites as $value) {

                                $tituloTramite =          $value['titulotramite'];
                                $canalesatenciontramite = $value['canalesatenciontramite'];
                                $descripciontramite =     $value['descripciontramite'];
                                $descripcionbrevetramite= $value['descripcionbrevetramite'];
                                $titulourltramite =       $value['titulourltramite'];
                                $nombredireccion =        $value['nombredireccion'];
                                ?>

                                <div class="col-md-12 col-sm-12 ">

                                    <div class="box-t1">
                                        <div class="text-left resultado">
                                            <a href="<?php echo URL ?>Tramites/ver/<?php echo $titulourltramite ?>" title="Ver Trámite"><h4 class="mb-none"><?php echo $tituloTramite ?></h4></a>
                                            <?php
                                            if ($nombredireccion != null) {
                                                echo "<p>Este Trámite depende de: " . $nombredireccion . "</p>";
                                            }

                                            $canales = unserialize($canalesatenciontramite);

                                            $str_canales = null;
                                            if (!empty($canales)) {

                                                $cnl = $canales['canales'];

                                                if ($cnl != null) {
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
                                            }
                                            ?>

                                            <div id="info_type_tramite_mini" class="mt-lg">
                                                <ul>
                                                    <?php echo $str_canales ?>
                                                </ul>
                                            </div>

                                            <div class="line"></div>

                                            <div class="col-md-9">
                                                <p><?php echo $descripcionbrevetramite ?></p>
                                            </div>

                                            <div class="col-md-2 col-xs-12 pull-right">
                                                <a href="<?php echo URL ?>Tramites/ver/<?php echo $titulourltramite ?>" class="btn btn-success btn-sm btn-block"> Ver Trámite</a>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        if (!empty($this->res_unidades))    {

                            foreach ($this->res_unidades as $key => $value) {

                                $titulo = $value['nombreunidad'];
                                $descripcion = $value['descripcionunidad'];
                                $nombreUrlUnidad = $value['nombreurlunidad'];
                                $unidadID = $key;
                                ?>

                                <div class="col-md-12 col-sm-12 ">
                                    <div class="box-t1">
                                        <div class="text-left resultado">
                                            <a href="<?php echo URL ?>Unidades/ver/<?php echo $nombreUrlUnidad ?>" title="Ver Dirección"><h4 class="mb-none"><?php echo $titulo ?></h4></a>

                                            <div class="line"></div>

                                            <div class="col-md-9">
                                                <p><?php echo $descripcion ?></p>
                                            </div>

                                            <div class="col-md-2 col-xs-12 pull-right">
                                                <a href="<?php echo URL ?>Unidades/ver/<?php echo $nombreUrlUnidad ?>" class="btn btn-success btn-sm btn-block"> Ver Unidad</a>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        if (!empty($this->res_sucursales)) {

                            foreach ($this->res_sucursales as $key => $value) {

                                $titulo = $value['nombresucursal'];
                                $descripcion = $value['direccionsucursal'];
                                $sucursalID = $key;
                                ?>

                                <div class="col-md-12 col-sm-12 ">
                                    <div class="box-t1">
                                        <div class="text-left resultado">
                                            <a href="<?php echo URL ?>Sucursales/listar" title="Ver Dirección"><h4 class="mb-none"><?php echo $titulo ?></h4></a>

                                            <div class="line"></div>

                                            <div class="col-md-9">
                                                <p><?php echo $descripcion ?></p>
                                            </div>

                                            <div class="col-md-2 col-xs-12 pull-right">
                                                <a href="<?php echo URL ?>Sucursales/listar" class="btn btn-success btn-sm btn-block"> Ver Sucursales</a>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div><!-- leer -->
                </div><!-- row -->
            </div>

            <?php include TEMPLATE . 'sidebar.php'; ?>´
        </div><!-- /row -->
    </div><!-- container-->

    <div class="clearfix"></div>

    <?php include './public/templates/votaciones.php'; ?>

</div> <!-- /MAIN -->	

