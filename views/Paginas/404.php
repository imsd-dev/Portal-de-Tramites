<?php
/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */
?>

<div role="main" class="main">
    <section class="page-header">
        <div class="container">
            <div class="row">
				<div class="col-md-6 col-xs-12">
                    <h1>Página no encontrada </h1>
                </div>
				
				<div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="#" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">404 </li>
                    </ul>
                </div>
                
                
            </div>
             
             
        </div>
    </section>

    <div class="container mt30">
        <div class="row hidden-md visible-xs">
            <div class="col-md-12 align-right">
                <div class="input-group input-search">
                    <input type="text" placeholder="Buscar..." id="q" name="q" class="typeahead form-control input-lg mb-md tt-input">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-red mb-md btn-lg fix-btn-gruop"><i class="fa fa-search"></i> buscar</button>
                    </span>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr class="tall30">
        </div>

        <div class="row">
            <div class="col-md-12 mb30 text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mt-xl"><strong>Lo sentimos  </strong> esta página no está disponible</h2>

                    </div> 
                </div>
                <div class="row">
                    <section class="page-not-found">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-not-found-main">
                                    <h2>404 <i class="fa fa-file"></i></h2>
                                    <form action="<?php echo URL ?>Tramites/buscar" method="post">
                                        <div class="input-group input-search">
                                            <!--input type="text" placeholder="Buscar..." id="q" name="q" class="form-control"-->
                                            <input type="text" placeholder="Buscar ejemplo: Permiso circulación" name="buscar" class="typeahead form-control input-lg mb-md">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-red mb-md btn-lg btn-md fix-btn-gruop"><i class="fa fa-search"></i> Buscar Trámite</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div><!-- row -->
            </div>
        </div><!-- /row -->

        <?php // include TEMPLATE . 'menu-iconos-index.php'; ?>
    </div><!-- container-->

    <div class="clearfix mt30"></div>

</div>

