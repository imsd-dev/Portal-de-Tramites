<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * UI/UX Alan Pereda N. 
 * © Copyright - Municipalidad de Peñalolén
 */
?>
<div role="main" class="main">

    <div class="container mt30">
        <div class="row hidden-md visible-xs">

            <div class="col-md-12 align-right">
                <?php //include TEMPLATE . 'buscador-mobile.php'; ?>
            </div>
            <div class="clearfix"></div>
            <hr class="tall30">

        </div>
        
        <?php include TEMPLATE . 'mensajes.php'; ?>
        
        <div class="row">
            <div class="col-md-12 mb30">
                <div class="row mb30 hidden-xs">
                    <div class="col-md-12 center">
                        <h1 class="word-rotator-title mb-sm">Encuentre toda la información sobre nuestros <span class="word-rotate" data-plugin-options='{"delay": 2000, "animDelay": 300}'>

                                    <strong class="inverted inverted-tertiary">

                                        <span class="word-rotate-items">
                                            <span>Trámites en Línea</span>
                                            <span>Trámites Presenciales</span>
                                            <span>Pagos y Contribuciones</span>
                                            <span>Subsidios y Becas</span>
                                            <span>Programas Sociales</span>
                                            <span>Cursos y Talleres</span>
                                        </span>

                                    </strong>

                                </span>  
						</h1>
                        
                    </div>
                </div>
                <div class="row mb30 visible-xs">
                    <div class="col-md-12 center">
					
					<div class="title-mobile">Escribe el trámite que buscas</div>
                        
                        
                    </div>
                </div>
                

                <div class="col-md-12 align-right">
                    <form action="<?php echo URL ?>Tramites/buscar" method="post">
                        <div class="input-group input-search">
                            <input type="text" placeholder="Ej: Permiso circulación" name="buscar" class="typeahead form-control input-lg mb-md" aria-labelledby="buscartramite" title="Buscar Trámites">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-red mb-md btn-lg" id="buscartramite" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]+"  >
								<span class="hidden-xs"><span class="fa fa-search"></span> Buscar Trámite</span>
								<span class="visible-xs">Buscar</span>
								
								</button>
                            </span>
                        </div>
                    </form>
                </div>
		 
				
				
                <div class="clearfix "></div>
				 
			
				<!-- ID  LEER -->
				<div id="leer"> 
					<?php include TEMPLATE . 'menu-iconos-index.php'; ?>

					<div class="row  mb30">								 
						<div class="title mb-sm  text-center">Búsqueda por Temática</div>
						<hr class="tall30 mb30">

						<div class="col-md-4">
							<div class="ximena">
								
								<div class="ribbon top">
									<span>destacados</span>
								</div>
								
								<div class="text-center">	
									<div class="ico-pagos"> </div>
									<span class="title-icons"><strong>Pagos</strong><br> Municipales</span>
								</div>
								
								<ul class="nav nav-list">
									<?php
									if (!empty($this->tramites_pagos)) {
										
										for ($i = 0; $i < 5; $i++) {
											$tramite = (object) $this->tramites_pagos[$i];
											echo '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 40) . '</a></li>';
										}
									} else {
										echo '<li>No hay Trámites de Pago disponibles.</li><li>&nbsp;</li>';
									}
									?>
								</ul>
									<div class="align-center mt20">
									<a title="Ver todos los pagos" href="<?php echo URL ?>Tramites/categoria/1" class="btn btn-md btn-red">
									<!--span class="fa fa-hand-o-right"></span--> VER TODOS LOS PAGOS</a>
								</div>
							</div>
						</div> <!-- col-md-4--> 
						<div class="col-md-4">
							<div class="ximena">
								<div class="ribbon">
									<span>Popular</span>
								</div>
								<div class="text-center">									
									<div class="ico-certificados"> </div>
									<span class="title-icons"><strong>Certificados</strong><br> Municipales</span>
								</div>
								
								<ul class="nav nav-list">
									<?php
									if (!empty($this->tramites_certificados)) {
										
										for ($i = 0; $i < 5; $i++) {
											$tramite = (object) $this->tramites_certificados[$i];
											echo '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 40) . '</a></li>';
										}
									} else {
										echo '<li>No hay Trámites de Certicados disponibles.</li><li>&nbsp;</li>';
									}
									?>
								</ul>
									<div class="align-center mt20">
									<a  title="Ver todos los certificados" href="<?php echo URL ?>Tramites/categoria/3" class="btn btn-md btn-red">VER TODOS LOS CERTIFICADOS</a>
								</div>
							</div>
						</div> <!-- col-md-4--> 
						<div class="col-md-4">
							<div class="ximena">
								
								<div class="text-center">									
									<div class="ico-becas"> </div>
									<span class="title-icons"><strong>Becas</strong><br> Municipales</span>
								</div>
								
								<ul class="nav nav-list">
									<?php
									if (!empty($this->tramites_becas)) {
										
										for ($i = 0; $i < 5; $i++) {
											$tramite = (object) $this->tramites_becas[$i];
											echo '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 40) . '</a></li>';
										}
									} else {
										echo '<li>No hay Trámites de Becas disponibles.</li><li>&nbsp;</li>';
									}
									?>
								</ul>
								<div class="align-center mt20">
									<a  title="Ver todas becas disponibles" href="<?php echo URL ?>Tramites/categoria/2" class="btn btn-md btn-red">VER TODAS LAS BECAS DISPONIBLES</a>
								</div>
							</div>
						</div> <!-- col-md-4--> 

					</div>

					<div class="title mb-sm  text-center">Buscar por <strong>Trámites</strong> destacados</div>

					<hr class="tall30 mb30">
					<div class="row  mb30">								 

						<div class="col-md-4">
							<div class="services_box">
								
								
								<div class="text-center">
									<div class="ico-nuevos"> </div>
									<span class="title-icons"><strong>Trámites</strong><br> Destacados</span>
								</div>
								
								<ul class="nav nav-list">
									<?php
									if (!empty($this->tramites_dest)) {
										$count = count($this->tramites_dest);

										for ($i = 0; $i < $count; $i++) {
											$tramite = (object) $this->tramites_dest[$i];
											echo '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 40) . '</a></li>';
										}
									} else {
										echo '<li>No hay Trámites Destacados disponibles.</li><li>&nbsp;</li>';
									}
									?>
								</ul>
							</div>
						</div> <!-- col-md-4--> 
						
						
						<div class="col-md-4">
							<div class="services_box">
								
								<div class="text-center">
									<div class="ico-destacados"> </div>
									<span class="title-icons"><strong>Nuevos </strong><br> Trámites</span>
								</div>
								
								<ul class="nav nav-list">
									<?php
									if (!empty($this->tramites_nvos)) {
										$count_nvos = count($this->tramites_nvos);

										for ($i = 0; $i < $count_nvos; $i++) {
											$tramite = (object) $this->tramites_nvos[$i];
											echo '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 40) . '</a></li>';
										}
									} else {
										echo '<li>No hay Trámites Nuevos disponibles.</li><li>&nbsp;</li>';
									}
									?>
								</ul>
							</div>
						</div> <!-- col-md-4--> 
						
						
						<div class="col-md-4">
							<div class="services_box">
							   
								<div class="text-center">
									<div class="ico-frecuentes"> </div>
									<span class="title-icons"><strong>Trámites</strong><br> Frecuentes</span>
								</div>
								
								<ul class="nav nav-list">
									<?php
									if (!empty($this->tramites_frec)) {
										$count_frec = count($this->tramites_frec);

										for ($i = 0; $i < $count_frec; $i++) {
											$tramite = (object) $this->tramites_frec[$i];
											echo '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 40) . '</a></li>';
										}
									} else {
										echo '<li>No hay Trámites Frecuentes disponibles.</li><li>&nbsp;</li>';
									}
									?>
								</ul>
							</div>
						</div> <!-- col-md-4--> 

					</div><!-- /row  mb30 -->

				</div><!-- /ID  LEER -->

            </div><!-- /col-md-12 mb30-->
        </div><!-- /row -->
    </div><!-- container-->

    <div class="clearfix "></div>

    <?php // include './public/templates/votaciones.php'; ?>

</div> <!-- /MAIN -->	

