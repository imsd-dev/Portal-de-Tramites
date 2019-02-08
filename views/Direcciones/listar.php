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
				<div class="col-md-6 col-xs-12">
                    <h1>Direcciones Municipales</h1>
                </div>
				
				<div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li><a href="<?php echo URL ?>Direcciones/listar">Direcciones</a></li>
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

        <div class="row">
			<!-- ID  LEER -->
			<div id="leer"> 
				<div class="col-md-12 mb30">

					<div class="row">
						<div class="col-md-8">
							<h2 class="mb-none"><strong>Nuestras</strong> Direcciones Municipales</h2>
							<p>Selecciona la dirección municipal en la cual deseas buscar trámites.</p>
						</div> 
					</div>

					<div class="row">
						
						<?php
						if (!empty($this->direcciones)) {

							$count = count($this->direcciones);
							for ($i = 0; $i < $count; $i++) {
								$direccion = (object) $this->direcciones[$i];
								?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 ">
									<div class="box-t2 h-320">
										<div class="h-direccion">
									
											<a href="<?php echo URL ?>Direcciones/ver/<?php echo $direccion->nombreUrlDireccion ?>">
											<img alt="<?php echo $direccion->nombreDireccion ?>" src="<?php echo URL . 'public/'. $direccion->imagenDireccion ?>" class="mt20 mb30 w-direccion"> </a>
										</div>
										
										<div class="clearfix"></div>
										
										<span class="title-t2"><strong><?php echo $direccion->nombreDireccion ?></strong></span>									
										
										<div class="row mt20">
											<i class="fa fa-phone ml10"></i>  <?php echo $direccion->telefonoContactoDireccion ?>
										</div>
										
										<div class="bt-bottom">
											<a href="<?php echo URL ?>Tramites/direccion/<?php echo $direccion->direccionID ?>" class="btn btn-turquoise btn-md btn-block mt20 bt-direccion"><i class="fa fa-list-ul"></i> Ver Trámites</a>
										</div>
									</div>

								</div>
								<?php
							}
							?>
							<?php
						} else {
							?>
							<div class="col-md-6 col-sm-12 ">No existen dirección para mostrar.</div>
							<?php
						}
						?>
					</div><!-- row -->
				</div>
			</div><!-- /ID  LEER -->

        </div><!-- /row -->

    </div><!-- container-->

    <div class="clearfix"></div>


</div> <!-- /MAIN -->	