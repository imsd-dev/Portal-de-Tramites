<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Ver Comentarios</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Escritorio</span></li>
                <li><span>Comentarios</span></li>
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

                                if (!empty($this->comentarios)) {
                                    $count = count($this->comentarios);
                                    for ($i = 0; $i < $count; $i++) {

                                        $comentarios = (object) $this->comentarios[$i];

                                        $coment = unserialize($comentarios->itemsComentario);
                                        $str_coment = null;

                                        foreach ($coment['items'] as $value) {
                                            $str_coment .= '- ' . $value . '<br>';
                                        }
                                        
                                        $str_string .= '<tr>
                                                            <td>' . $comentarios->tituloTramite . '</td>
                                                            <td>' . $comentarios->rutUsuario . '</td>
                                                            <td>' . $str_coment . '</td>
                                                            <td>' . $this->dateFormat_view($comentarios->fechaCreacionComentario) . '</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button data-toggle="dropdown" class="btn-sm   btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog "></i>  Acciones <span class="caret"></span></button>
                                                                    <ul role="menu" class="dropdown-menu">
                                                                        <li><a href="' . URL . 'Comentarios/ver/' . $comentarios->comentarioID . '" ><i class="fa fa-edit"></i> Ver/Gestionar</a></li>
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
                                            <th>Título del Trámite</th>
                                            <th>Usuario</th>
                                            <th>Motivo</th>
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