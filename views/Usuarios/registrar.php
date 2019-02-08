<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

require LIBS . 'captcha/simple-php-captcha.php';
$_SESSION['captcha'] = simple_php_captcha();
?>

<div role="main" class="main">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Registro de Usuarios</h1>
                </div>

                <div class="col-md-6"> 
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Registrar</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>	

    <div class="container mt30">

        <div class="row">

            <div class="col-md-12 mb30">
                <div class="row">
					<div class="col-md-12">
						<span class="title mb-sm text-center">El registro de usuarios no está disponible todavía</span>
						<hr class="tall30 mb30">
                    </div> 
                </div>
            </div>
        </div><!-- /row -->
    </div><!-- container-->

    <div class="clearfix mt30"></div>

    <?php //include './public/templates/votaciones.php'; ?>
</div>
