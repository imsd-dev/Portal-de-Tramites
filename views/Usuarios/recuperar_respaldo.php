<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * UI/UX Alan Pereda N. 
 * Municipalidad de Peñalolén
 */
?>

<div role="main" class="main">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <h1>Recuperar Contraseña</h1>
                </div>
                <div class="col-md-6 col-xs-12"> 
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Recuperar </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>	

    <div class="container mt30">
        <div class="row hidden-md visible-xs">
            <div class="col-md-12 align-right hidden-print">
                <form action="<?php echo URL ?>Tramites/buscar" method="post">
                    <div class="input-group input-search">
                        <input type="text" placeholder="Buscar ejemplo: Permiso circulación" name="buscar" class="typeahead form-control input-lg mb-md tt-input">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-red mb-md btn-lg fix-btn-gruop"><i class="fa fa-search"></i> Buscar</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            <hr class="tall30">

        </div>


        <div class="row">

            <div class="col-md-12 mb30">

            

                <div class="row">
                    <div class="col-md-12">

						<h2 class="mb-sm  text-center">
						<strong>Recuperar </strong> Contraseña </h2>
						<hr class="tall30 mb30">

		
                        <?php include TEMPLATE . 'mensajes.php'; ?>

                        <div class="featured-boxes">
                            <div class="row">
							 <div class="col-sm-3"></div> 
                                <div class="col-sm-6">
                                    <div class="  align-left mt-xlg ximena">
                                        <div class="box-content">
                                            <h4 class="heading-primary text-uppercase mb-md">Recuperar contraseña</h4>
                                            <form action="<?php echo URL ?>Usuarios/recuperar" method="post">

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Ingrese su rut sin puntos ni guiones. Ej. <strong> 123334445 </strong> </label>
                                                        <input type="text" class="form-control input-lg mt20" placeholder="Ingresar Rut" name="rut" onblur="this.value = this.value.toUpperCase();esRutTEF(this, 'Rut de Vecino', true, false, true, '101');;validarRUT00(this, true);">
                                                    </div>

                                                </div> 

                                                    <div class="col-md-12 mb20">
                                                        <input type="submit" value="Recuperar contraseña" class="btn btn-success btn-lg btn-block" data-loading-text="Loading...">
                                                    </div>
                                                
												<div class="clearfix"></div> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
								
								<div class="col-sm-3"></div> 
								
                            </div>
                        </div>
                    </div>
                    
                   
                </div> 
            </div>
        </div><!-- /row -->
    </div><!-- container-->

    <div class="clearfix"></div>
</div>
<!-- /TRAMITES GENERALES-->
