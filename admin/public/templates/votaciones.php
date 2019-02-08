<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<!-- CONTADORES-->
<div class="container mt30 hidden-print">

    <div class="row">
        <div class="col-md-12 center">
            <h2 class="word-rotator-title mb-sm">Creamos un portal para ti <strong>más </strong><span class="word-rotate" data-plugin-options='{"delay": 2000, "animDelay": 300}'>
                        <strong class="inverted inverted-tertiary">

                            <span class="word-rotate-items">
                                <span>dinámico</span>
                                <span>amigable</span>
                                <span>completo</span>
                                <span>participativo</span>
                            </span>

                        </strong>

                    </span></h2>
            <p class="lead">Participa en las votaciones para Trámites en Línea. Visita los trámites y vota por tu favorito.</p>
        </div>
    </div>
    <?php
    if (!empty($this->votaciones)) {
        ?>
        <div class="row mt-xl">
            <div class="counters counters-text-dark">
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo URL . 'Tramites/ver/' . $this->votaciones[0]['tituloUrlTramite'] ?>">
                        <div class="counter appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                            <i class="fa fa-user"></i>
                            <strong data-to="<?php echo $this->votaciones[0]['porcentaje'] ?>" data-append="%">0</strong>
                            <label><?php echo $this->votaciones[0]['tituloTramite'] ?></label>
                            <p class="text-color-primary mb-xl">Sobre el total de votos</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo URL . 'Tramites/ver/' . $this->votaciones[1]['tituloUrlTramite'] ?>">
                        <div class="counter appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="600">
                            <i class="fa fa-desktop"></i>
                            <strong data-to="<?php echo $this->votaciones[1]['porcentaje'] ?>" data-append="%">0</strong>
                            <label><?php echo $this->votaciones[1]['tituloTramite'] ?></label>
                            <p class="text-color-primary mb-xl">Sobre el total de votos</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo URL . 'Tramites/ver/' . $this->votaciones[2]['tituloUrlTramite'] ?>">
                        <div class="counter appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="900">
                            <i class="fa fa-ticket"></i>
                            <strong data-to="<?php echo $this->votaciones[2]['porcentaje'] ?>" data-append="%">0</strong>
                            <label><?php echo $this->votaciones[2]['tituloTramite'] ?></label>
                            <p class="text-color-primary mb-xl">Sobre el total de votos</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo URL . 'Tramites/ver/' . $this->votaciones[3]['tituloUrlTramite'] ?>">
                        <div class="counter appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="1200">
                            <i class="fa fa-clock-o"></i>
                            <strong data-to="<?php echo $this->votaciones[3]['porcentaje'] ?>" data-append="%">0</strong>
                            <label><?php echo $this->acortar_texto($this->votaciones[3]['tituloTramite'], 60) ?></label>
                            <p class="text-color-primary mb-xl">Sobre el total de votos</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }

    if (!Session::exist()) {
        ?>
        <!-- PARTICIPA -->
        <div class="container hidden-print">
            <section class="call-to-action mb-xl">
                <div class="call-to-action-content">
                    <h3 class="text-red">¿Quieres <strong>proponer</strong> un trámite? </h3>
                    <p>Si necesitas que un tramite este disponible<strong>100% en línea</strong> Registrate y propon tu trámite </p>
                </div>
                <div class="call-to-action-btn">
                    <a class="btn btn-lg btn-red" target="_blank" href="<?php echo URL ?>Usuarios/registrar">Registrar</a>
                </div>
            </section>
        </div>
        <!-- /PARTICIPA -->		
        <?php
    }
    ?>
</div>
<!-- /CONTADORES-->


