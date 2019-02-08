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
                    <h1>Categorías de Trámites</h1>
                </div>

               <div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Categorías </li>
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
				
				<div class="col-md-9 mb30">

					<div class="row">

						<?php
						if (!empty($this->categorias)) {

							$count = count($this->categorias);
							for ($i = 0; $i < $count; $i++) {
								$categorias = (object) $this->categorias[$i];
								?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
									<div class="box-t2">
										<a href="<?php echo URL ?>Tramites/categoria/<?php echo $categorias->categoriaID ?>">
											<img  alt="<?php echo $categorias->nombreCategoria ?>" src="<?php echo URL . 'public/' . $categorias->iconoPortadaCategoria ?>" class=" col-xs-12 col-md-12 col-lg-12 ">
										</a>
										<div class="clearfix"></div>
										<div class="mt20"></div>
										<a href="<?php echo URL ?>Tramites/categoria/<?php echo $categorias->categoriaID ?>" class="btn btn-turquoise btn-md"><i class="fa fa-list-ul"></i> Ver Trámites</a>
									</div>

								</div>
								<?php
							}
						} else {
							?>
							<div class="col-md-6 col-sm-12 ">No existen categorías para mostrar.</div>
							<?php
						}
						?>
					</div><!-- row -->
				</div>

				<?php include TEMPLATE . 'sidebar.php'; ?>´
			</div><!-- /ID  LEER -->
        </div><!-- /row -->

    </div><!-- container-->

    <div class="clearfix"></div>

    <?php include './public/templates/votaciones.php'; ?>

</div> <!-- /MAIN -->	