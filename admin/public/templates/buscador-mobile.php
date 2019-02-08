<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<form action="<?php echo URL ?>Tramites/buscar" method="post">
    <div class="input-group input-search">
        <input type="text" placeholder="Buscar..." id="q" name="buscar" class="form-control typeahead">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-red"><i class="fa fa-search"></i> buscar</button>
        </span>
    </div>
</form>
