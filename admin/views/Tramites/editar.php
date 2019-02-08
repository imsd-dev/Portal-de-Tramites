<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */

// función de gestión de errores
function myFunctionErrorHandler($errno) {
    switch ($errno) {
        case E_WARNING:
            return true;
    }
}

set_error_handler("myFunctionErrorHandler", E_WARNING);
?>

<script type="text/javascript">

function confirmation() {
    if(!confirm("¿Realmente desea eliminar este Trámite?")) return false;    
}
</script>

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Modificar Trámite</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URL ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Trámites</span></li>
                <li><span>Modificar</span></li>
            </ol>

            <div style="margin-right:220px"></div> 
        </div>
    </header>

    <!-- start: content -->

    <div class="row">
        <div class="col-md-12">

            <?php include TEMPLATE . 'mensajes.php'; ?>

            <div class="row">
                
                <form action="<?php echo URL ?>Tramites/editar" method="post" class="form-horizontal" id="form">

                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading bg-white ">
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Modificar Trámite </h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">
                                <?php
                                $str_direccion = null;
                                $str_unidades = null;
                                $str_categorias = null;
                                $str_sucursales = null;
                                $str_option_tag = null;

                                $count_dir = count($this->direcciones);
                                for ($i = 0; $i < $count_dir; $i++) {
                                    $direccion = (object) $this->direcciones[$i];
                                    $str_direccion .= "<option value='$direccion->direccionID'>$direccion->nombreDireccion</option>";
                                }

                                $count_uni = count($this->unidades);
                                for ($i = 0; $i < $count_uni; $i++) {
                                    $unidad = (object) $this->unidades[$i];
                                    $str_unidades .= "<option value='$unidad->unidadID'>$unidad->nombreUnidad</option>";
                                }

                                $count_cat = count($this->categorias);
                                for ($i = 0; $i < $count_cat; $i++) {
                                    $categoria = (object) $this->categorias[$i];
                                    $estado_chek = null;

                                    for ($j = 0; $j < count($this->categoriasTramites); $j++) {
                                        if ($this->categoriasTramites[$j]['categoriaID'] == $categoria->categoriaID) {
                                            $estado_chek = "checked";
                                        }
                                    }

                                    $str_categorias .= " <div class='col-md-4'>
                                                            <div class='checkbox-custom checkbox-default'>
                                                                <input type='checkbox' value='$categoria->categoriaID' id='$categoria->nombreCategoria' name='categorias[]' $estado_chek >
                                                                <label for='$categoria->nombreCategoria'>$categoria->nombreCategoria</label>
                                                            </div>
                                                        </div>";
                                }

                                $count_sucur = count($this->sucursales);
                                for ($i = 0; $i < $count_sucur; $i++) {
                                    $sucursal = (object) $this->sucursales[$i];
                                    $estado_chek = null;

                                    for ($j = 0; $j < count($this->sucursalesTramites); $j++) {
                                        if ($this->sucursalesTramites[$j]['sucursalID'] == $sucursal->sucursalID) {
                                            $estado_chek = "checked";
                                        }
                                    }

                                    $str_sucursales .= " <div class='col-md-4'>
                                                            <div class='checkbox-custom checkbox-default'>
                                                                <input type='checkbox' value='$sucursal->sucursalID' id='$sucursal->nombreSucursal' name='sucursales[]' $estado_chek >
                                                                <label for='$sucursal->nombreSucursal'>$sucursal->nombreSucursal</label>
                                                            </div>
                                                        </div>";
                                }

                                $tag = explode(',', $this->tramite->tagTramites);
                                foreach ($tag as $value) {
                                    $str_option_tag .= "<option selected value='$value'>$value</option>";
                                }
                                ?>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirección <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select required title="Debe seleccionar una Dirección" class="form-control" id="direccion" name="direccion" aria-required="true">
                                            <option value="<?php echo $this->tramite->direccionID ?>"><?php echo $this->tramite->nombreDireccion ?></option>
                                            <?php echo $str_direccion ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Unidad <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="unidad" name="unidad">
                                            <option value="<?php echo $this->tramite->unidadID ?>"><?php echo $this->tramite->nombreUnidad ?></option>
                                            <?php echo $str_unidades ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tipo de Trámite <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select required="" title="Debe seleccionar un Tipo de Trámite" class="form-control" name="tipo_tramite" aria-required="true">
                                            <option value="<?php echo $this->tramite->tipoTramite ?>"><?php echo $this->tramite->tipoTramite ?></option>
                                            <option value=""></option>
                                            <option value="100% linea">100% linea</option>
                                            <option value="Semi Presencial">Semi Presencial</option>
                                            <option value="Presencial">Presencial</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Título <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="titulo" class="form-control" title="Debe ingresar Título del Trámite" value="<?php echo $this->tramite->tituloTramite ?>" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="textareaDefault" class="col-md-3 control-label">Breve descripción <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <textarea name="descripcion_breve" maxlength="140" data-plugin-maxlength="" rows="3" class="form-control"><?php echo $this->tramite->descripcionBreveTramite ?></textarea>
                                        <p>
                                            <code>(Síntesis de la información, con datos precisos sobre ésta.)</code> Maximo 140 caracteres
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descripción <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <textarea class="summernote" name="descripcion" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>
                                            <?php echo $this->tramite->descripcionTramite ?>
                                        </textarea>
                                        <p>
                                            Maximo 500 caracteres
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Requisitos <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <textarea class="summernote" name="requisitos" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>
                                            <?php echo $this->tramite->requisitosTramite ?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Documentos</label>
                                    <div class="col-md-9">
                                        <textarea class="summernote" name="documentos" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>
                                            <?php echo $this->tramite->documentacionDetalleTramite ?>
                                        </textarea>
                                    </div>
                                </div>										
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirigido a <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="summernote" name="dirigido" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>
                                            <?php echo $this->tramite->destinadoATramite ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Genero <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select required="" title="Obligatorio" class="form-control" id="genero" name="genero" aria-required="true">
                                            <option value="<?php echo $this->tramite->generoTramite ?>"><?php echo $this->tramite->generoTramite ?></option>
                                            <option value=""></option>
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
                                            <option value="<?php echo $this->tramite->rangoEdadTramite ?>"><?php echo $this->tramite->rangoEdadTramite ?></option>
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
                                        <input type="text" name="costo" class="form-control" title="Obligatorio" value="<?php echo $this->tramite->costoTramite ?>" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tiempo de entrega <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="entrega" class="form-control" title="entrega" value="<?php echo $this->tramite->duracionTramite ?>" required/>
                                        <p>
                                            <code>Tiempo de entrega del tramite documento o beneficio ej.: 48 horas</code> 
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Vigencia</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="vigencia" class="form-control" title="Debe ingresar la vigencia del tramite" value="<?php echo $this->tramite->vigenciaTramite ?>"/>
                                        <p>
                                            <code>Vigencia  del tramite o beneficio ej. Este beneficio de renueva cada 6 meses. </code> 
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Url Externa del Trámite</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="url_externa" class="form-control" value="<?php echo $this->tramite->urlExternaTramite ?>"/>
                                        <p>
                                            <code>Url que deriva al trámite. Ej. "http://www.santodomingo.cl/tramites"</code> 
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Url contenido multimedia</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="multimedia" class="form-control" value="<?php echo $this->tramite->contenidoMultimediaTramite ?>"/>
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
                                            <input type="text" name="lun_man_desde" value="<?php echo $horarios["Lunes"]["lun_man_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false}'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="lun_man_hasta" value="<?php echo $horarios["Lunes"]["lun_man_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="lun_tar_desde" value="<?php echo $horarios["Lunes"]["lun_tar_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="lun_tar_hasta" value="<?php echo $horarios["Lunes"]["lun_tar_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
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
                                            <input type="text" name="mar_man_desde" value="<?php echo $horarios["Martes"]["mar_man_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mar_man_hasta" value="<?php echo $horarios["Martes"]["mar_man_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mar_tar_desde" value="<?php echo $horarios["Martes"]["mar_tar_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mar_tar_hasta" value="<?php echo $horarios["Martes"]["mar_tar_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
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
                                            <input type="text" name="mier_man_desde" value="<?php echo $horarios["Miercoles"]["mier_man_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mier_man_hasta" value="<?php echo $horarios["Miercoles"]["mier_man_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mier_tar_desde" value="<?php echo $horarios["Miercoles"]["mier_tar_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="mier_tar_hasta" value="<?php echo $horarios["Miercoles"]["mier_tar_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
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
                                            <input type="text" name="juev_man_desde" value="<?php echo $horarios["Jueves"]["juev_man_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="juev_man_hasta" value="<?php echo $horarios["Jueves"]["juev_man_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="juev_tar_desde" value="<?php echo $horarios["Jueves"]["juev_tar_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="juev_tar_hasta" value="<?php echo $horarios["Jueves"]["juev_tar_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
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
                                            <input type="text" name="vier_man_desde" value="<?php echo $horarios["Viernes"]["vier_man_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="vier_man_hasta" value="<?php echo $horarios["Viernes"]["vier_man_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="vier_tar_desde" value="<?php echo $horarios["Viernes"]["vier_tar_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="vier_tar_hasta" value="<?php echo $horarios["Viernes"]["vier_tar_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
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
                                            <input type="text" name="sab_man_desde" value="<?php echo $horarios["Sábado"]["sab_man_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="sab_man_hasta" value="<?php echo $horarios["Sábado"]["sab_man_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="sab_tar_desde" value="<?php echo $horarios["Sábado"]["sab_tar_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="sab_tar_hasta" value="<?php echo $horarios["Sábado"]["sab_tar_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
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
                                            <input type="text" name="dom_man_desde" value="<?php echo $horarios["Domingo"]["dom_man_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="dom_man_hasta" value="<?php echo $horarios["Domingo"]["dom_man_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<label class="col-md-1 control-label">Tarde <span class="required">*</span></label>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="dom_tar_desde" value="<?php echo $horarios["Domingo"]["dom_tar_desde"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="dom_tar_hasta" value="<?php echo $horarios["Domingo"]["dom_tar_hasta"] ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div>
								
								<hr>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Horario mañana <span class="required">*</span></label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="manana_ini" value="<?php echo $this->tramite->hrAtencionMananaIni ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="manana_fin" value="<?php echo $this->tramite->hrAtencionMananaFin ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Horario Tarde <span class="required">*</span></label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="tarde_ini" value="<?php echo $this->tramite->hrAtencionTardeIni ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <input type="text" name="tarde_fin" value="<?php echo $this->tramite->hrAtencionTardeFin ?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false, "defaultTime": false }'>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teléfonos anteriores </label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="<?php echo $this->tramite->telefonoContactoTramite ?>" />
                                    </div>
                                    <br>
                                    <br>
                                    <label class="col-md-3 control-label">Teléfonos de contacto <span class="required">*</span></label>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input id="telefono1" name="telefono1" value="<?php echo $this->tramite->telefono1ContactoTramite ?>" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="(+56352) 2 123-1234" class="form-control" title="Debe ingresar un télefono" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input id="telefono2" name="telefono2" value="<?php echo $this->tramite->telefono2ContactoTramite ?>" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="(+56352) 2 123-1234" class="form-control">
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
                                            <input id="telefono3" name="telefono3" value="<?php echo $this->tramite->telefono3ContactoTramite ?>" data-plugin-masked-input data-input-mask="+56352 9999999" placeholder="(+56352) 2 123-1234" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile"></i>
                                            </span>
                                            <input id="telefono4" name="telefono4" value="<?php echo $this->tramite->telefono4ContactoTramite ?>" data-plugin-masked-input data-input-mask="(+56352) 9999-9999" placeholder="(+56352) 1234-1234" class="form-control">
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
                                            <input type="email" name="email" class="form-control" value="<?php echo $this->tramite->emailContactoTramite ?>" placeholder="ej.: email@santodomingo.cl"/>
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
                                            <input type="checkbox" name="canales[]" value="Presencial" id="presencial" <?php
                                            try {
                                                if (in_array("Presencial", $this->canales)) {
                                                    echo "checked";
                                                }
                                            } catch (Exception $ex) {
                                                echo "";
                                            }
                                            ?>>
                                            <label for="presencial">Presencial</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="Web" id="web" <?php
                                            if (in_array("Web", $this->canales)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="web">Web</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="Telefónico" id="telefonico" <?php
                                            if (in_array("Telefónico", $this->canales)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="telefonico">Telefónico</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="Auto Servicio" id="auto-servicio" <?php
                                            if (in_array("Auto Servicio", $this->canales)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="auto-servicio">Auto Servicio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="canales[]" value="100% en Línea" id="en-linea" <?php
                                            if (in_array("100% en Línea", $this->canales)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="en-linea">100% en Línea</label>
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
                                            <input type="checkbox" value="Lunes" name="dias[]" id="lunes"  <?php
                                            if (in_array("Lunes", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="lunes">Lunes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Martes" name="dias[]" id="martes"  <?php
                                            if (in_array("Martes", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="martes">Martes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Miércoles" name="dias[]" id="miercoles"  <?php
                                            if (in_array("Miércoles", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="miercoles">Miércoles</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Jueves" name="dias[]" id="jueves"  <?php
                                            if (in_array("Jueves", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="jueves">Jueves</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" value="Viernes" name="dias[]" id="viernes"  <?php
                                            if (in_array("Viernes", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="viernes">Viernes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-warning">
                                            <input type="checkbox" value="Sábado" name="dias[]" id="sabado"  <?php
                                            if (in_array("Sábado", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="sabado">Sábado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-danger">
                                            <input type="checkbox" value="Domingo" name="dias[]" id="domingo" <?php
                                            if (in_array("Domingo", $this->dias)) {
                                                echo "checked";
                                            }
                                            ?>>
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
                                    <label for="tags-input-multiple" class="col-md-3 control-label">Tag para el trámite <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary" required>
                                            <?php echo $str_option_tag ?>
                                        </select>
                                        <input type="hidden" id="tag" name="tag" value="<?php echo $this->tramite->tagTramites ?>">
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
                                            <input type="checkbox" id="descatado" name="destacado" <?php
                                            if ($this->tramite->destacadoTramite == 1) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="descatado">Trámite destacado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-success">
                                            <input type="checkbox" id="frecuente" name="frecuente" <?php
                                            if ($this->tramite->frecuenteTramite == 1) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="frecuente">Trámite frecuente</label>
                                        </div>
                                    </div>												
                                    <div class="col-md-4">
                                        <div class="checkbox-custom checkbox-success">
                                            <input type="checkbox" id="estado" name="estado" <?php
                                            if ($this->tramite->estadoTramite == 1) {
                                                echo "checked";
                                            }
                                            ?>>
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
                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Fechas de duración del trámite </h5>
                                <hr class="mt-md">
                            </header>
                            <div class="panel-body">

                                <h5  class="mb-md clearfix"><strong>Fechas de duración del trámite</strong></h5>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Inicio</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" name="fch_inicio" data-plugin-datepicker data-date-format="dd/mm/yyyy" class="form-control" value="<?php echo $this->dateFormat_view($this->tramite->plazoInicioTramite) ?>">
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
                                                <input type="text" name="fch_fin" data-plugin-datepicker data-date-format="dd/mm/yyyy" class="form-control" value="<?php echo $this->dateFormat_view($this->tramite->plazoFinTramite) ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>


                                <div class="clearfix"></div>
                                <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="id_tramite">
                            </div>
                        </section>
                    </div><!--end: Fechas y otros -->

                    <!-- start: Fechas y otros -->


                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-warning btn-lg btn-block">Modificar Trámite</button>
                        </div>
                    </div>

                </form>	

                <div class="col-md-12 mt-lg">
                    <section class="panel">
                        <header class="panel-heading bg-white ">
                            <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Documentos del Trámite </h5>
                            <hr class="mt-md">
                        </header>
                        <div class="panel-body">
                            <h5  class="mb-md mt-lg "><strong>Documentos asociados al Trámite</strong></h5>

                            <div class="col-md-6">
                                <?php
                                if ($this->documentos == null) {
                                    echo "<span>No hay documentos asociados.</span>";
                                } else {
                                    echo "<ul class='list-group'>";
                                    foreach ($this->documentos as $value) { ?>
										
                                        <li class='list-group-item'><?php echo $value ?>
											<form action="<?php echo URL ?>Tramites/eliminarArchivo" method="post">
												<input type="hidden" name="nombre" value="<?php echo $value ?>">
												<input type="hidden" name="id_tramite" value="<?php echo $this->tramite->tramiteID ?>">
												<button type="submit" class="btn btn-danger pull-right btn-xs" style="margin-top:-20px"><i class="fa fa-trash"></i></button>
											</form>
										</li>
										
										<?php
                                    }
                                    echo "</ul>";
                                }
                                ?>
                            </div>
							
							<div class="col-md-6">
							<form action="<?php echo URL ?>Tramites/subirArchivo" method="post" enctype="multipart/form-data"> 
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Subir documento</label>

                                    <div class="col-md-8">

                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Cambiar</span>
                                                    <span class="fileupload-new">Seleccionar</span>
                                                    <input type="file" name="file"/>
                                                    <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="id_tramite">
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                    
									
									<div class="col-md-4" >
                                        <button class="btn btn-info btn-sm mt10"  type="submit">Subir archivo</button>
                                    </div>
                                
								</div>
                            </form>
							</div>
							
                            

                            <div class="clearfix"></div>
                            <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="id_tramite">
                        </div>
                    </section>
                </div><!--end: Fechas y otros -->
                
                <div class="col-md-12 col-xl-6">
                    <form action="<?php echo URL ?>Tramites/eliminar" method="post" onsubmit="return confirmation()">
                        <input type="hidden" value="<?php echo $this->tramite->tramiteID ?>" name="tramite_id">
                        <input type="submit" value="Eliminar Trámite" class="btn btn-danger btn-block">
                    </form> 
                </div>
            </div><!-- row -->	
        </div><!-- col-md-12-->
    </div>	<!-- row -->				
    <!-- end: content -->


</section>
<!-- end: page -->	
