<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Actualizar Pregunta Frecuente</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Preguntas Frecuentes</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>

    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <form id="form" action="<?php echo URL ?>Preguntas/editar" method="post" class="form-horizontal">
                    <div class="col-md-12 col-xl-6">

                        <?php
                        include TEMPLATE . 'mensajes.php';
                        ?>

                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Actualizar Pregunta Frecuente</h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Título <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nombre" value="<?php echo $this->pregunta->nombrePreguntaFrecuente ?>" class="form-control" title="Debe ingresar un Nombre"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textareaDefault">Descripción</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="descripcion" rows="8" id="textareaDefault"><?php echo $this->pregunta->descripcionPreguntaFrecuente ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-lg"></div>
                            </div> 

                            <footer class="panel-footer bg-white ">
                                <div class="form-group">
                                    <input type="hidden" name="id_pregunta" value="<?php echo $this->pregunta->preguntaFrecuenteID ?>"/>
                                    <button type="submit" class="btn btn-primary mr-lg pull-right">Actualizar Pregunta Frecuente</button>
                                </div>
                            </footer>

                        </section>

                    </div><!-- end: col-md-12 col-xl-6 -->

                </form>
            </div>
        </div><!--  end: col-md-12-->
    </div><!-- end: row -->

    <!-- end: page -->

</section>


