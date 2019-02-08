<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Nuevo Trámite</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Trámites</span></li>
                <li><span>Crear</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>
    </header>

    <!-- start: content -->

    <div class="row">
        <div class="col-md-12">

            <?php include TEMPLATE . 'mensajes.php'; ?>

            <div class="row">
                <form action="<?php echo URL ?>Tramites/crear" method="post" class="form-horizontal" id="form">

                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Crear nuevo Trámite </h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">
                                <?php
                                $count = count($this->direcciones);
                                $str_direccion = null;
                                $str_categorias = null;
                                $str_sucursales = null;

                                for ($i = 0; $i < $count; $i++) {
                                    $direccion = (object) $this->direcciones[$i];
                                    $str_direccion .= "<option value='$direccion->direccionID'>$direccion->nombreDireccion</option>";
                                }

                                $count = count($this->categorias);
                                for ($i = 0; $i < $count; $i++) {
                                    $categoria = (object) $this->categorias[$i];
                                    $str_categorias .= " <div class='col-md-4'>
                                                            <div class='checkbox-custom checkbox-default'>
                                                                <input type='checkbox' value='$categoria->categoriaID' id='$categoria->nombreCategoria' name='categorias[]'>
                                                                <label for='$categoria->nombreCategoria'>$categoria->nombreCategoria</label>
                                                            </div>
                                                        </div>";
                                }

                                $count = count($this->sucursales);
                                for ($i = 0; $i < $count; $i++) {
                                    $sucursal = (object) $this->sucursales[$i];
                                    $str_sucursales .= " <div class='col-md-4'>
                                                            <div class='checkbox-custom checkbox-default'>
                                                                <input type='checkbox' value='$sucursal->sucursalID' id='$sucursal->nombreSucursal' name='sucursales[]'>
                                                                <label for='$sucursal->nombreSucursal'>$sucursal->nombreSucursal</label>
                                                            </div>
                                                        </div>";
                                }
                                ?>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirección <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select required title="Debe seleccionar una Dirección" class="form-control" id="direccion" name="direccion" aria-required="true">
                                            <option value="">Seleccionar </option>
                                            <?php echo $str_direccion ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Unidad <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="unidad" name="unidad">
                                            <option value="">Seleccionar </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tipo de Trámite <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select required="" title="Debe seleccionar un Tipo de Trámite" class="form-control" name="tipo_tramite" aria-required="true">
                                            <option value="">Seleccionar </option>
                                            <option value="100% linea">100% linea</option>
                                            <option value="Semi Presencial">Semi Presencial</option>
                                            <option value="Presencial">Presencial</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Título <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="titulo" class="form-control" title="Debe ingresar Título del Trámite"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="textareaDefault" class="col-md-3 control-label">Breve descripción </label>
                                    <div class="col-md-9">
                                        <textarea name="descripcion_breve" maxlength="140" data-plugin-maxlength="" rows="3" class="form-control"></textarea>
                                        <p><code>(Síntesis de la información, con datos precisos sobre ésta.)</code> Maximo 140 caracteres - <a href="#info-tramite" class="modal-basic"> Ver ejemplo</a></p>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descripción</label>
                                    <div class="col-md-9">
                                        <textarea class="summernote" name="descripcion" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Agregar descripción</textarea>
                                        <p>
                                            Maximo 500 caracteres
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Requisitos</label>
                                    <div class="col-md-9">
                                        <textarea class="summernote" name="requisitos" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Agregar requisitos</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Documentos</label>
                                    <div class="col-md-9">
                                        <textarea class="summernote" name="documentos" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Agregar documentos</textarea>
                                    </div>
                                </div>										
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirigido a <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="summernote" name="dirigido" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Agregar documentos</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Genero <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select required="" title="Obligatorio" class="form-control" id="genero" name="genero" aria-required="true">
                                            <option value="Hombre">Hombre</option>
                                            <option value="Mujer">Mujer</option>
                                            <option value="Todos">Todos</option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Rango Etario <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select required="" title="rango" class="form-control" id="rango" name="rango" aria-required="true">
                                            <option value="">Seleccionar </option>
                                            <option value="Menor de 18">Menor de 18</option>
                                            <option value="Desde 0 a 18">Desde 0 a 18</option>
                                            <option value="Mayor de 18">Desde 18 a 65</option>
                                            <option value="Mayor de 18">Mayor de 18</option>
                                            <option value="Entre 19 y 60">Entre 19 y 60</option>
                                            <option value="Desde 60 y más">Desde 60 y más</option>
                                            <option value="Desde 65 y más">Desde 65 y más</option>
                                            <option value="Todos">Todos</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Costo <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="costo" class="form-control" title="Obligatorio"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tiempo de entrega <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="entrega" class="form-control" title="entrega"  required/>
                                        <p>
                                            <code>Tiempo de entrega del tramite documento o beneficio ej.: 48 horas</code> 
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Vigencia</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="vigencia" class="form-control" title="Debe ingresar la vigencia del tramite" />
                                        <p>
                                            <code>Vigencia  del tramite o beneficio ej. Este beneficio de renueva cada 6 meses. </code> 
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Url Externa del Trámite</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="url_externa" class="form-control"/>
                                        <p>
                                            <code>Url que deriva al trámite. Ej. "http://www.santodomingo.cl/tramites"</code> 
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Url contenido multimedia</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="multimedia" class="form-control"/>
                                        <p>
                                            <code>Url que deriva al video del trámite. Ej. "https://www.youtube.com/watch?v=lZFT-ify5"</code> 
                                        </p>
                                    </div>
                                </div>

                            </div><!--end: panel-body -->

                        </section>

                    </div><!-- end: col-md-6-->


                    <!-- start:  datos de contacto -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Atención & Contacto</h5>
                                <hr class="mt-md">
                            </header>
 
                            <div class="panel-body">	

								<h4 class="ml-lg">Nuevos Horarios</h4>
								<?php
								$horarios = unserialize($this->tramite->horariosDiasAtencionTramite);
								
								?>
								
								<div class="form-group">
                                    <label class="col-md-2 control-label text-danger text-bold">LUNES</label>
                                    <label class="col-md-1 control-label">Mañana <span class="required">*</span></label> 
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="lun_man_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="lun_man_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="lun_tar_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="lun_tar_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-2 control-label text-danger text-bold">MARTES</label>
                                    <label class="col-md-1 control-label">Mañana <span class="required">*</span></label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mar_man_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mar_man_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mar_tar_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mar_tar_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div><div class="form-group">
                                    <label class="col-md-2 control-label text-danger text-bold">MIERCOLES</label>
                                    <label class="col-md-1 control-label">Mañana <span class="required">*</span></label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mier_man_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mier_man_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mier_tar_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mier_tar_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div><div class="form-group">
                                    <label class="col-md-2 control-label text-danger text-bold">JUEVES</label>
                                    <label class="col-md-1 control-label">Mañana <span class="required">*</span></label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="juev_man_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="juev_man_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="juev_tar_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="juev_tar_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div><div class="form-group">
                                    <label class="col-md-2 control-label text-danger text-bold">VIERNES</label>
                                    <label class="col-md-1 control-label">Mañana <span class="required">*</span></label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="vier_man_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="vier_man_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="vier_tar_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="vier_tar_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div><div class="form-group">
                                    <label class="col-md-2 control-label text-danger text-bold">SABADO</label>
                                    <label class="col-md-1 control-label">Mañana <span class="required">*</span></label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="sab_man_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="sab_man_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="sab_tar_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="sab_tar_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div><div class="form-group">
                                    <label class="col-md-2 control-label text-danger text-bold">DOMINGO</label>
                                    <label class="col-md-1 control-label">Mañana <span class="required">*</span></label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="dom_man_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="dom_man_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="dom_tar_desde" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="dom_tar_hasta" value="" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div>	

									<hr>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Horario mañana</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="manana_ini" value="8:30" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="manana_fin" value="14:00" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Horario Tarde</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="tarde_ini" value="15:00" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="tarde_fin" value="17:30" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teléfonos de contacto <span class="required">*</span></label>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input id="telefono1" name="telefono1" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="(+56352) 2 123-1234" class="form-control" title="Debe ingresar un télefono" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input id="telefono2" name="telefono2" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="(+56352) 2 123-1234" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Otros teléfonos </label>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input id="telefono3" name="telefono3" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="(+56352) 2 123-1234" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile"></i>
                                            </span>
                                            <input id="telefono4" name="telefono4" data-plugin-masked-input data-input-mask="(+56352) 9999-9999" placeholder="(+56352) 1234-1234" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" name="email" class="form-control" placeholder="ej.: email@santodomingo.cl" />
                                        </div>
                                    </div>

                                </div> 											   

                            </div>
                        </section>
                    </div><!--end: datos de contacto  -->			

                    <!-- start: Tipo de ramite -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Canales de Atención: </h5>
                                <hr class="mt-md">
                            </header>

                            <div class="panel-body">						 

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="Presencial" id="presencial">
                                            <label for="presencial">Presencial</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="Web" id="web">
                                            <label for="web">Web</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="Telefónico" id="telefonico">
                                            <label for="telefonico">Telefónico</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="Auto Servicio" id="auto-servicio">
                                            <label for="auto-servicio">Auto Servicio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="100% en Línea" id="en-linea">
                                            <label for="en-linea">Trámite 100% en Línea</label>
                                        </div>
                                    </div>
                                </div>	  

                            </div>
                        </section>
                    </div><!--end: Tipo de ramite -->

                    <!-- start: dias atencion -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Días de atención</h5>
                                <hr class="mt-md">
                            </header>

                            <div class="panel-body">										 

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Lunes" name="dias[]" id="lunes" checked="">
                                            <label for="lunes">Lunes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Martes" name="dias[]" id="martes" checked="">
                                            <label for="martes">Martes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Miércoles" name="dias[]" id="miercoles" checked="">
                                            <label for="miercoles">Miércoles</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Jueves" name="dias[]" id="jueves" checked="">
                                            <label for="jueves">Jueves</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Viernes" name="dias[]" id="viernes" checked="">
                                            <label for="viernes">Viernes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-warning">
                                            <input type="checkbox" value="Sábado" name="dias[]" id="sabado"  >
                                            <label for="sabado">Sábado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-danger">
                                            <input type="checkbox" value="Domingo" name="dias[]" id="domingo"  >
                                            <label for="domingo">Domingo</label>
                                        </div>
                                    </div>
                                </div>	  

                            </div>
                        </section>
                    </div><!--end: dias atención  -->		 

                    <!-- start: categrias -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Categorías del Trámite</h5>
                                <hr class="mt-md">
                            </header>										
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php echo $str_categorias ?>
                                </div>	  

                            </div>
                        </section>
                    </div><!--end: categorias -->
                    <!-- start: sucursales -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Sucursales donde se realiza el trámite</h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <div class="form-group">
                                    <?php echo $str_sucursales ?>
                                </div>	  

                            </div>
                        </section>
                    </div><!--end: sucursles -->
                    <!-- start: Tag -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Seleccionar tag para la publación</h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="tags-input-multiple" class="col-md-3 control-label">Tag para el trámite</label>
                                    <div class="col-md-9">
                                        <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary">
                                        </select>
                                        <input type="hidden" id="tag" name="tag">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div><!--end: Tag -->

                    <!-- start: Categorias -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Categorías en portada y estados </h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-success">
                                            <input type="checkbox" id="descatado" name="destacado">
                                            <label for="descatado">Trámite destacado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-success">
                                            <input type="checkbox" id="frecuente" name="frecuente">
                                            <label for="frecuente">Trámite frecuente</label>
                                        </div>
                                    </div>												
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-success">
                                            <input type="checkbox" id="estado" name="estado" checked>
                                            <label for="estado">Activo?</label>
                                        </div>
                                    </div>												
                                </div>

                            </div>
                        </section>
                    </div><!--end: categorias -->

                    <!-- start: Fechas y otros -->
                    <div class="col-md-12 col-xl-6">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Fechas de duración del tramites </h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <h5  class="mb-md clearfix"><strong>Fechas de duración del trámites</strong></h5>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Inicio</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" name="fch_inicio" data-plugin-datepicker data-date-format="dd/mm/yyyy" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Término</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" name="fch_fin" data-plugin-datepicker data-date-format="dd/mm/yyyy" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                            </div>
                        </section>
                    </div><!--end: Fechas y otros -->

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Agregar tramite</button>
                        </div>
                    </div>

                </form>	
            </div><!-- row -->	
        </div><!-- col-md-12-->
    </div>	<!-- row -->				
    <!-- end: content -->


</section>
<!-- end: page -->	

<!-- Modal info imagen-->
<div id="info-tramite" class="modal-block modal-block-lg mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Ejemplo bajada trámite</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">

                <div class="modal-text">
                    <p>
                        <strong>Quién:</strong> la persona y organización involucrada.<br>
                        <strong>Qué:</strong> el hecho noticioso en sí.<br>
                        <strong>Porqué:</strong> las razones o causas.<br>
                        <strong>Dónde:</strong> el lugar donde ocurrieron los hechos. <br>
                        <strong>Cuándo:</strong> cifras asociadas sobre la información.<br>
                    </p>

                    <img src="<?php echo URL ?>public/assets/images/ej-bajada.jpg"></img>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default modal-dismiss">Cerrar ejemplo</button>

                </div>
            </div>
        </footer>
    </section>
</div>