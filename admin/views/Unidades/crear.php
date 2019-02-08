<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Crear nueva Unidad</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Unidades</span></li>
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
                        $str_sucursales .= " <div class='col-md-4'>
                                                            <div class='checkbox-custom checkbox-default'>
                                                                <input type='checkbox' value='$sucursal->sucursalID' id='$sucursal->nombreSucursal' name='sucursales[]' >
                                                                <label for='$sucursal->nombreSucursal'>$sucursal->nombreSucursal</label>
                                                            </div>
                                                        </div>";
                    }
                    ?>

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Crear Nueva Unidad</h5>
                            <hr class="mt-md">
                        </header>
                        <form id="form" action="<?php echo URL ?>Unidades/crear" class="form-horizontal" method="post">
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre Unidad <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nombre" class="form-control" title="Debe ingresar un Nombre"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirección <span class="required" aria-required="true">*</span></label>
                                    <div class="col-sm-9">
                                        <select aria-required="true" name="direccion" id="direccion" class="form-control" title="Debe seleccionar una dirección" required="">
                                            <option value="">Seleccionar </option>
                                            <?php
                                            for ($i = 0; $i < count($this->direcciones); $i++) {
                                                $direccion = (object) $this->direcciones[$i];
                                                echo '<option value="' . $direccion->direccionID . '">' . $direccion->nombreDireccion . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Encargado unidad <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="encargado" class="form-control" title="Ingresar encargado"  required/>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email contacto <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" name="email" class="form-control" placeholder="ej.: email@santodomingo.cl" title="Debe ingresar un email válido"required/>
                                        </div>
                                    </div> 
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teléfonos de contacto <span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input required="" name="telefono" title="Debe ingresar un télefono" class="form-control" placeholder="(+56352) 2 123-1234" data-input-mask="+56352 9999999" data-plugin-masked-input="" id="phone" aria-required="true">
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input class="form-control" name="fono2" placeholder="(+562) 2 123-1234" data-input-mask="+5622 9999999" data-plugin-masked-input="" id="phone2">
                                        </div>
                                    </div>
                                    -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textareaDefault">Descripción</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="descripcion" rows="3" id="textareaDefault"></textarea>
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
                                    <button type="submit" class="btn btn-primary mr-lg pull-right">Crear nueva unidad </button>
                                </div>
                            </footer>
                        </form>
                    </section>

                </div><!-- end: col-md-12 col-xl-6 -->

            </div>
        </div><!--  end: col-md-12-->
    </div><!-- end: row -->

    <!-- end: page -->

</section>
