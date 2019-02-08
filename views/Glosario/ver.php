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
                    <h1>Glosario Municipal</h1>
                </div>
				
                <div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Glosario</li>
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

            <div class="col-md-9 mb30">
					<!-- ID  LEER -->
				<div id="leer"> 
					<div class="row">
						<div class="col-md-8">
							<h2 class="mb-none"><strong>Glosario</strong> Municipal</h2>
							<p>Conoce sobre los diferentes conceptos de nuestra Municipalidad.</p>
						</div> 
					</div>

					<div class="row">
						<?php
						$str_string = null;
						
						if (!empty($this->glosarios)) {
							for ($i = 0; $i < count($this->glosarios); $i++) {
								
								($i == 0) ? $active = "active" : $active = "";

								$glosario = (object) $this->glosarios[$i];
								$str_string .= '<section class="toggle ' . $active . '">
													<a name="' . $glosario->urlGlosario . '" id="' . $glosario->urlGlosario . '"></a>
													<label>' . $glosario->nombreGlosario . '</label>
													<p>' . nl2br($glosario->descripcionGlosario) . '</p>
												</section>';
							}
						}
						?>
						<div class="col-md-12">
							<div class="toggle toggle-secondary" data-plugin-toggle>
								<?php echo $str_string ?>
							</div>
						</div>
					</div><!-- row -->
				</div><!-- /ID  LEER -->
            </div>
            <?php include TEMPLATE . 'sidebar.php'; ?>´
        </div><!-- /row -->

    </div><!-- container-->
    <div class="clearfix"></div>
    <div class="clearfix mt30"></div>

    <?php include './public/templates/votaciones.php'; ?>	
</div> <!-- /MAIN -->	
