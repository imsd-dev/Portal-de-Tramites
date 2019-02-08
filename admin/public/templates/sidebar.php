<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<div class="col-md-3 hidden-print">

    <div class="box_style_2">
        <h4>Categorías</h4>
        <?php
        if (!empty($this->categorias)) {

            $count = count($this->categorias);

            for ($i = 0; $i < $count; $i++) {
                $categorias = (object) $this->categorias[$i];
                ?>
                <img src="<?php echo URL . 'public/' . $categorias->iconoInteriorCategoria ?>" alt="<?php echo $categorias->nombreCategoria ?>" title="<?php echo $categorias->nombreCategoria ?>" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="<?php echo $categorias->nombreCategoria ?>" width="35" height="35" style="margin: 0 5px">
                <?php
            }
        }
        ?>
        <div class="clearfix"></div>
    </div>
    
    
    <h4>Trámites 100% en Línea</h4>
    <div class="box_style_cat">

        <ul id="cat_nav">
            <?php
            if (!empty($this->tramites_linea)) {
                for ($i = 0; $i < count($this->tramites_linea); $i++) {
                    $tramite = (object) $this->tramites_linea[$i];
                    echo '<li><a href="' . URL . 'Tramites/ver/' . $tramite->tituloUrlTramite . '">' . $this->acortar_texto($tramite->tituloTramite, 50) . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>

</div>
