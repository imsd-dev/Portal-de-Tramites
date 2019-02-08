<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Ver sucursales</h2>

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
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo URL ?>Sucursales/crear" class="btn btn-success btn-sm pull-right mb-md ">Crear Sucursal</a>	 		
            <div class="row">	
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="table">
                                <?php
                                $str_string = null;

                                if (!empty($this->sucursales)) {
                                    $count = count($this->sucursales);
                                    for ($i = 0; $i < $count; $i++) {

                                        $sucursal = (object) $this->sucursales[$i];
                                        $str_string .= '<tr>
                                                            <td>' . $sucursal->nombreSucursal . '</td>
                                                            <td>' . $sucursal->direccionSucursal . '</td>
                                                            <td>' . $sucursal->fono1Sucursal . '</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button data-toggle="dropdown" class="btn-sm   btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog "></i>  Acciones <span class="caret"></span></button>
                                                                    <ul role="menu" class="dropdown-menu">
                                                                        <li><a href="' . URL . 'Sucursales/editar/' . $sucursal->sucursalID . '" ><i class="fa fa-edit"></i> Editar</a></li>
                                                                    </ul>
                                                                </div>				
                                                            </td>
                                                        </tr>';
                                    }
                                } else {
                                    $str_string = '<tr><td></td><td></td><td></td><td></td></tr>';
                                }
                                ?>
                                <table class="table table-striped mb-none">
                                    <thead>
                                        <tr>
                                            <th>Sucursal</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
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