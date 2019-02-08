<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Buscar usuario</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Usuarios</span></li>
                <li><span>buscar</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>

    </header>
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-10">
                <?php include './public/templates/mensajes.php'; ?>
            </div>

            <div class="col-md-2">
                <a href="<?php echo URL ?>Usuarios/crear" class="btn btn-success btn-sm pull-right mb-md ">Crear usuario</a>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Buscar usuarios</h5>
                            <p>Ingresa los datos para realizar una busqueda</p>	
                            <hr class="mt-md">
                        </header>									
                        <div class="panel-body p-md">

                            <form action="<?php echo URL ?>Usuarios/buscar" method="post">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Run</label>
                                        <div class="col-sm-9">

                                            <input type="text" name="run" class="form-control" title="Debe ingresar un run válido"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="email" name="email" class="form-control" placeholder="ej.: email@santodomingo.cl" title="Debe ingresar un email válido" />
                                            </div>
                                        </div>
                                    </div>  
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Perfil  </label>
                                        <div class="col-sm-9">
                                            <select name="perfil" title="Debe seleccionar el perfil del usuario" class="form-control" id="perfil" aria-required="true">
                                                <option value="">Seleccionar perfil</option>
                                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                <option value="NORMAL">NORMAL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="mb-xs mt-xl mr-xs btn btn-info  pull-right"> Buscar usuario</button>	
                                </div> 

                            </form>
                        </div>
                    </section>

                </div>

                <?php
                $string_str = null;

                if (empty($this->usuarios)) {
                    $string_str = '<tr><td>No se encontraron resultados.</td><td></td><td></td><td></td><td></td><td></td></tr>';
                } else {

                    for ($i = 0; $i < count($this->usuarios); $i++) {

                        $usuario = (object) $this->usuarios[$i];

                        ($usuario->estadoUsuario == '1') ? $estado = 'Activo' : $estado = 'Inactivo';
                        $string_str .= '<tr>
                                            <td>' . $usuario->rutUsuario . '</td>
                                            <td>' . $usuario->nombresUsuario . '</td>
                                            <td>' . $usuario->apellidosUsuario . '</td>
                                            <td>' . $usuario->emailUsuario . '</td>
                                            <td>' . $estado . '</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn-sm   btn btn-default dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog "></i> Acciones <span class="caret"></span></button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        <li><a href="'.URL.'Usuarios/editar/' . $usuario->usuarioID . '"><i class="fa fa-edit"></i> Editar</a></li>
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
                                <table class="table table-hover mb-none">
                                    <thead>
                                        <tr>
                                            <th>Run</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $string_str ?>
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

