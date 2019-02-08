<div class="modal-body">

    <div class="col-md-1"> 
        <h2><i class="fa fa-frown-o"></i></h2>
    </div>

    <div class="col-md-10">

        Debes estar registrado para poder participar 

        <div class="col-md-12 mt20">
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
</div>

<div class="modal-footer">
    <a href="<?php echo URL ?>Usuarios/registrar" class="btn btn-success pull-left">Regístrate</a>
</div>