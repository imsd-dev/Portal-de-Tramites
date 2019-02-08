<!--  MODAL LOGIN  -->
<div class="modal fade" id="login2" tabindex="-1" role="dialog" aria-labelledby="login2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content align-left ">
            <div class="modal-header  panel-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="login2">Ingreso de Usuarios</h4>
            </div>
            <div class="modal-body">
                <!-- login-->
                <div class="col-md-12">
                    <div class="signin-form">
                        <form action="<?php echo URL ?>Usuarios/login" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 p-none">
                                        <label>Run</label>
                                        <input type="text" name="username" value="" class="form-control input-lg" tabindex="1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 p-none">
                                        <a class="pull-right mt-none p-none"  href="page-recovery.html">(¿olvidó su contraseña?)</a>
                                        <label>Contraseña</label>
                                        <input type="password" name="passwd" value="" class="form-control input-lg" tabindex="2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pl-none">
                                    <span class="remember-box checkbox">
                                        <label for="rememberme">
                                            <input type="checkbox" id="rememberme" name="rememberme">Recordar
                                        </label>
                                    </span>
                                </div>
                                <div class="col-md-6 pr-none">
                                    <?php if (isset($this->tramite->tituloUrlTramite)) { ?>
                                        <input type="hidden" value="<?php echo $this->tramite->tituloUrlTramite ?>" name="titulo_tramites">
                                        <?php
                                    }
                                    ?>
                                    <input type="submit" value="INGRESAR" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> </div>
        </div>
    </div>
</div>
<!--  /MODAL LOGIN -->