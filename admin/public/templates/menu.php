<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Municipalidad de Peñalolén
 */
?>

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
                        <a href="<?php echo URL ?>Escritorio">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Escritorio</span>
                        </a>
                    </li>
                    <li class="nav-parent <?php echo $this->tramitesMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Trámites </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Tramites/crear">
                                    Crear Trámite
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Tramites/buscar">
                                    Buscar/Editar Trámite
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Tramites/destacar">
                                    Destacar Trámite
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->usuariosMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Usuarios </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Usuarios/crear">
                                    Crear Usuario
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Usuarios/buscar">
                                    Editar/Eliminar Usuario
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->direccionesMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Direcciones </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Direcciones/crear">
                                    Crear Dirección
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Direcciones/listar">
                                    Editar/Eliminar Dirección
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->unidadesMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Unidades </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Unidades/crear">
                                    Crear Unidad
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Unidades/listar">
                                    Editar/Eliminar Unidad
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->sucursalesMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Sucursales </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Sucursales/crear">
                                    Crear Sucursal
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Sucursales/listar">
                                    Editar/Eliminar Sucursal
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->categoriasMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Categorías </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Categorias/crear">
                                    Crear Categoría
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Categorias/listar">
                                    Editar/Eliminar Categoría
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->glosarioMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Glosario </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Glosario/crear">
                                    Crear Glosario
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Glosario/listar">
                                    Editar/Eliminar Glosario
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->preguntasMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Preguntas Frecuentes </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Preguntas/crear">
                                    Crear Pregunta Frecuente
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>Preguntas/listar">
                                    Editar/Eliminar Pregunta Frecuente
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->votosMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Votos de Trámites </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Votos/listar">
                                    Ver votaciones
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->comentMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Comentarios </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Comentarios/listar">
                                    Ver Comentarios
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent <?php echo $this->propMenu ?>">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Propuestas </span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URL ?>Propuestas/listar">
                                    Ver Propuestas
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