<header id="header" class="hidden-print" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": false}'>
    <div class="header-body nazka-header">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-logo">
                        <a href="<?php echo URL ?>">
                            <img alt="Municipalidad de Peñalolén"
                                 width="222" height="108" 
                                 data-sticky-width="162" 
                                 data-sticky-height="72" 
                                 data-sticky-top="0" src="<?php echo URL ?>public/img/logo.png" >
                        </a>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
					
					<div class="col-md-8 up-s">
						<div class="header-search hidden-xs">
                            <form action="<?php echo URL ?>Tramites/buscar" method="post">
                                <div class="input-group input-search">
                                    <!--input type="text" class="form-control" name="q" id="q" placeholder="Buscar" required-->
                                    <input type="text" name="buscar" placeholder="Ej. Permiso circulación"  class="typeahead form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
					</div>
					
					
					
					<div class="col-md-12"> 
					
						<!--div class="col-md-6">
								<ul class="nav nav-pills">
									<li class="hidden-xs">
										<a href="http://www.penalolen.cl/" target="_blank"><i class="fa fa-angle-right"></i> Municipalidad</a>
									</li>
									<li class="hidden-xs">
										<a href="http://oirsdigital.penalolen.cl/" target="_blank"><i class="fa fa-angle-right"></i> OIRS</a>
									</li>
									<li>
										<span class="hidden-xs"><i class="fa fa-phone"></i> +562 2486 8000</span>
									</li>
								</ul>
						</div-->
						<nav class="header-nav-top  hidden-xs">
							
							
							<div class="col-md-12">
								<ul class="header-social-icons social-icons">
									<li class="social-icons-facebook"><a href="https://www.facebook.com/munipena/" title="Facebook Peñalolén" rel="external"><i class="fa fa-facebook"></i></a></li>
									<li class="social-icons-twitter"><a href="https://twitter.com/penalolen"  title="Twitter Peñalolén" rel="external"><i class="fa fa-twitter"></i></a></li>
									
									<li class="social-icons-youtube"><a href="https://www.youtube.com/user/ComunaDigital"  title="Yutube Peñalolén" rel="external"><i class="fa fa-youtube"></i></a></li>
									<li class="social-icons-rss"><a href="http://dportal.penalolen.cl/feed"  title="Noticias RSS Peñalolén" rel="external"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
					
 
							
                            <!-- div class="visible-xs mb30"></div-->
                        </nav>
					</div>
						
						
                        
                        
                    </div>
                    <div class="header-row">
                        <div class="header-nav">
                            <button class="btn header-btn-collapse-nav top-menu-xs" data-toggle="collapse" data-target=".header-nav-main">
                                <i class="fa fa-bars"></i>
                            </button>
                           
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse ">
                                <nav>
                                    <ul class="nav nav-pills" id="mainNav">

                                        <li>
                                            <a href="<?php echo URL ?>">
                                                Inicio
                                            </a>
                                        </li> 
                                        <li>
                                            <a href="<?php echo URL ?>Direcciones/listar">
                                                Direcciones Municipales
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo URL ?>Sucursales/listar">
                                                Edificios Municipales
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#">
                                                Corporaciones
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="http://www.cormup.cl" rel="external">
                                                        Educación y Salud (CORMUP)
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://portal.deportespenalolen.cl/" rel="external">
                                                        Deportes (CORDEP)
                                                    </a>
                                                </li> 
                                                <li>
                                                    <a href="http://www.chimkowe.cl/" rel="external">
                                                        Cultura 
                                                    </a>
                                                </li> 
                                            </ul>
                                        </li>
										
                                        <li>
                                            <a href="http://oirsdigital.penalolen.cl/" rel="external">
                                                OIRS
                                            </a>
                                        </li>
										
                                        <?php
                                        if (isset($_SESSION['U_NOMBRES'])) {
                                            ?>
                                            <li class="dropdown">
                                                <a href="#" >
                                                    <i class="fa fa-user"></i> <?php echo Session::getValue('U_NOMBRES') . " " . Session::getValue('U_APELLIDOS'); ?>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo URL ?>Usuarios/perfil">Mi Perfil</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo URL ?>Usuarios/logout" >Salir</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#login2">
                                                    <i class="fa fa-user"></i> Vecino Registrado
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


 
			<!-- READSPEARKER -->
			
	<div class="row">
		<div class="col-md-12">
			<div class="container mb20">
				<div class="col-md-12">
					<div class="pull-right"> <!-- style="width:500px;"-->
						
						 
						
						<div class="col-md-12">
							<!--div class="acces1 pull-right"-->
							
							<div class="acces1">
								<a href="javascript:window.print()" style="float:left; margin-right:10px;" class="pull-right">		
									<img src="<?php echo URL ?>social/print.png" alt="Imprimir Página" Title="Imprimir Página" style="height:30px;" >						
								</a>
								</div><!-- col-md-6-->
							<div class="acces1">
								<div id="readspeaker_button1" class="rs_skip rsbtn rs_preserve pull-right">
									<a rel="nofollow" class="rsbtn_play" accesskey="L" title="Escucha esta p&aacute;gina utilizando ReadSpeaker"   href="//app-na.readspeaker.com/cgi-bin/rsent?customerid=8023&lang=es_us&readid=leer&url=">
										<span class="rsbtn_left rsimg rspart"><span class="rsbtn_text"><span>Escuchar</span></span></span>
										<span class="rsbtn_right rsimg rsplay rspart"></span>
									</a>
								</div>

							</div><!-- acces1-->
						</div><!-- col-md-6-->
						

				 
					</div> <!-- / col-md-12 -->
				</div> <!-- / col-md-12 -->
			</div> <!-- / container -->
		</div> <!-- / container -->
	</div> <!-- / container -->
			<!-- /READSPEARKER --> 
