<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Ver Glosarios creados</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Glosario</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>

    </header>
    <div class="row">
        <div class="col-md-12">					 		
            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">
                        <a href="<?php echo URL ?>Glosario/crear" class="btn btn-primary mr-lg mb-lg pull-right">Crear Nuevo Glosario</a>
                    </div>

                    <?php
                    $str_string = null;
                    
                    if (empty($this->glosarios)) {
                        $str_string .= '<tr><td>No existen glosarios a mostrar.</td><td></td></tr>';
                    } else {

                        $count = count($this->glosarios);

                        for ($i = 0; $i < $count; $i++) {

                            $glosario = (object) $this->glosarios[$i];
                                                        
                            $str_string .= '<tr>
                                                <td>' . $glosario->nombreGlosario . '</td>
                                                <td>' . $glosario->descripcionGlosario . '</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn-sm   btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog"></i> Acciones <span class="caret"></span></button>
                                                        <ul role="menu" class="dropdown-menu">
                                                            <li><a href="' . URL . 'Glosario/editar/' . $glosario->glosarioID . '" ><i class="fa fa-external-link-square "></i> Editar/Eliminar</a></li>
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
                                            <th>Nombre Glosario</th>
                                            <th>Descripción</th>
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
