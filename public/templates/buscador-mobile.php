<?php
/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */
?>

<form action="<?php echo URL ?>Tramites/buscar" method="post">
    <div class="input-group input-search">
        <input type="text" placeholder="Buscar..." id="q" name="buscar" class="form-control typeahead input-lg mb-md tt-input" aria-labelledby="q">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-red mb-md btn-lg btn-md fix-btn-gruop" ><span class="fa fa-search"></span> Buscar </button>
        </span>
    </div>
</form>
