<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Ver Categorías</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Categorías</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>

    </header>
    <div class="row">
        <div class="col-md-12">					 		
            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">
                        <a href="<?php echo URL ?>Categorias/crear" class="btn btn-primary mr-lg mb-lg pull-right">Crear Nueva Categoría</a>
                    </div>

                    <?php
                    $str_string = null;
                    
                    if (empty($this->categorias)) {
                        $str_string .= '<tr><td>No existen direcciones.</td><td></td><td></td><td></td></tr>';
                    } else {

                        $count = count($this->categorias);

                        for ($i = 0; $i < $count; $i++) {

                            $categoria = (object) $this->categorias[$i];
                            $estado = 'Activo';
                            if($categoria->estadoCategoria == 0){
                                $estado = "Inactivo";
                            }
                            
                            $str_string .= '<tr>
                                                <td>' . $categoria->nombreCategoria . '</td>
                                                <td>' . $categoria->iconoPortadaCategoria . '</td>
                                                <td>' . $categoria->ordenCategoria . '</td>
                                                <td>' . $estado . '</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn-sm   btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog"></i> Acciones <span class="caret"></span></button>
                                                        <ul role="menu" class="dropdown-menu">
                                                            <li><a href="' . URL . 'Categorias/editar/' . $categoria->categoriaID . '" ><i class="fa fa-external-link-square "></i> Editar/Eliminar</a></li>
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
                                            <th>Nombre Categoría</th>
                                            <th>Ruta Imagen Portada</th>
                                            <th>Orden</th>
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
