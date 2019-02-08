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
                    <h1>Sucursales Municipales</h1>
                </div>

                <div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Sucursales </li>
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

        <div class="row">

            <div class="col-md-12 mb30">
				<!-- ID  LEER -->
				<div id="leer"> 
					<div class="row">
						<div class="col-md-8">
							<h2 class="mb-none"><strong>Nuestras</strong> Sucursales Municipales</h2>
							<p>Sucursales en las que se realizan Trámites.</p>
						</div> 
					</div>

					<div class="row">
						<?php
						if (!empty($this->sucursales)) {

							$count = count($this->sucursales);
							for ($i = 0; $i < $count; $i++) {
								$sucursal = (object) $this->sucursales[$i];
								?>
								<div class="col-md-4 col-sm-12 ">
									<div class="box-t1 ">
										<h4 class="mb-none"><?php echo $sucursal->nombreSucursal ?></h4>

										<i class="fa fa-building-o ml10"></i> <?php echo $sucursal->horarioInicioSucursal ?>  a  <?php echo $sucursal->horarioFinSucursal ?> 
										<br>
										<?php
										echo "<i class='fa fa-phone ml10'></i> " . $sucursal->fono1Sucursal;
										if ($sucursal->fono2Sucursal != null) {
											echo "<i class='fa fa-phone ml10'></i> " . $sucursal->fono2Sucursal;
										}

										if ($sucursal->wifiSucursal == 1) {
											echo '<div class="text-center text-success mt-md">
													<i class="fa fa-wifi ico30" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="Edificio con WIFI libre"></i>
												 </div>';
										} else {
											echo '<div class="text-center mt-md">
													<i class="fa fa-wifi ico30" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="Edificio sin WIFI"></i>
												 </div>';
										}
										?> 
										<div class="line mt10"></div>

										<p> <?php echo $sucursal->direccionSucursal ?> </p>

										<div class="mt20"></div>
										<?php if ($sucursal->cantidadTramites > 0) { ?>
											<a href="<?php echo URL ?>Tramites/sucursal/<?php echo $sucursal->sucursalID ?>" class="btn btn-red btn-sm"><i class="fa fa-list-ul"></i> Ver Trámites Disponibles</a>
										<?php } else {
											?>
											<button disabled="" class="btn btn-sm"><i class="fa fa-list-ul"></i> Sucursal sin Trámites asociados</button>
											<?php
										}
										?>

									</div>

								</div>
								<?php
							}
							?>
							<?php
						} else {
							?>
							<div class="col-md-6 col-sm-12 ">No existen sucursales para mostrar.</div>
							<?php
						}
						?>
					</div><!-- row -->
				</div>
            </div>

        </div><!-- /row -->

    </div><!-- container-->

    <div class="clearfix"></div>

 

</div> <!-- /MAIN -->	