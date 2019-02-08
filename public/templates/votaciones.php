<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * UI/UX Alan Pereda N. 
 * © Copyright - Municipalidad de Peñalolén
 */
?>
<!-- CONTADORES-->
<div class="container mt30 hidden-print">

    <div class="row">
        <div class="col-md-12 center">
            <h2 class="word-rotator-title mb-sm">Creamos un portal para ti <strong>más </strong>
                <span class="word-rotate" data-plugin-options='{"delay": 2000, "animDelay": 300}'>
                    <strong class="inverted inverted-tertiary">
                        <span class="word-rotate-items">
                            <span>dinámico</span>
                            <span>amigable</span>
                            <span>completo</span>
                            <span>participativo</span>
                        </span>
                    </strong>
                </span>
            </h2>
            <p class="lead">Participa en las votaciones para Trámites en Línea. Visita los trámites y vota por tu favorito.</p>

            <a class="btn btn-success btn-lg btn-icon" href="#" role="button" data-toggle="modal" data-target="#proponer"> <span class="fa fa-check-circle" ></span> Proponer un Trámite</a>
        </div>
    </div>
    <?php
    if (!empty($this->votaciones)) {
        $str_votaciones = null;

        for ($i = 0; $i < count($this->votaciones); $i++) {

            $votaciones = (object) $this->votaciones[$i];
            $str_votaciones .= '<div class="col-md-3 col-sm-6">
									<a href="' . URL . 'Tramites/ver/' . $votaciones->tituloUrlTramite . '">
										<div class="counter appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
											<span class="fa fa-user"></span>
											<strong data-to="' . $votaciones->porcentaje . '" data-append="%">0</strong>
																			<p class="text-color-quaternary mb-xl">Sobre el total de votos</p>
											 ' . $votaciones->tituloTramite . ' 
										</div>
									</a>
								</div>';
        }
        ?>
        <hr>
        <div class="row mt-xl center">
            <h2 class="word-rotator-title mb-sm">Porque tu <strong>opinión</strong> nos importa. <strong>Trámites</strong> mas votados</h2> 
            <div class="counters counters-text-dark">
                <?php echo $str_votaciones ?>
            </div>
        </div>
        <?php
    }

    if (!Session::exist()) {
        ?>
        <!-- PARTICIPA -->
        <hr>

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


<div class="modal fade" id="proponer" tabindex="-1" role="dialog" aria-labelledby="proponer" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="heading-success text-uppercase mb-md"><span class="fa fa-check-circle"></span>&nbsp;  Proponer un Trámite</h4>
            </div>
            <?php
            if (isset($_SESSION['U_NOMBRES'])) {
                ?> 
                <form action="<?php echo URL ?>Propuestas/crear" method="post">
                    <div class="modal-body">
                        <div class="col-md-12"><h5>Si desea proponer un Trámite, por favor ingrese la información en el siguiente formulario.</h5></div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">(Maximo 300 caracteres)</label>
                                <textarea rows="5" name="comentario" class="form-control" placeholder="Ingresar su comentario" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" value="<?php
                        if (!empty($this->tramite->tituloUrlTramite)) {
                            echo $this->tramite->tituloUrlTramite;
                        }
                        ?>" name="titulo">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary mb-sm">Enviar</button>
                    </div>
                </form>

                <?php
            } else {
                include TEMPLATE . 'login-no-registrado.php';
            }
            ?>
        </div>
    </div>
</div>


