<div class="modal-body">
 
    <div class="col-md-12">
        <strong style="text-transform:uppercase;">  Debes estar registrado para poder participar</strong>
		
		 <div class="clearfix"> </div>
        <div class="col-md-12 mt20">
            <div class="signin-form">
                <form action="<?php echo URL ?>Usuarios/login" method="post">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 p-none">
                                <label for="rutusuario"> usuario</label>
                                <input type="text" name="username" placeholder="Ej: 123334445" value="" class="form-control input-lg" onblur="this.value = this.value.toUpperCase();esRutTEF(this, 'Rut de Vecino', true, false, true, '101');;validarRUT00(this, true);" tabindex="1"  id="rutusuario">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 p-none">
                                <a class="pull-right mt-none p-none"  href="<?php echo URL ?>Usuarios/recuperar">Recuperar contraseña</a>
                                <label for="clave">Contraseña</label>
                                <input type="password" name="passwd" value="" class="form-control input-lg" tabindex="2" id="clave">
                            </div>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-md-6 pl-none">
                          <a href="<?php echo URL ?>Usuarios/registrar" class="btn btn-info btn-block ">NUEVO USUARIO</a>   
                        </div>
                        <div class="col-md-6 pr-none">
                            <?php if (isset($this->tramite->tituloUrlTramite)) { ?>
                                <input type="hidden" value="<?php echo $this->tramite->tituloUrlTramite ?>" name="titulo_tramites" placeholder="123334445">
                                <?php
                            }
                            ?>
                            <input type="submit" value="INGRESAR" class="btn btn-success btn-block mb-xl" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
   
</div>