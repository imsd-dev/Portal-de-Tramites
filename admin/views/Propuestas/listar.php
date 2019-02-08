<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Ver Propuestas</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Propuestas</span></li>
            </ol>
            <div style="margin-right:220px"></div> 
        </div>

    </header>
    <div class="row">
        <div class="col-md-12">
            <div class="row">	
                <div class="col-md-12">
                    
                    <?php include TEMPLATE . 'mensajes.php'; ?>
                    
                    <section class="panel">
                        <div class="panel-body">
                            <div class="table">
                                <?php
                                $str_string = null;

                                if (!empty($this->propuestas)) {
                                    $count = count($this->propuestas);
                                    for ($i = 0; $i < $count; $i++) {

                                        $propuesta = (object) $this->propuestas[$i];
                                        
                                        $str_string .= '<tr>
                                                            <td>' . $propuesta->rutUsuario . '</td>
                                                            <td>' . $this->dateFormat_view($propuesta->fechaComentarioPropuesta) . '</td>
                                                            <td>' . $propuesta->nombresUsuario . '</td>
                                                            <td>' . $propuesta->apellidosUsuario . '</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button data-toggle="dropdown" class="btn-sm   btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog "></i>  Acciones <span class="caret"></span></button>
                                                                    <ul role="menu" class="dropdown-menu">
                                                                        <li><a href="' . URL . 'Propuestas/ver/' . $propuesta->propuestaID . '" ><i class="fa fa-edit"></i> Ver/Gestionar</a></li>
                                                                    </ul>
                                                                </div>				
                                                            </td>
                                                        </tr>';
                                    }
                                } else {
                                    $str_string = '<tr><td>No existen comentarios pendientes.</td><td></td><td></td><td></td><td></td></tr>';
                                }
                                ?>
                                <table class="table table-striped mb-none">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Fecha</th>
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