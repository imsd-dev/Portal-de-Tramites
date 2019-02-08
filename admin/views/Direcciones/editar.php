<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Editar Dirección</h2>

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
                    $str_sucursales = null;

                    $count_sucur = count($this->sucursales);
                    for ($i = 0; $i < $count_sucur; $i++) {
                        $sucursal = (object) $this->sucursales[$i];
                        $estado_chek = null;

                        for ($j = 0; $j < count($this->sucursalesDirecciones); $j++) {
                            if ($this->sucursalesDirecciones[$j]['sucursalID'] == $sucursal->sucursalID) {
                                $estado_chek = "checked";
                            }
                        }

                        $str_sucursales .= " <div class='col-md-4'>
                                                            <div class='checkbox-custom checkbox-default'>
                                                                <input type='checkbox' value='$sucursal->sucursalID' id='$sucursal->nombreSucursal' name='sucursales[]' $estado_chek >
                                                                <label for='$sucursal->nombreSucursal'>$sucursal->nombreSucursal</label>
                                                            </div>
                                                        </div>";
                    }

                    if (!empty($this->direccion)) {
                        ?>
                        <form id="form" action="<?php echo URL ?>Direcciones/editar" method="post" class="form-horizontal">
                            <section class="panel">
                                <header class="panel-heading bg-white ">
                                    <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Editar Dirección</h5>
                                    <hr class="mt-md">
                                </header>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nombre <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nombre" class="form-control" value="<?php echo $this->direccion->nombreDireccion ?>" title="Debe ingresar un Nombre"  required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Encargado dirección <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="encargado" value="<?php echo $this->direccion->encargadoDireccion ?>" class="form-control" title="Ingresar encargado"  required/>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email contacto <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="email" name="email" value="<?php echo $this->direccion->emailEncargadoDireccion ?>" class="form-control" placeholder="ej.: email@santodomingo.cl" title="Debe ingresar un email válido" required/>
                                            </div>
                                        </div> 
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Teléfono de Contacto <span class="required">*</span></label>
                                        <div class="col-md-9 control-label">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input id="phone3" name="telefono" value="<?php echo $this->direccion->telefonoContactoDireccion ?>" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="+56352 1231234" class="form-control" required>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ruta de la Imagen </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="imagen" value="<?php echo $this->direccion->imagenDireccion ?>" class="form-control" placeholder="ej.: img/direcciones/icono.png"/>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textareaDefault">Descripción</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="descripcion" rows="3" id="textareaDefault"><?php echo $this->direccion->descripcionDireccion ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textareaDefault"> </label>
                                        <div class="col-md-9">
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" name="estado" id="activo" <?php if ($this->direccion->estadoDireccion == 1) echo "checked"; ?> >
                                                <label for="activo">Activo / Inactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <section class="panel">
                                    <header class="panel-heading bg-white ">
                                        <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Sucursales donde se realiza el trámite</h5>
                                        <hr class="mt-md">
                                    </header>
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php echo $str_sucursales ?>
                                            </div>	  
                                        </div>	  
                                    </div>
                                </section>

                                <footer class="panel-footer bg-white ">
                                    <div class="form-group">
                                        <input type="hidden" name="direccion_id" value="<?php echo $this->direccion->direccionID ?>" />
                                        <button type="submit" class="btn btn-primary mr-lg pull-right">Editar dirección </button>
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


