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
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo URL ?>Votos/listar" method="post">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Filtrar por Fechas de votación</h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <div class="col-md-5"> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Inicio</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" name="fch_inicio" data-plugin-datepicker data-date-format="dd/mm/yyyy" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5"> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Término</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" name="fch_fin" data-plugin-datepicker data-date-format="dd/mm/yyyy" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2"> 
                                    <div class="form-group">
                                        <input type="submit" value="Filtrar Votos" class="btn btn-danger">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                            </div>
                        </section>
                    </form>
                </div>

                <?php
                $str_util_si = '<tr><td>No hay votos</td><td></td><td></td><td></td></tr>';
                $str_util_no = '<tr><td>No hay votos</td><td></td><td></td><td></td></tr>';
                $str_enlinea = '<tr><td>No hay votos</td><td></td><td></td><td></td></tr>';

                if (!empty($this->utilidadSi)) {

                    $str_util_si = null;

                    $count = count($this->utilidadSi);
                    for ($i = 0; $i < $count; $i++) {
                        $votos = (object) $this->utilidadSi[$i];
                        $str_util_si .= '<tr>
                                            <td>' . ($i + 1) . '</td>
                                            <td>' . $votos->tituloTramite . '</td>
                                            <td>' . $votos->contador . '</td> 
                                            <td>
                                                <div class="progress progress-lg progress-half-rounded m-none mt-xs light">
                                                    <div style="width: ' . $votos->porcentaje . '%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-success">
                                                        ' . $votos->porcentaje . '%
                                                    </div>
                                                </div>			
                                            </td>
                                        </tr>';
                    }
                }
                if (!empty($this->utilidadNo)) {

                    $str_util_no = null;

                    $count = count($this->utilidadNo);
                    for ($i = 0; $i < $count; $i++) {
                        $votos = (object) $this->utilidadNo[$i];
                        $str_util_no .= '<tr>
                                            <td>' . ($i + 1) . '</td>
                                            <td>' . $votos->tituloTramite . '</td>
                                            <td>' . $votos->contador . '</td> 
                                            <td>
                                                <div class="progress progress-lg progress-half-rounded m-none mt-xs light">
                                                    <div style="width: ' . $votos->porcentaje . '%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-success">
                                                        ' . $votos->porcentaje . '%
                                                    </div>
                                                </div>			
                                            </td>
                                        </tr>';
                    }
                }
                if (!empty($this->enLinea)) {

                    $str_enlinea = null;

                    $count = count($this->enLinea);
                    for ($i = 0; $i < $count; $i++) {
                        $votos = (object) $this->enLinea[$i];
                        $str_enlinea .= '<tr>
                                            <td>' . ($i + 1) . '</td>
                                            <td>' . $votos->tituloTramite . '</td>
                                            <td>' . $votos->contador . '</td> 
                                            <td>
                                                <div class="progress progress-lg progress-half-rounded m-none mt-xs light">
                                                    <div style="width: ' . $votos->porcentaje . '%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-success">
                                                        ' . $votos->porcentaje . '%
                                                    </div>
                                                </div>			
                                            </td>
                                        </tr>';
                    }
                }
                ?>
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">

                            <div class="col-md-12">
                                <div class="tabs tabs-danger">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#popular4">Utilidad: SI</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#recent4">Utilidad: NO</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#recent5">EN LINEA</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="popular4">
                                            <div class="table">
                                                <table class="table table-striped mb-none">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Trámite</th>
                                                            <th>Cant. Votos</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php echo $str_util_si ?> 
                                                    </tbody>
                                                </table>
                                            </div>                                        
                                        </div>
                                        <div class="tab-pane" id="recent4">
                                            <div class="table">
                                                <table class="table table-striped mb-none">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Trámite</th>
                                                            <th>Cant. Votos</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php echo $str_util_no ?> 
                                                    </tbody>
                                                </table>
                                            </div>                                        
                                        </div>
                                        <div class="tab-pane" id="recent5">
                                            <div class="table">
                                                <table class="table table-striped mb-none">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Trámite</th>
                                                            <th>Cant. Votos</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php echo $str_enlinea ?> 
                                                    </tbody>
                                                </table>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>						

</section>