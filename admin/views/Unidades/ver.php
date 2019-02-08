<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
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
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h1>Unidades Municipales </h1>
                </div>

            </div>
        </div>
    </section>	

    <div class="container mt30">
        <div class="row hidden-md visible-xs">

            <div class="col-md-12 align-right">
                <div class="input-group input-search">
                    <input type="text" placeholder="Buscar..." id="q" name="q" class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-red"><i class="fa fa-search"></i> buscar</button>
                    </span>
                </div>

            </div>
            <div class="clearfix"></div>
            <hr class="tall30">

        </div>

        <div class="row">

            <div class="row">

                <div class="col-md-9 mb30">

                    <div class="row">

                        <div class="col-md-12 mb30">
                            <h2 class="mt-xl"><strong>Unidad</strong> <?php echo $this->unidad->nombreUnidad ?></h2>
                            <p class="lead">
                                <?php echo $this->unidad->descripcionUnidad ?>
                            </p>
                            <p>
                                <?php echo $this->unidad->descripcionUnidad ?>
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-user"></i>Encargado: <?php echo $this->unidad->encargadoUnidad ?> </li>
                                <li><i class="fa fa-phone"></i>Teléfono: <?php echo $this->unidad->telefonoContactoUnidad ?> </li>
                                <li><i class="fa fa-envelope-o"></i>Email: <?php echo $this->unidad->emailEncargadoUnidad ?></li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-8">
                            <h4>Trámites <strong>de la Unidad</strong></h4>	

                            <ul class="list-unstyled">
                                <?php
                                if (!empty($this->tramites)) {

                                    $countUn = count($this->tramites);
                                    for ($i = 0; $i < $countUn; $i++) {

                                        $tramite = (object) $this->tramites[$i];
                                        echo '<li class="mb20"><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 60) . '</a>  <a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '" class="btn btn-purple btn-sm pull-right">Ver Trámite</a></li>';
                                    }
                                } else {
                                    echo '<li class="mb20">No existen Trámites asociadas a esta Unidad</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="row mt30">
                        <div class="col-md-12">
                            <h4><strong>Sucursales</strong> donde atiende esta Unidad</h4>	
                            <?php
                            if (!empty($this->sucursales)) {
                                $count = count($this->sucursales);

                                for ($i = 0; $i < $count; $i++) {

                                    $sucursal = (object) $this->sucursales[$i];
                                    ?>
                                    <div class="col-md-6 col-sm-12 ">
                                        <div class="box-t1 ">
                                            <h4 class="mb-none"><?php echo $sucursal->nombreSucursal ?></h4>

                                            <ul class="list-unstyled mt20">
                                                <li><i class="fa fa-phone"></i>Teléfono: <?php echo $sucursal->fono1Sucursal ?></li>
                                                <li><i class="fa fa-envelope-o"></i>Días de Atención: <?php echo $sucursal->diasAtencionSucursal ?></li>
                                                <li><i class="fa fa-home"></i>Dirección: <?php echo $sucursal->direccionSucursal ?></li>
                                                <li><i class="fa fa-home"></i>Horarios: <?php echo $sucursal->horarioInicioSucursal ?> a las <?php echo $sucursal->horarioFinSucursal ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<span>No existen Sucursales asociadas a esta Unidad.</span>";
                            }
                            ?>
                        </div>								 

                    </div><!-- row -->
                </div>
                <?php include TEMPLATE . 'sidebar.php'; ?>´

            </div><!-- /row -->
        </div><!-- /row -->

    </div><!-- container-->

    <div class="clearfix"></div>

    <?php include './public/templates/votaciones.php'; ?>

</div> <!-- /MAIN -->	

