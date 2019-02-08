<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Crear Nuevo Teléfono</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Telefonos</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12 col-xl-6">

                    <?php include TEMPLATE . 'mensajes.php'; ?>

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Crear nuevo teléfono</h5>
                            <hr class="mt-md">
                        </header>
                        <div class="panel-body">
                            <form id="form" action="<?php echo URL ?>Telefonos/crear" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nombre <span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-4 control-label">
                                        <input required="" title="Debe ingresar un nombre" name="nombre" class="form-control" aria-required="true">
                                    </div>

                                    <label class="col-md-2 control-label">Número <span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-4 control-label">

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input class="form-control" placeholder="+5622 1231234" data-input-mask="+5622 9999999" data-plugin-masked-input="" name="phone1">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Categoría <span class="required" aria-required="true">*</span></label>
                                    <div class="col-sm-4">
                                        <select aria-required="true" name="categoria" id="direccion" class="form-control" title="Debe seleccionar una categoría" required="">
                                            <option value="">Seleccionar </option>
                                            <option value="Municipal">Municipal </option>
                                            <option value="Emergencia">Emergencia </option>
                                            <option value="Otros">Otros </option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success mr-lg pull-right">Agregar Teléfono </button>
                                    </div>
                                </div>
                            </form>
                        </div> 

                    </section>
                </div><!-- end: col-md-12 col-xl-6 -->


                <div class="col-md-12 col-xl-6">

                    <section class="panel">
                        <div class="panel-body">
                            <?php
                            if (empty($this->telefonos)) {
                                echo "<p>No existen teléfonos creados</p>";
                            } else {

                                $str_string = null;
                                $count = count($this->telefonos);
                                for ($i = 0; $i < $count; $i++) {

                                    $telefono = (object) $this->telefonos[$i];
                                    $str_string .= '<tr>
                                                        <td>' . $telefono->nombreTelefono . '</td>
                                                        <td>' . $telefono->numeroTelefono . '</td>
                                                        <td>' . $telefono->categoriaTelefono . '</td>
                                                        <td>
                                                            <form action="'.URL.'Telefonos/eliminar" method="post">
                                                                <input type="hidden" name="id_telefono" value="'.$telefono->telefonoID.'">
                                                                <input type="submit" value="Eliminar" class="btn btn-danger btn-xs">
                                                            </form>
                                                        </td>
                                                    </tr>';
                                }
                                ?>

                                <table class="table table-striped mb-none">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Numero</th>
                                            <th>Categoría</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $str_string; ?>
                                    </tbody>
                                </table>

                                <?php
                            }
                            ?>
                        </div> 
                    </section>
                </div>
            </div>
        </div><!--  end: col-md-12-->
    </div><!-- end: row -->

    <!-- end: page -->
</section>