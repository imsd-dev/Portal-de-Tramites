<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Actualizar Nueva Sucursal</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Sucursales</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <form id="form" action="<?php echo URL ?>Sucursales/editar" method="post" class="form-horizontal">
                    <div class="col-md-12 col-xl-6">

                        <?php include TEMPLATE . 'mensajes.php'; ?>

                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Crear nueva sucursal</h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre Sucursal <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nombre" value="<?php echo $this->sucursal->nombreSucursal ?>" class="form-control" title="Debe ingresar un Nombre"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirección Sucursal<span class="required" aria-required="true">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="direccion" value="<?php echo $this->sucursal->direccionSucursal ?>" class="form-control" title="Ingresar dirección"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textareaDefault">URL google maps</label>
                                    <div class="col-md-9">
                                        <input type="text" name="url" value="<?php echo $this->sucursal->googleMapsSucursal ?>" class="form-control" title="Debe ingresar una url" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teléfonos de contacto <span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input required="" title="Debe ingresar un télefono" value="<?php echo $this->sucursal->fono1Sucursal ?>" name="phone1" class="form-control" placeholder="+56352 1231234" data-input-mask="+56352 9999999" data-plugin-masked-input="" id="phone" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input class="form-control" value="<?php echo $this->sucursal->fono2Sucursal ?>" placeholder="+56352 1231234" data-input-mask="+56352 9999999" data-plugin-masked-input="" name="phone2" id="phone2">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Horario de atención</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="horaini" value="<?php echo $this->sucursal->horarioInicioSucursal ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="horafin" value="<?php echo $this->sucursal->horarioFinSucursal ?>"  data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textareaDefault">Activo / Inactivo </label>
                                    <div class="col-md-9">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="estado" id="activo" <?php if ($this->sucursal->estadoSucursal == 1) echo "checked"; ?> >
                                            <label for="activo">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">¿Posee Wifi? </label>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default mt-xs">
                                            <input type="checkbox" id="wifi" name="wifi" <?php if ($this->sucursal->wifiSucursal == 1) echo "checked"; ?> >
                                            <label for="wifi">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Días de atención </h5>
                                <hr class="mt-md">

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Lunes" name="dias[]" id="lunes"  <?php
                                            if (in_array("Lunes", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="lunes">Lunes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Martes" name="dias[]" id="martes"  <?php
                                            if (in_array("Martes", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="martes">Martes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Miércoles" name="dias[]" id="miercoles"  <?php
                                            if (in_array("Miércoles", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="miercoles">Miércoles</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Jueves" name="dias[]" id="jueves"  <?php
                                            if (in_array("Jueves", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="jueves">Jueves</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Viernes" name="dias[]" id="viernes"  <?php
                                            if (in_array("Viernes", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="viernes">Viernes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-warning">
                                            <input type="checkbox" value="Sábado" name="dias[]" id="sabado"  <?php
                                            if (in_array("Sábado", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="sabado">Sábado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-danger">
                                            <input type="checkbox" value="Domingo" name="dias[]" id="domingo" <?php
                                            if (in_array("Domingo", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="domingo">Domingo</label>
                                        </div>
                                    </div>
                                </div>



                            </div> 
                            <footer class="panel-footer bg-white ">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $this->sucursal->sucursalID ?>" name="id_sucursal">
                                    <button type="submit" class="btn btn-primary mr-lg pull-right">Actualizar sucursal </button>
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