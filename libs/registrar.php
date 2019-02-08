<?php
/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */
?>

<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">

            <!-- nuevos -->
            <div class="row">

                <?php require TEMPLATE . 'web/mensajes.php'; ?>

                <form action="<?php echo URL ?>Usuarios/registrar" method="post">

                    <div class="col-xs-12 col-sm-2 col-md-7 results-container">

                        <h2><?php echo $this->pagina->tituloPagina ?></h2>

                        <div class="row">

                            <div class="col-md-4">
                                <label>Tipo de usuario *</label>
                                <select name="tipoUsuario" class="form-control selectpicker" data-validate="required" data-message-required="Obligatorio." required>
                                    <option value="">Seleccionar</option> 
                                    <option value="Particular">Particular</option> 
                                    <option value="Empresa">Empresa</option>
                                </select> 
                            </div>

                            <div  class="clearfix"> </div>

                            <div class="lighter"><p>Datos personales</p></div>

                            <div class="col-md-4">
                                <label>Nombre *</label>
                                <input type="text" name="nombreUsuario" class="form-control" placeholder="Nombres y Apellidos" required>
                            </div>

                            <div class="col-md-4">
                                <label>Razón Social</label><span>(Opcional)</span>
                                <input type="text" name="razonSocialUsuario" class="form-control" placeholder="Razón Social">
                            </div>

                            <div class="col-md-4">
                                <label>Idioma *</label>
                                <select name="idiomaUsuario" class="form-control selectpicker" data-validate="required" data-message-required="Obligatorio." required>
                                    <option value="">Seleccione</option> 
                                    <option value="ESP">Español</option> 
                                    <option value="ENG">English</option> 

                                </select> 
                            </div>

                            <div class="clearfix"></div>

                            <h3>Datos de acceso</h3>

                            <div class="col-md-4">
                                <label>Nombre de Usuario*</label>
                                <input type="text" name="usuario" class="form-control" placeholder="seleccione un nombre" required>
                            </div>

                            <div class="col-md-4">
                                <label>Email Usuario*</label>
                                <input type="text" name="emailUsuario" class="form-control" placeholder="mail@example.com" required>
                            </div>

                            <div class="col-md-4">
                                <label>Contraseña *</label>
                                <input type="password" name="contrasenaUsuario" class="form-control" placeholder="password" >
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <label>
                                    <input type="checkbox" name="terminos" required> 
                                    Declaro tener conocimientos y aceptar los <a href="#" target="_blank">terminos y condiciones del servicio</a>
                                </label>

                                <div class="clearfix"></div>
                                <div class="mb30"></div>

                                <button type="submit" class="btn btn-info pull-right">Crear Usuario</button>
                            </div>

                            <div class="col-md-6">

                            </div>

                            <div class="clearfix"></div>

                        </div><!-- row -->

                    </div><!-- /col-xs-12  col-sm-2 col-md-5 -->

                    <div class="col-xs-6 col-sm-4 col-md-4 pull-right">
                        <div class="spacer-20"></div>
                        
                        <?php echo $this->pagina->parrafo1 ?>
                    </div><!-- /col-sx-6 col-sm-2 col-md-2  -->
                </form>
            </div>
            <!-- /nuevos -->
        </div>
    </div>
</div>
<!-- End Body Content -->