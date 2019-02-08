<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */


$count = count($this->direcciones);
$str_direccion = null;
$str_tramites = null;

for ($i = 0; $i < $count; $i++) {
    $direccion = (object) $this->direcciones[$i];
    $str_direccion .= "<option value='$direccion->direccionID'>$direccion->nombreDireccion</option>";
}

if (empty($this->tramites)) {
    $str_tramites = '<tr>
                        <td>Favor ingresar criterios de búsqueda.</td>
                        <td></td><td></td><td></td><td></td>
                    </tr>';
} else {

    for ($i = 0; $i < count($this->tramites); $i++) {

        $tramite = (object) $this->tramites[$i];
        switch ($tramite->estadoTramite) {
            case 1:
                $label = 'success';
                $estado = 'Activo';
                break;
            case 0:
                $label = 'danger';
                $estado = 'Inactivo';
                break;
        }

        $str_tramites .= '<tr>
                        <td>' . $tramite->tituloTramite . '</td>
                        <td>' . $tramite->departamento . '</td>
                        <td>' . $this->dateFormat_view($tramite->fechaCreacionTramite) . '</td>
                        <td><span class="label label-' . $label . '">' . $estado . '</span></td>
                        <td>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn-sm btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog "></i>  Acciones <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="' . URL . 'Tramites/editar/' . $tramite->tramiteID . '"><i class="fa fa-external-link-square "></i> Leer / Modificar</a></li>
                                </ul>
                            </div>				
                        </td>
                    </tr>';
    }
}
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Buscar Trámites</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tramites</span></li>
                <li><span>Buscar</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>
    </header>
    <div class="row">
        <div class="col-md-12">	

            <?php include TEMPLATE . 'mensajes.php'; ?>

            <div class="row">
                <div class="col-md-12">

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Buscar</h5>
                            <p>Ingresa los datos para realizar una búsqueda</p>	
                            <hr class="mt-md">
                        </header>									
                        <div class="panel-body p-md">

                            <form action="<?php echo URL ?>Tramites/buscar" method="post" class="form-horizontal" id="form">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Buscar</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="titulo" class="form-control" title="Buscador"/>
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Dirección</label>
                                        <div class="col-sm-9">

                                            <select class="form-control" id="direccion" name="direccion" aria-required="true">
                                                <option value="">Seleccionar </option>
                                                <?php echo $str_direccion ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="mr-xs btn btn-info  pull-left"> Buscar usuario</button>	
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
                                <table class="table table-hover mb-none">
                                    <thead>
                                        <tr>
                                            <th>Trámite</th>
                                            <th>Dirección</th>
                                            <th>Fecha creación</th>
                                            <th>Estado</th>
                                            <th style="min-width: 115px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $str_tramites ?>
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
