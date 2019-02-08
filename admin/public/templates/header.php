<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="../" class="logo">
            <img src="<?php echo URL ?>public/assets/images/logo.png" height="65"  alt="Administrador Portal de Trámites Peñalolén" />

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
                    <img src="<?php echo URL ?>public/assets/images/!logged-user.jpg" alt="<?php echo Session::getValue('U_NOMBRES') . " " . Session::getValue('U_APELLIDOS'); ?>" class="img-circle" data-lock-picture="<?php echo URL ?>public/assets/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="Nazka Will" data-lock-email="<?php echo Session::getValue('U_MAIL') ?>">
                    <span class="name"><?php echo Session::getValue('U_NOMBRES') . " " . Session::getValue('U_APELLIDOS'); ?></span>
                    <span class="role">Administrador</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo URL ?>Usuarios/perfil"><i class="fa fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo URL ?>Usuarios/logout"><i class="fa fa-power-off"></i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>