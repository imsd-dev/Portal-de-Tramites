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
                <form id="form" action="<?php echo URL ?>Direcciones/crear" method="post" class="form-horizontal">
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
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Crear nueva dirección</h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nombre" class="form-control" title="Debe ingresar un Nombre"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Encargado dirección <span class="required">*</span></label>
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
                                            <input type="email" name="email" class="form-control" placeholder="ej.: email@santodomingo.cl" title="Debe ingresar un email válido" required/>
                                        </div>
                                    </div> 
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teléfono de Contacto </label>
                                    <div class="col-md-9 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input id="phone3" name="telefono" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="+56352 1231234" class="form-control">
                                        </div>
                                    </div> 

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ruta de la Imagen </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="imagen" class="form-control" placeholder="ej.: img/direcciones/icono.png"/>
                                    </div>
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
                                    <button type="submit" class="btn btn-primary mr-lg pull-right">Agregar dirección </button>
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


