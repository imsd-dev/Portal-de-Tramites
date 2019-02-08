<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Editar Categoría</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Categorias</span></li>
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

                    if (!empty($this->categoria)) {
                        ?>
                        <form id="form" action="<?php echo URL ?>Categorias/editar" method="post" class="form-horizontal">
                            <section class="panel">
                                <header class="panel-heading bg-white ">
                                    <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Editar Categoría</h5>
                                    <hr class="mt-md">
                                </header>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nombre <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $this->categoria->nombreCategoria ?>" name="nombre" class="form-control" title="Debe ingresar un Nombre" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Icono en Portada <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $this->categoria->iconoPortadaCategoria ?>" name="icono_port" class="form-control" title="Ingresar icono de Portada"  required/>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Icono Interior <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $this->categoria->iconoInteriorCategoria ?>" name="icono_int" class="form-control" title="Ingresar icono de Portada"  required/>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Orden <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $this->categoria->ordenCategoria ?>" name="orden" class="form-control" title="Ingresar icono de Portada"  required/>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textareaDefault">Descripción</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="descripcion" rows="3" id="textareaDefault"><?php echo $this->categoria->descripcionCategoria ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textareaDefault"> </label>
                                        <div class="col-md-9">
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" name="estado" id="activo" <?php if ($this->categoria->estadoCategoria == 1) echo "checked"; ?> >
                                                <label for="activo">Activo / Inactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <footer class="panel-footer bg-white ">
                                    <div class="form-group">
                                        <input type="hidden" name="id_categoria" value="<?php echo $this->categoria->categoriaID ?>" />
                                        <button type="submit" class="btn btn-primary mr-lg pull-right">Editar categoría </button>
                                    </div>
                                </footer>

                            </section>
                        </form>
                        <?php
                    }
                    ?>
                </div><!-- end: col-md-12 col-xl-6 -->


            </div>
        </div><!--  end: col-md-12-->
    </div><!-- end: row -->

    <!-- end: page -->

</section>


