<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Ver unidades</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Unidades</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>

    </header>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success btn-sm pull-right mb-md ">Crear nueva unidad</button>	 		
            <div class="row">
                <div class="col-md-12">

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Seleccionar direción</h5>

                            <hr class="mt-md">
                        </header>
                        <form action="<?php echo URL ?>Unidades/buscar" method="post">
                            <div class="panel-body p-md">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <select name="id_direccion" required="" title="Debe seleccionar el perfil del usuario" class="form-control" id="perfil" aria-required="true">
                                                <option value="">Seleccionar trámite</option>
                                                <?php
                                                for ($i = 0; $i < count($this->direcciones); $i++) {
                                                    $direccion = (object) $this->direcciones[$i];
                                                    echo '<option value="' . $direccion->direccionID . '">' . $direccion->nombreDireccion . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-4 col-xs-12 mt-xs">
                                    <div class="form-group">
                                        <button type="submit" class="mr-xs btn btn-info"> Buscar</button>	
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </section>

                </div>

                <?php
                $str_string = null;
                if (empty($this->unidades)) {
                    $str_string .= '<tr><td>No existen Unidades para mostrar.</td><td></td><td></td><td></td><td></td></tr>';
                } else {
                    $count = count($this->unidades);
                    for ($i = 0; $i < $count; $i++) {
                        $unidad = (object) $this->unidades[$i];
                        $str_string .= '<tr>
                                            <td>' . $unidad->nombreUnidad . '</td>
                                            <td>' . $unidad->nombreDireccion . '</td>
                                            <td>' . $unidad->encargadoUnidad . '</td>
                                            <td>' . $unidad->telefonoContactoUnidad . '</td> 
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn-sm btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog "></i>  Acciones <span class="caret"></span></button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        <li><a href="' . URL . 'Unidades/editar/' . $unidad->unidadID . '" ><i class="fa fa-edit"></i> Editar/Eliminar</a></li>
                                                    </ul>
                                                </div>				
                                            </td>
                                        </tr>';
                    }
                }
                ?>
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped mb-none">
                                    <thead>
                                        <tr>
                                            <th>Nombre unidad</th>
                                            <th>Nombre dirección</th>
                                            <th>Encargado</th>
                                            <th>Teléfono</th>
                                            <th style="min-width: 120px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $str_string ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>						

</section>