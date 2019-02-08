<div class="modal fade" id="votarxtramite" tabindex="-1" role="dialog" aria-labelledby="votarxtramite" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="heading-success text-uppercase mb-md"><i class="fa fa-leaf" ></i> &nbsp; Quiero este Trámite 100% en líneaa</h4>
            </div>
            <form action="<?php echo URL ?>Tramites/votar" method="post">
                <div class="modal-body">
                    <?php
                    if (Session::exist()) {
                        ?>
                        <center>
                            <h5>Trámite: <?php echo $this->tramite->tituloTramite ?></h5>

                            <div class="col-sm-12 mb30">
                                <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox" checked disabled>
                                    <label for="votasi">Quiero este Trámite en Línea</label>
                                </div>
                            </div>

                        </center>
                        <?php
                    } else {
                        include TEMPLATE . 'modal-no-registrado.php';
                    }
                    ?>
                </div>

                <?php
                if (Session::exist()) {
                    ?>
                    <div class="modal-footer">
                        <input type="hidden" value="LINEA" name="tipo">
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