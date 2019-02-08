<!DOCTYPE html>
<!--
Creado por Ruth Escobar A. @2015.
© Copyright - Grupo Desarrollo Multimedia
-->

<html>
    <head>
        <meta charset="UTF-8">

        <title>Administrador de Trámites Municipales</title>
        <meta name="description" content="Trámites Municipales de Santo Domingo">
        <meta name="author" content="Municipalidad de Santo Domingo">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/bootstrap/css/bootstrap.css" />

        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/summernote/summernote.css" />
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

        <!-- tag -->
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
        <!-- tag -->

        <!-- Theme CSS -->
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="http://localhost/tramites-admin/public/assets/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="http://localhost/tramites-admin/public/assets/vendor/modernizr/modernizr.js"></script>
    </head>

    <body>

        <input type="hidden" id="urlRoot" value="http://localhost/tramites-admin/">

        <section class="body">
            <!-- Start Site Header -->
            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="../" class="logo">
                        <img src="http://localhost/tramites-admin/public/assets/images/logo.png" height="65"  alt="Administrador portal de trámites Santo Domingo" />

                        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">

                    <span class="separator"></span>

                    <ul class="notifications">


                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="badge">3</span>
                            </a>

                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="pull-right label label-default">3</span>
                                    Tareas
                                </div>

                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-thumbs-down bg-danger"></i>
                                                </div>
                                                <span class="title">Mensaje 1</span>
                                                <span class="message">que hacer</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-lock bg-warning"></i>
                                                </div>
                                                <span class="title">Mensaje 2</span>
                                                <span class="message">que hacer 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-signal bg-success"></i>
                                                </div>
                                                <span class="title">Mensaje 3</span>
                                                <span class="message">este es el mensaje</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <hr />

                                    <div class="text-right">
                                        <a href="#" class="view-more">Ver todos</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <span class="separator"></span>

                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="Nazka Will" data-lock-email="apereda@gdm.cl">
                                <span class="name">Alan Pereda N</span>
                                <span class="role">administrador</span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> Perfil</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i>Bloquear sistema</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Salir</a>
                                </li>

                                <li>
                                    <a class="modal-basic" href="#logout"><i class="fa fa-power-off"></i> Salir modal</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <div class="inner-wrapper">

                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Menú de navegación
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>

                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">
                                    <li>
                                        <a href="index.html">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Escritorio</span>
                                        </a>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-columns" aria-hidden="true"></i>
                                            <span>Menu </span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="#">
                                                    Menu base 2
                                                </a>
                                            </li>
                                            <li class="nav-parent">
                                                <a>
                                                    Menu base 2
                                                </a>
                                                <ul class="nav nav-children">
                                                    <li>
                                                        <a href="#">
                                                            Menu base 2.1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Menu base 2.2
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    Menu base 3
                                                </a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-parent nav-expanded nav-active">
                                        <a>
                                            <i class="fa fa-copy" aria-hidden="true"></i>
                                            <span>Menu base 4</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="#">
                                                    Menu 4.1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Menu 4.2
                                                </a>
                                            </li>


                                        </ul>
                                    </li> 


                                </ul>
                            </nav>


                        </div>

                    </div>

                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">

                    <header class="page-header">
                        <h2>Ver comentarios</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Escritorio</span></li>
                                <li><span>sub pagina</span></li>
                            </ol>

                            <div style="margin-right:220px"></div> 
                        </div>

                    </header>

                    <!-- start: content -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <form id="form" action="pages-a3.html" class="form-horizontal">
                                    <div class="col-md-12 col-xl-6">

                                        <section class="panel">
                                            <header class="panel-heading bg-white ">
                                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Crear nuevo trámite </h5>
                                                <hr class="mt-md">
                                            </header>
                                            <div class="panel-body">


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Dirección <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select required="" title="Debe seleccionaruna dirección" class="form-control" id="direccion" name="direccion" aria-required="true">
                                                            <option value="">Seleccionar </option>
                                                            <option value="xxxx">xxxx</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Unidad <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select required="" title="Debe seleccionaruna una unidad" class="form-control" id="unidad" name="unidad" aria-required="true">
                                                            <option value="">Seleccionar </option>
                                                            <option value="xxxx">xxxx</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">URL del trámite <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="url" class="form-control" title="Debe ingresar una url"  required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Titulo <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="apellidos" class="form-control" title="Debe ingresar apellidos"  required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textareaDefault" class="col-md-3 control-label">Bajada </label>
                                                    <div class="col-md-9">
                                                        <textarea maxlength="140" data-plugin-maxlength="" rows="3" class="form-control"></textarea>
                                                        <p>
                                                            <code>(Síntesis de la información, con datos precisos sobre ésta.)</code> Maximo 140 caracteres
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Descripción</label>
                                                    <div class="col-md-9">
                                                        <!--div class="summernote " id="summernote"  data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'> </div-->
                                                        <div class="summernote" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Agregar descripción</div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Requisitos</label>
                                                    <div class="col-md-9">
                                                        <!--div class="summernote " id="summernote"  data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'> </div-->
                                                        <div class="summernote" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Agregar requisitos</div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Documentos</label>
                                                    <div class="col-md-9">
                                                        <!--div class="summernote " id="summernote"  data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'> </div-->
                                                        <div class="summernote" id="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Agregar documentos</div>

                                                    </div>
                                                </div>										
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Dirigido a <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select required="" title="Debe selecionar a quie esta dirigido el trámite" class="form-control" id="dirigido" name="dirigido" aria-required="true">
                                                            <option value="">Seleccionar </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Genero <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select required="" title="Obligatorio" class="form-control" id="genero" name="genero" aria-required="true">
                                                            <option value="">Seleccionar </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Rango etario <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select required="" title="rango" class="form-control" id="rango" name="rango" aria-required="true">
                                                            <option value="">Seleccionar </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>

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
                                                    <label class="col-sm-3 control-label">Vigencia <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="vigencia" class="form-control" title="Debe ingresar la vigencia del tramite"  required/>
                                                        <p>
                                                            <code>Vigencia  del tramite o beneficio ej. Este beneficio de renueva cada 6 meses. </code> 
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

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Horario mañana</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>
                                                            <input type="text" value="8:30" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>
                                                            <input type="text" value="14:00" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>

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
                                                            <input type="text"  value="15:00"  data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>
                                                            <input type="text"  value="17:30"  data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }'>

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
                                                            <input id="phone" name="phone" data-plugin-masked-input data-input-mask="+5622 9999999" placeholder="(+562) 2 123-1234" class="form-control" title="Debe ingresar un télefono" required/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 control-label">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-phone"></i>
                                                            </span>
                                                            <input id="phone2" name="phone2" data-plugin-masked-input data-input-mask="+5622 9999999" placeholder="(+562) 2 123-1234" class="form-control">
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
                                                            <input id="phone3" name="phone3" data-plugin-masked-input data-input-mask="+5622 9999999" placeholder="(+562) 2 123-1234" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 control-label">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-mobile"></i>
                                                            </span>
                                                            <input id="mobile" data-plugin-masked-input data-input-mask="(+569) 9999-9999" placeholder="(+569) 1234-1234" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-envelope"></i>
                                                            </span>
                                                            <input type="email" name="email" class="form-control" placeholder="ej.: email@santodomingo.cl" title="Debe ingresar un email válido" required/>
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
                                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Tipo de tención: </h5>
                                                <hr class="mt-md">
                                            </header>

                                            <div class="panel-body">										 

                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="en-linea">
                                                            <label for="en-linea">Trámite 100 % en línea</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="presencial">
                                                            <label for="presencial">Presencial</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="solicitud-en-linea">
                                                            <label for="solicitud-en-linea">Solicitud de en linea</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="telefonica">
                                                            <label for="telefonica">Teléfonica</label>
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
                                                            <input type="checkbox" id="lunes" checked="">
                                                            <label for="lunes">Lunes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="martes" checked="">
                                                            <label for="martes">Martes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="miercoles" checked="">
                                                            <label for="miercoles">Miercoles</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="jueves" checked="">
                                                            <label for="jueves">jueves</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="viernes" checked="">
                                                            <label for="viernes">Viernes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-warning">
                                                            <input type="checkbox" id="sabado"  >
                                                            <label for="sabado">Sábado</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-danger">
                                                            <input type="checkbox" id="domingo"  >
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
                                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Categorías del trámite</h5>
                                                <hr class="mt-md">
                                            </header>										
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="becas"  >
                                                            <label for="becas">Becas</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="beneficios"  >
                                                            <label for="beneficios">Beneficios</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="empleo" >
                                                            <label for="empleo">Empleo</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="adulto-mayor"  >
                                                            <label for="adulto-mayor">Adulto mayor</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="becas"  >
                                                            <label for="becas">Becas</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="beneficios"  >
                                                            <label for="beneficios">Beneficios</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="empleo" >
                                                            <label for="empleo">Empleo</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="adulto-mayor"  >
                                                            <label for="adulto-mayor">Adulto mayor</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="becas"  >
                                                            <label for="becas">Becas</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="beneficios"  >
                                                            <label for="beneficios">Beneficios</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="empleo" >
                                                            <label for="empleo">Empleo</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="adulto-mayor"  >
                                                            <label for="adulto-mayor">Adulto mayor</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="becas"  >
                                                            <label for="becas">Becas</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="beneficios"  >
                                                            <label for="beneficios">Beneficios</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="empleo" >
                                                            <label for="empleo">Empleo</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="adulto-mayor"  >
                                                            <label for="adulto-mayor">Adulto mayor</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="becas"  >
                                                            <label for="becas">Becas</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="beneficios"  >
                                                            <label for="beneficios">Beneficios</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="empleo" >
                                                            <label for="empleo">Empleo</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="adulto-mayor"  >
                                                            <label for="adulto-mayor">Adulto mayor</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="becas"  >
                                                            <label for="becas">Becas</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="beneficios"  >
                                                            <label for="beneficios">Beneficios</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="empleo" >
                                                            <label for="empleo">Empleo</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="adulto-mayor"  >
                                                            <label for="adulto-mayor">Adulto mayor</label>
                                                        </div>
                                                    </div>

                                                </div>	  

                                            </div>
                                        </section>
                                    </div><!--end: categorias -->
                                    <!-- start: sucursales -->
                                    <div class="col-md-12 col-xl-6">
                                        <section class="panel">
                                            <header class="panel-heading bg-white ">
                                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Sucursales donde se realza el trámite</h5>
                                                <hr class="mt-md">
                                            </header>
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="sucursal1"  >
                                                            <label for="sucursal1">Sucursal 1</label>
                                                        </div>
                                                    </div>												
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="sucursal2"  >
                                                            <label for="sucursal2">Sucursal 2</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="sucursal1"  >
                                                            <label for="sucursal1">Sucursal 1</label>
                                                        </div>
                                                    </div>												
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="sucursal2"  >
                                                            <label for="sucursal2">Sucursal 2</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="sucursal1"  >
                                                            <label for="sucursal1">Sucursal 1</label>
                                                        </div>
                                                    </div>												
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-default">
                                                            <input type="checkbox" id="sucursal2"  >
                                                            <label for="sucursal2">Sucursal 2</label>
                                                        </div>
                                                    </div>


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
                                                            <option value="tag1">tag 1</option>
                                                            <option value="tag2">tag 2</option>
                                                            <option value="tag3">tag 3</option>
                                                            <option value="tag4">tag 4</option>
                                                            <option value="tag5">tag 5</option>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div><!--end: Tag -->

                                    <!-- start: Categorias -->
                                    <div class="col-md-12 col-xl-6">
                                        <section class="panel">
                                            <header class="panel-heading bg-white ">
                                                <h5 class="text-weight-semibold text-dark text-uppercase mb-none">Categorias en portada </h5>
                                                <hr class="mt-md">
                                            </header>
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-success">
                                                            <input type="checkbox" id="descatado"  >
                                                            <label for="descatado">Trámite destacado</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-success">
                                                            <input type="checkbox" id="frecuente"  >
                                                            <label for="frecuente">trámite frecuente</label>
                                                        </div>
                                                    </div>	
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-success">
                                                            <input type="checkbox" id="pagos"  >
                                                            <label for="pagos">Pagos</label>
                                                        </div>
                                                    </div>	
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-success">
                                                            <input type="checkbox" id="certificados"  >
                                                            <label for="certificados">Certificados</label>
                                                        </div>
                                                    </div>	
                                                    <div class="col-md-4">
                                                        <div class="checkbox-custom checkbox-success">
                                                            <input type="checkbox" id="permisos"  >
                                                            <label for="permisos">Permisos</label>
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



                                                <h5  class="mb-md clearfix"><strong>Fechas de duración del tramites</strong></h5>



                                                <div class="col-md-6"> 
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Inicio</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> 
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Termino</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>
                                                <h5  class="mb-md mt-lg "><strong>Documentos asociados al trámite</strong></h5>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Subir documento</label>
                                                    <div class="col-md-9">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="input-append">
                                                                <div class="uneditable-input">
                                                                    <i class="fa fa-file fileupload-exists"></i>
                                                                    <span class="fileupload-preview"></span>
                                                                </div>
                                                                <span class="btn btn-default btn-file">
                                                                    <span class="fileupload-exists">Cambiar</span>
                                                                    <span class="fileupload-new">Seleccionar</span>
                                                                    <input type="file" />
                                                                </span>
                                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </section>
                                    </div><!--end: Fechas y otros -->

                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <button  class="btn btn-primary btn-md btn-block">Agregar tramite</button>

                                        </div>
                                    </div>

                                </form>	
                            </div><!-- row -->	
                        </div><!-- col-md-12-->
                    </div>	<!-- row -->				
                    <!-- end: content -->


                </section>
                <!-- end: page -->	            
            </div>

        </section>

        <!-- Vendor -->
        <script src="http://localhost/tramites-admin/public/assets/vendor/jquery/jquery.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

        <!-- Specific Page Vendor -->
        <script src="http://localhost/tramites-admin/public/assets/vendor/jquery-validation/jquery.validate.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/select2/js/select2.js"></script>

        <!-- tag -->
        <script src="http://localhost/tramites-admin/public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>	
        <!-- tag -->

        <script src="http://localhost/tramites-admin/public/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>

        <script src="http://localhost/tramites-admin/public/assets/vendor/summernote/summernote.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>	
        <script src="http://localhost/tramites-admin/public/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>


        <!-- Theme Base, Components and Settings -->
        <script src="http://localhost/tramites-admin/public/assets/javascripts/theme.js"></script>

        <!-- Theme Custom -->
        <script src="http://localhost/tramites-admin/public/assets/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="http://localhost/tramites-admin/public/assets/javascripts/theme.init.js"></script>

        <!-- exameple -->
        <script src="http://localhost/tramites-admin/public/assets/javascripts/ui-elements/gdm.modals.js"></script>
        <script src="http://localhost/tramites-admin/public/assets/javascripts/forms/gdm.validation.js"></script>
    </body>
</html>

