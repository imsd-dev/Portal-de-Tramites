<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Ver direcciones</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>sub pagina</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>

    </header>
    <div class="row">
        <div class="col-md-12">					 		
            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">
                        <a href="<?php echo URL ?>Direcciones/crear" class="btn btn-primary mr-lg mb-lg pull-right">Crear nueva dirección</a>
                    </div>

                    <?php
                    $str_string = null;
                    
                    if (empty($this->direcciones)) {
                        $str_string .= '<tr><td>No existen direcciones.</td><td></td><td></td><td></td></tr>';
                    } else {

                        $count = count($this->direcciones);

                        for ($i = 0; $i < $count; $i++) {

                            $direccion = (object) $this->direcciones[$i];
                            $estado = 'Activo';
                            if($direccion->estadoDireccion == 0){
                                $estado = "Inactivo";
                            }
                            
                            $str_string .= '<tr>
                                                <td>' . $direccion->nombreDireccion . '</td>
                                                <td>' . $direccion->encargadoDireccion . '</td>
                                                <td>' . $direccion->telefonoContactoDireccion . '</td>
                                                <td>' . $estado . '</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn-sm   btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog"></i> Acciones <span class="caret"></span></button>
                                                        <ul role="menu" class="dropdown-menu">
                                                            <li><a href="' . URL . 'Direcciones/editar/' . $direccion->direccionID . '" ><i class="fa fa-external-link-square "></i> Editar/Eliminar</a></li>
                                                        </ul>
                                                    </div>				
                                                </td>
                                            </tr>';
                        }
                    }
                    ?>
                    <section class="panel">
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-striped mb-none">
                                    <thead>
                                        <tr>
                                            <th>Dirección</th>
                                            <th>Encargado</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
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
