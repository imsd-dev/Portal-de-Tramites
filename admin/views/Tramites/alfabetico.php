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
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Trámites </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h1>Trámites por orden alfabético </h1>
                </div>

            </div>
        </div>
    </section>	


    <div class="container mt30">
        <div class="row hidden-md visible-xs">

            <div class="col-md-12 align-right">
                <div class="col-md-12 align-right">
                    <?php include TEMPLATE . 'buscador-mobile.php'; ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr class="tall30">

        </div>


        <div class="row">

            <div class="col-md-9 mb30">

                <div class="row">
                    <?php
                    if (!empty($this->tramites)) {

                        $count = count($this->tramites);
                        $letra = 'A';
                        $string = null;

                        for ($i = 0; $i < $count; $i++) {

                            $tramite = (object) $this->tramites[$i];
                            $letraT = substr($tramite->tituloTramite, 0, 1);

                            if ($letra == $letraT) {
                                $string .= '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '" >' . $tramite->tituloTramite . '</a></li>';
                            } else {
                                ?>
                                <div class="col-md-12 col-sm-12 ">
                                    <h2 class="mt-xl">Trámites con la letra<strong> <?php echo $letra ?></strong> </h2>
                                    <ul class="nav nav-list  alfabetico" >
                                        <?php echo $string; ?>
                                    </ul>
                                </div>	
                                <?php
                                $letra = $letraT;
                                $string = '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '" >' . $tramite->tituloTramite . '</a></li>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <?php include TEMPLATE . 'sidebar.php'; ?>´
        </div><!-- /row -->
    </div><!-- container-->

    <div class="clearfix"></div>

    <?php include './public/templates/votaciones.php'; ?>
</div>

