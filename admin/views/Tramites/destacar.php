<?php
/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Buscar Trámites a destacar</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tramites</span></li>
                <li><span>Destacar</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>
    </header>

    <div class="row">
        <div class="col-md-12">					 		
            <div class="row">
                <div class="col-md-12">

                    <?php
                    include TEMPLATE . 'mensajes.php';

                    $str_tramites = null;

                    if (!empty($this->tramites)) {

                        $count = count($this->tramites);
                        for ($i = 0; $i < $count; $i++) {

                            $tramite = (object) $this->tramites[$i];
                            $str_tramites .= '<option value="' . $tramite->tramiteID . '">' . $tramite->tituloTramite . '</option>';
                        }
                    }

                    $str_tramites_frec = null;
                    if (!empty($this->tramites_frec)) {

                        $count = count($this->tramites_frec);
                        for ($i = 0; $i < $count; $i++) {

                            $tramite = (object) $this->tramites_frec[$i];
                            $str_tramites_frec .= '<tr>'
                                    . '<td>' . $tramite->tituloTramite . '</td>'
                                    . '<td> 
                                            <form action="' . URL . 'Tramites/ordenar" class="form-inline" role="form" method="post">
                                                <div class="form-group">
                                                  <input name="orden" type="text" class="form-control" value="' . $tramite->ordenTramite . '">
                                                  <input name="id_tramite" type="hidden" class="form-control" value="' . $tramite->tramiteID . '">
                                                </div>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </form>
                                       </td>'
                                    . '<td> 
                                            <form action="' . URL . 'Tramites/no_destacar" class="form-inline" role="form" method="post">
                                                <div class="form-group">
                                                  <input name="id_tramite" type="hidden" class="form-control" value="' . $tramite->tramiteID . '">
                                                </div>
                                                <button type="submit" class="btn btn-danger">Quitar</button>
                                            </form>
                                       </td>'
                                    . '</tr>';
                        }
                    } else {
                        $str_tramites_frec = '<tr><td>No existen Trámites destacados.</td><td></td><td></td></tr>';
                    }
                    ?>

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Buscar trámites a destacar</h5>
                            <p>Selecciona un trámite de la lista para que se convierta en destacado.</p>	
                            <hr class="mt-md">
                        </header>									
                        <div class="panel-body p-md">
                            <form action="<?php echo URL ?>Tramites/destacar" method="post"> 
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <select name="id_tramite" required="" title="Debe seleccionar el perfil del usuario" class="form-control" id="perfil" aria-required="true">
                                                <option value="">Seleccionar trámite</option>
                                                <?php echo $str_tramites ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="mr-xs btn btn-info"> Destacar</button>	
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </section>

                </div>

                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="table">
                                <table class="table table-strape mb-none">
                                    <thead>
                                        <tr>
                                            <th>Trámite</th>
                                            <th>Orden</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $str_tramites_frec ?>
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