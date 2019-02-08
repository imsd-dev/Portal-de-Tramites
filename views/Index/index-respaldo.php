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
                <?php include TEMPLATE . 'buscador-mobile.php'; ?>
            </div>
            <div class="clearfix"></div>
            <hr class="tall30">

        </div>
        
        <?php include TEMPLATE . 'mensajes.php'; ?>
        
        <div class="row">
            <div class="col-md-12 mb30">
                <div class="row mb30">
                    <div class="col-md-12 center">
                        <h1 class="word-rotator-title mb-sm">Bienvenido hemos creamos un portal de <strong>tramites municipales</strong> mucho más <span class="word-rotate" data-plugin-options='{"delay": 2000, "animDelay": 300}'>

                                    <strong class="inverted inverted-tertiary">

                                        <span class="word-rotate-items">
                                            <span>dinámico</span>
                                            <span>amigable</span>
                                            <span>completo</span>
                                            <span>participativo</span>
                                        </span>

                                    </strong>

                                </span>  
						</h1>
                        
                    </div>
                </div>
               <div class="clearfix mb30"></div>

                <div class="col-md-12 align-right hidden-xs">
                    <form action="<?php echo URL ?>Tramites/buscar" method="post">
                        <div class="input-group input-search">
                            <input type="text" placeholder="Buscar ejemplo: Permiso circulación" name="buscar" class="typeahead form-control input-lg mb-md">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-red mb-md btn-lg fix-btn-gruop"><i class="fa fa-search"></i> Buscar Trámite</button>
                            </span>
                        </div>
                    </form>
                </div>
				
				<div class="clearfix "></div>
                
				<div class="col-md-12 align-right">
				
				
                    <!--script>
  (function() {
    var cx = '017975091692967427154:rh9k6v2u5si';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search-->
					
					
					
				</div>

               
				
				
                <div class="clearfix "></div>
				<!--  nuevo buscador -->
				
				 <!--div class="col-md-12 align-right hidden-xs">
                    <div id="search_bar">
						<form>
							<div id="custom-search-input">
								<input type="text" placeholder="Ej: Permiso circulación..." class=" search-query">
								<input type="submit" value="submit" class="btn_search">
							</div>
						</form>
					</div>
                </div>
                <div class="clearfix "></div-->
				<!--  nuevo buscador -->
			
				<!-- ID  LEER -->
				<div id="leer"> 
					<?php include TEMPLATE . 'menu-iconos-index.php'; ?>

					<div class="row  mb30">								 
						<h2 class="mb-sm  text-center">Búsqueda por <strong>Temáticas</strong> </h2>
						<hr class="tall30 mb30">

						<div class="col-md-4">
							<div class="ximena">
								
								<div class="ribbon top">
									<span>destacados</span>
								</div>
								
								<div class="text-center">
									<a href="<?php echo URL ?>Tramites/categoria/1">
									<img style="width:92px;" src="<?php echo URL ?>public/img/fix.png" data-original-title="Ver todas los Pagos Municipales" data-plugin-tooltip="" data-toggle="tooltip"  
									alt="Ver todas los Pagos Municipales" data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}" data-original="<?php echo URL ?>public/img/icons/pagos-municipales.svg"></a>
									
									
							 
									
									<h4 class="title-icons"><strong>Pagos</strong><br> Municipales</h4>
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
								<div class="align-left mt10">
									<a  title="Ver todos los pagos" href="<?php echo URL ?>Tramites/categoria/1"><i class="fa fa-hand-o-right " style="font-size: 15px !important;"></i> VER TODOS LOS PAGOS</a>
								</div>
							</div>
						</div> <!-- col-md-4--> 
						<div class="col-md-4">
							<div class="ximena">
								<div class="ribbon">
									<span>Popular</span>
								</div>
								<div class="text-center">
									<a href="<?php echo URL ?>Tramites/categoria/3">
									<img style="width:92px;" src="<?php echo URL ?>public/img/fix.png" data-original-title="Ver todos los Cerfificados Disponibles" data-plugin-tooltip="" data-toggle="tooltip"  alt="Ver todos los Cerfificados Disponibles" data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}" data-original="<?php echo URL ?>public/img/icons/certificados-municipales.svg"></a>
									
									<h4 class="title-icons"><strong>Certificados</strong><br> Municipales</h4>
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
								<div class="align-left mt10">
									<a  title="Ver todos los certificados" href="<?php echo URL ?>Tramites/categoria/3"><i class="fa fa-hand-o-right " style="font-size: 15px !important;"></i> VER TODOS LOS CERTIFICADOS</a>
								</div>
							</div>
						</div> <!-- col-md-4--> 
						<div class="col-md-4">
							<div class="ximena">
								
								<div class="text-center">
									<a href="<?php echo URL ?>Tramites/categoria/2">
									<img style="width:92px;" src="<?php echo URL ?>public/img/fix.png" data-original-title="Ver todas las Becas Municipales Disponibles" data-plugin-tooltip="" data-toggle="tooltip"  alt="Becas Municipales" data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}" data-original="<?php echo URL ?>public/img/icons/becas-municipales.svg"></a>
									
									<h4 class="title-icons"><strong>Becas</strong><br> Municipales</h4>
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
								<div class="align-left mt10">
									<a  title="Ver todos los Trámites de Becas" href="<?php echo URL ?>Tramites/categoria/2"><i class="fa fa-hand-o-right " style="font-size: 15px !important;"></i> VER TODOS LAS BECAS</a>
								</div>
							</div>
						</div> <!-- col-md-4--> 

					</div>

					<h2 class="mb-sm  text-center">Buscar por <strong>Trámites</strong> destacados</h2>

					<hr class="tall30 mb30">
					<div class="row  mb30">								 

						<div class="col-md-4">
							<div class="services_box">
								
								
								<div class="text-center">
									<a href="<?php echo URL ?>">
									<img style="width:92px;" src="<?php echo URL ?>public/img/fix.png" data-original-title="Ver Trámites destacados" data-plugin-tooltip="" data-toggle="tooltip"  alt="Trámites destacados" data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}" data-original="<?php echo URL ?>public/img/icons/tramites-destacados.svg"></a>
									
									<h4 class="title-icons"><strong>Trámites</strong><br> Destacados</h4>
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
									<a href="<?php echo URL ?>">
									<img style="width:92px;" src="<?php echo URL ?>public/img/fix.png" data-original-title="Ver nuevos Trámites" data-plugin-tooltip="" data-toggle="tooltip"  alt="Ver nuevos Trámites" data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}" data-original="<?php echo URL ?>public/img/icons/nuevos-tramites.svg"></a>
									
									<h4 class="title-icons"><strong>Nuevos </strong><br> Trámites</h4>
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
									<a href="<?php echo URL ?>">
									<img style="width:92px;" src="<?php echo URL ?>public/img/fix.png" data-original-title="Ver Trámites Frecuentes" data-plugin-tooltip="" 
									data-toggle="tooltip"  alt="Trámites Frecuentes" data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}" data-original="<?php echo URL ?>public/img/icons/tramites-frecuentes.svg"></a>
									
									<h4 class="title-icons"><strong>Trámites</strong><br> Frecuentes</h4>
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

    <?php include './public/templates/votaciones.php'; ?>

</div> <!-- /MAIN -->	

