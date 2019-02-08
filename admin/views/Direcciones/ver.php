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
                    <h1>Direcciones Municipales </h1>
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
                            <h2 class="mt-xl"><strong>Dirección</strong> <?php echo $this->direccion->nombreDireccion ?></h2>
                            <p class="lead">
                                <?php echo $this->direccion->descripcionDireccion ?>
                            </p>
                            <p>
                                <?php echo $this->direccion->descripcionDireccion ?>
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-user"></i>Director: <?php echo $this->direccion->encargadoDireccion ?> </li>
                                <li><i class="fa fa-phone"></i>Teléfono: <?php echo $this->direccion->telefonoContactoDireccion ?> </li>
                                <li><i class="fa fa-envelope-o"></i>Email: <?php echo $this->direccion->emailEncargadoDireccion ?></li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-8">
                            <h4>Unidades <strong>de la Dirección</strong></h4>	

                            <ul class="list-unstyled">
                                <?php
                                if (!empty($this->unidades)) {

                                    $countUn = count($this->unidades);
                                    for ($i = 0; $i < $countUn; $i++) {

                                        $unidades = (object) $this->unidades[$i];
                                        echo '<li class="mb20"><a href="' . URL . 'Unidades/ver/' . $unidades->unidadID . '">' . $unidades->nombreUnidad . '</a>  <a href="' . URL . 'Tramites/unidad/' . $unidades->unidadID . '" class="btn btn-purple btn-sm pull-right">Ver Trámites</a></li>';
                                    }
                                } else {
                                    echo '<li class="mb20">No existen Unidades asociadas a esta dirección</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="row mt30">
                        <div class="col-md-12">
                            <h4><strong>Sucursales</strong> donde atiende esta Dirección</h4>	
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
                            }else{
                                echo "<span>No existen Sucursales asociadas a esta Dirección.</span>";
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

