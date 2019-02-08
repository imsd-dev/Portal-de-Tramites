<?php
if (isset($_SESSION['U_NOMBRES'])) {
    header('location: ' . URL . 'Escritorio');
}
?>
<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<!doctype html>
<html class="fixed">
    <head>
        <?php require './public/templates/head.php'; ?>
    </head>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                
                <?php require './public/templates/mensajes.php'; ?>
                
                <a href="/" class="logo pull-left">
                    <img src="<?php echo URL ?>public/assets/images/logo.png" height="80" alt="Administrador portal de trámites Santo Domingo" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Ingreso al sistema</h2>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo URL ?>Usuarios/login" method="post">
                            <div class="form-group mb-lg">
                                <label>Usuario</label>
                                <div class="input-group input-group-icon">
                                    <input name="username" type="text" class="form-control input-lg" onblur="checkRutPersona(this);" required=""/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Contraseña</label>
                                    <a href="https://tramites.santodomingo.cl/Usuarios/recuperar" class="pull-right">Recuperar contraseña</a>
                                </div>
                                <div class="input-group input-group-icon">
                                    <input name="passwd" type="password" class="form-control input-lg" required=""/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="rememberme" type="checkbox" checked=""/>
                                        <label for="RememberMe">Recordarme</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary ">Entrar</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2019- Municipalidad de Santo Domingo.</p>
            </div>
        </section>
        <!-- end: page -->

        <?php require './public/templates/js.php'; ?>

    </body>
</html>