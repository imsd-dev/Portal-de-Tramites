<!--  MODAL LOGIN  -->
<div class="modal fade" id="login2" tabindex="-1" role="dialog" aria-labelledby="login2" aria-hidden="true">
    <div class="modal-dialog" style="width: 450px">
        <div class="modal-content align-left ">
            <div class="modal-header  panel-default">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ingreso de Usuarios</h4>
            </div>
            <div class="modal-body">
                <!-- login-->
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="signin-form">
                            <form action="<?php echo URL ?>Usuarios/login" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 p-none">
                                            <label for="rut-login">Rut usuario</label>
                                            <input type="text" name="username" placeholder="Ej. 123334445" class="form-control input-lg" tabindex="1" onblur="this.value = this.value.toUpperCase();esRutTEF(this, 'Rut de Vecino', true, false, true, '101');;validarRUT00(this, true);" required="" aria-labelledby="rut" id="rut-login">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 p-none">
                                            <a class="pull-right mt-none p-none" href="<?php echo URL ?>Usuarios/recuperar">(¿olvidó su contraseña?)</a>
                                            <label for="contraseña-login">Contraseña</label>
                                            <input type="password" name="passwd" class="form-control input-lg" tabindex="2" required="" id="contraseña-login">
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($this->tramite->tituloUrlTramite)) { ?>
                                    <input type="hidden" value="<?php echo $this->tramite->tituloUrlTramite ?>" name="titulo_tramites">
                                    <?php
                                }
                                ?>
                                <div class="row">
                                   
								   <div class="col-md-6 pl-none">
										<span class="remember-box checkbox">
											<label for="rememberme">
												<input type="checkbox" id="rememberme" name="rememberme">Recordar
											</label>
										</span>
									</div>
                                    <div class="col-md-3 pr-none">
                                        <a href="<?php echo URL ?>Usuarios/registrar" class="btn btn-danger pull-right">REGISTRAR</a>
                                    </div>
                                    <div class="col-md-3 pr-none">
                                        <input type="submit" value="ENTRAR" class="btn btn-primary pull-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> </div>
        </div>
    </div>
</div>
<!--  /MODAL LOGIN -->