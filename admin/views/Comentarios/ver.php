<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Crear Dirección</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Direcciones</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>

    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12 col-xl-6">

                    <?php
                    include TEMPLATE . 'mensajes.php';
                    ?>

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Información del Comentario</h5>
                            <hr class="mt-md">
                        </header>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Título del Trámite </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="<?php echo $this->comentario->tituloTramite ?>"/>
                                </div>
                                <div class="col-sm-2">
                                    <a href="<?php echo URL ?>Tramites/editar/<?php echo $this->comentario->tramiteID ?>" target="_blank" class="btn btn-info btn-sm">Ir al Trámite</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Usuario Creador</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="<?php echo $this->comentario->rutUsuario ?>"/>
                                </div>
                                <div class="col-sm-2">
                                    <a href="<?php echo URL ?>Usuarios/editar/<?php echo $this->comentario->usuarioID ?>" target="_blank" class="btn btn-info btn-sm">Ver Usuario</a>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombre de Usuario</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="<?php echo $this->comentario->nombresUsuario . " " . $this->comentario->apellidosUsuario; ?>"/>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email contacto <span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control" value="<?php echo $this->comentario->emailUsuario ?>"/>
                                    </div>
                                </div> 
                            </div> 

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="textareaDefault">Comentario Enviado</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="descripcion" rows="7" id="textareaDefault"><?php echo $this->comentario->comentarioAdicionalComentario ?></textarea>
                                </div>
                                <div class="col-sm-2">
                                    <form action="<?php echo URL ?>Comentarios/leer" method="post" class="bottom-aligned">
                                        <input type="hidden" value="<?php echo $this->comentario->comentarioID ?>" name="comentario_id" >
                                        <input type="submit" value="Leer Comentario" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>

                        </div> 
                    </section>
                </div><!-- end: col-md-12 col-xl-6 -->

                <div class="col-md-12 col-xl-6">

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Responder a Usuario</h5>
                            <hr class="mt-md">
                        </header>
                        <div class="panel-body">

                            <div class="col-md-6">
                                <form method="post" action="<?php echo URL ?>Comentarios/responder" >
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="textareaDefault">Email: <?php echo $this->comentario->emailUsuario ?></label>
                                        <div class="col-md-12">
                                            <!--textarea class="form-control" name="descripcion" rows="7" id="MsgPlantilla"></textarea-->
                                            <textarea class="summernote" name="mensaje" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-7">
                                            <input type="hidden" name="comentario_id" value="<?php echo $this->comentario->comentarioID ?>" >
                                            <input type="hidden" name="email" value="<?php echo $this->comentario->emailUsuario ?>" >
                                            <input type="submit" value="Enviar Mensaje" class="btn btn-info">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="col-md-12 control-label" for="textareaDefault">Plantillas Disponibles</label>
                                    <table class="table table-bordered table-striped" id="plantillas">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cuerpo</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Plantilla 1</td>
                                                <td><div id="txt-plan1">Plantilla 1 <br> Lorem ipsum bla bla bla</div></td>
                                                <td><input type="button" value="Usar" class="btn btn-success btn-xs" id="btn-plan1"></td>
                                            </tr>
                                            <tr>
                                                <td>Plantilla 2</td>
                                                <td><div id="txt-plan2"><strong>Plantilla 2</strong> <br> Lorem ipsum bla bla bla</div></td>
                                                <td><input type="button" value="Usar" class="btn btn-success btn-xs" id="btn-plan2"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Plantilla 3</td>
                                                <td><div id="txt-plan3">Plantilla 3 <br> Lorem ipsum bla bla bla</div></td>
                                                <td><input type="button" value="Usar" class="btn btn-success btn-xs" id="btn-plan3"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </section>
                </div><!-- end: col-md-12 col-xl-6 -->
            </div>
        </div><!--  end: col-md-12-->
    </div><!-- end: row -->

    <!-- end: page -->

</section>


