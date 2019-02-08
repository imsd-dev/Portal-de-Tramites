<?php
/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */
?>

<div role="main" class="main">

    <section class="page-header">
        <div class="container">
            <div class="row">
			
				<div class="col-md-6 col-xs-12">
                    <h1>Preguntas frecuentes </h1>
                </div>
				
                <div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Preguntas Frecuentes </li>
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
						<div class="col-md-8">
							<h2 class="mb-none"><strong>Preguntas </strong> Frecuentes</h2>
							<p>Conoce sobre los diferentes conceptos de nuestra Municipalidad.</p>
						</div> 
					</div>

					<div class="row">
						<?php
						$str_string = null;

						if (!empty($this->preguntas)) {
							for ($i = 0; $i < count($this->preguntas); $i++) {

								($i == 0) ? $active = "active" : $active = "";

								$preguntas = (object) $this->preguntas[$i];
								$str_string .= '<section class="toggle ' . $active . '">
													<a name="' . $preguntas->urlPreguntaFrecuente . '" id="' . $preguntas->urlPreguntaFrecuente . '"></a>
													<label>' . $preguntas->nombrePreguntaFrecuente . '</label>
													<p>' . nl2br($preguntas->descripcionPreguntaFrecuente) . '</p>
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
				</div>
			</div><!-- /ID  LEER -->
            <?php include TEMPLATE . 'sidebar.php'; ?>´
        </div><!-- /row -->

    </div><!-- container-->
    <div class="clearfix"></div>
    <div class="clearfix mt30"></div>

    <?php // include './public/templates/votaciones.php'; ?>	
</div> <!-- /MAIN -->	
