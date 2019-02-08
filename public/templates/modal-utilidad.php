<!--  MODAL ENVIAR ERROR -->
<div class="modal fade" id="util" tabindex="-1" role="dialog" aria-labelledby="util" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content featured-box featured-box-primary align-left ">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="heading-primary text-uppercase mb-md"><i class="fa fa-thumbs-o-up" ></i> |  <i class="fa fa-thumbs-o-down" ></i>  &nbsp; ¿Te fue útil esta información?</h4>
            </div>
            <form action="<?php echo URL ?>Tramites/votar" method="post">
                <div class="modal-body">
                    <?php
                    if (Session::exist()) {
                        ?>
                        <center><h5>Trámite: <?php echo $this->tramite->tituloTramite ?></h5></center>

                        <div class="col-md-3"></div>

                        <div class="col-sm-4">
                            <div class="radio">
                                <label><input type="radio" name="option" value="SI"><i class="fa fa-thumbs-o-up" ></i> SI</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="radio">
                                <label><input type="radio" name="option" value="NO"><i class="fa fa-thumbs-o-down" ></i> NO</label>
                            </div>
                        </div>
                        <?php
                    } else {
                        include TEMPLATE . 'modal-no-registrado.php';
                    }
                    ?>
                </div>
                <?php
                if (Session::exist()) {
                    ?>
                    <div class="modal-footer mt30">
                        <input type="hidden" value="UTILIDAD" name="tipo">
                        <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="id_tramite">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
</div>
<!--  /MODAL ENVIAR ERROR -->
