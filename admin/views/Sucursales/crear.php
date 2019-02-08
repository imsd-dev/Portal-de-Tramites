<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Crear Nueva Sucursal</h2>

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
                <form id="form" action="<?php echo URL ?>Sucursales/crear" method="post" class="form-horizontal">
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
                                        <input type="text" name="nombre" class="form-control" title="Debe ingresar un Nombre"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirección Sucursal<span class="required" aria-required="true">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="direccion" class="form-control" title="Ingresar dirección"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textareaDefault">URL google maps</label>
                                    <div class="col-md-9">
                                        <input type="text" name="url" class="form-control" title="Debe ingresar una url" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teléfonos de contacto <span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input required="" title="Debe ingresar un télefono" name="phone1" class="form-control" placeholder="(+56352) 2 123-1234" data-input-mask="+56352 9999999" data-plugin-masked-input="" id="phone" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input class="form-control" placeholder="(+56352) 2 123-1234" data-input-mask="+56352 9999999" data-plugin-masked-input="" name="phone2" id="phone2">
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
                                            <input type="text" name="horaini" value="8:30" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="horafin" value="14:00" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">¿Posee Wifi? </label>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default mt-xs">
                                            <input type="checkbox" id="wifi" name="wifi">
                                            <label for="wifi">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Días de atención </h5>
                                <hr class="mt-md">

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" checked="" id="lunes" name="dias[]" value="Lunes">
                                            <label for="lunes">Lunes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" checked="" id="martes" name="dias[]" value="Martes">
                                            <label for="martes">Martes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" checked="" id="miercoles" name="dias[]" value="Miércoles">
                                            <label for="miercoles">Miércoles</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" checked="" id="jueves" name="dias[]" value="Jueves">
                                            <label for="jueves">Jueves</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" checked="" id="viernes" name="dias[]" value="Viernes">
                                            <label for="viernes">Viernes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-warning">
                                            <input type="checkbox" id="sabado" name="dias[]" value="Sábado">
                                            <label for="sabado">Sábado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-danger">
                                            <input type="checkbox" id="domingo" name="dias[]" value="Domingo">
                                            <label for="domingo">Domingo</label>
                                        </div>
                                    </div>
                                </div>

                            </div> 
                            <footer class="panel-footer bg-white ">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-lg pull-right">Agregar sucursal </button>
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