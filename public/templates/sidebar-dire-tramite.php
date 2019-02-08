<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * UI/UX Alan Pereda N. 
 * © Copyright - Municipalidad de Peñalolén
 */
?>
<div class="col-md-12 hidden-print">
    <?php
    if (!empty($this->categorias)) {
        ?>
        <div class="box_style_2">
            <h4>Categorías</h4>
            <?php
            $count = count($this->categorias);

            for ($i = 0; $i < $count; $i++) {
                $categorias = (object) $this->categorias[$i];
                ?>
                <a href="<?php echo URL ?>Tramites/categoria/<?php echo $categorias->categoriaID ?>">
                    <img src="<?php echo URL . 'public/' . $categorias->iconoInteriorCategoria ?>" alt="<?php echo $categorias->nombreCategoria ?>" title="<?php echo $categorias->nombreCategoria ?>" data-toggle="tooltip" data-plugin-tooltip="" data-original-title="<?php echo $categorias->nombreCategoria ?>" width="35" height="35" style="margin: 0 5px 5px 0">
                </a>
                <?php
            }
            ?>
            <div class="clearfix"></div>
        </div>
        <?php
    }
    ?>


    <h4>Trámites 100% en Línea</h4>
	<aside class="sidebar">
		<div class="box_style_cat-bin">

			<ul id="cat_nav" class="nav nav-list narrow">
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
	</aside>
</div>
