<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * © Copyright - Grupo Desarrollo Multimedia
 */
?>

<form action="<?php echo URL ?>Anuncios/buscar" method="post">

    <div class="col-xs-12  col-sm-3  col-md-3 nazka">
        <div  class="mb20"> </div>
        <h4 class="widgettitle">Especificaciones</h4>
        <div class="col-md-11">
            <div class="form-group">

                <label>Tipo Maquinaria</label>
                <select name="tipo" class="form-control" id="categoria" >
                    <option value="">Seleccionar</option>                                   
                    <?php
                    for ($i = 0; $i < count($this->categorias); $i++) {
                        $value = $this->categorias[$i];
                        echo "<option value='$value->categoriaID'>$value->nombreCategoria</option>";
                    }
                    ?>
                </select>

            </div><!-- /form-group -->

            <div class="form-group">

                <label>Sub Tipo Maqunaria</label>
                <select name="subTipo" class="form-control" id="subCategoria" >
                    <option value="">Seleccionar</option>                                   
                    <?php
                    for ($i = 0; $i < count($this->subCategorias); $i++) {
                        $value = $this->subCategorias[$i];
                        echo "<option value='$value->subCategoriaID'>$value->nombreSubCategoria</option>";
                    }
                    ?>
                </select>

            </div><!-- /form-group -->

            <div class="form-group">

                <label>Pais</label>
                <select name="pais" class="form-control selectpicker">
                    <option value="">Seleccionar</option>
                    <option value="CHILE">Chile</option>
                    <option value="ESPAÑA">España</option>
                    <option value="BRASIL">Brasil</option>
                </select>

            </div><!-- /form-group -->

            <div class="form-group">
                <label>Ciudad</label>
                <input type="text" name="ciudad" placeholder="Ej. Santiago" class="form-control">  
            </div><!-- /form-group -->

            <div class="form-group">

                <label>Marca</label>
                <select name="marca" class="form-control" id="marca">
                    <option value="">Seleccionar</option>                                   
                    <?php
                    for ($i = 0; $i < count($this->marcas); $i++) {
                        $value = $this->marcas[$i];
                        echo "<option value='$value->marcaID'>$value->nombreMarca</option>";
                    }
                    ?>
                </select>

            </div><!-- /form-group -->

            <div class="form-group">

                <label>Modelo</label>
                <input type="text" name="modelo" placeholder="Ej. Caterpillar" class="form-control"> 
            </div><!-- /form-group -->

            <div class="form-group">

                <label>Tipo Vendedor</label>
                <select name="vendedor" class="form-control selectpicker">
                    <option value="">Seleccionar</option>
                    <option value="Empresa">Empresa</option>
                    <option value="Particular">Particular</option>
                </select>

            </div><!-- /form-group -->

            <div class="form-group">

                <label>Nuevo Usado</label>
                <select name="estado" class="form-control selectpicker">
                    <option value="">Seleccionar</option>
                    <option value="Nuevo">Nuevo</option>
                    <option value="Usado">Usado</option>
                </select>

            </div><!-- /form-group -->

            <div class="form-group">

                <label>Año Fabricación</label>
                <div class="form-inline">
                    <div class="form-group col-sm-6">
                        <label>Minimo</label>
                        <select name="anoMin" class="form-control selectpicker">
                            <option value="TODOS">Todos</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Maximo</label>
                        <select name="anoMax" class="form-control selectpicker">
                            <option value="2020">Todos</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <div  class="clearfix mb20"> </div>
                </div>

            </div><!-- /form-group -->

            <div class="form-group">
                <label>Rango de precios</label>
                <div class="form-inline">
                    <div class="form-group col-sm-6">
                        <label>Minimo</label>
                        <select name="precioMin" class="form-control selectpicker">
                            <option value="TODOS">Todos</option>
                            <option value="0">0</option>
                            <option value="500000"> 500 mil pesos</option>
                            <option value="1000000"> 1 millón</option>
                            <option value="1500000"> 1,5 millones</option>
                            <option value="2000000"> 2 millones</option>
                            <option value="2500000"> 2,5 millones</option>
                            <option value="3000000"> 3 millones</option>
                            <option value="3500000"> 3,5 millones</option>
                            <option value="4000000"> 4 millones</option>
                            <option value="4500000"> 4,5 millones</option>
                            <option value="5000000"> 5 millones</option>
                            <option value="5500000"> 5,5 millones</option>
                            <option value="6000000"> 6 millones</option>
                            <option value="6500000"> 6,5 millones</option>
                            <option value="7000000"> 7 millones</option>
                            <option value="7500000"> 7,5 millones</option>
                            <option value="8000000"> 8 millones</option>
                            <option value="8500000"> 8,5 millones</option>
                            <option value="9000000"> 9 millones</option>
                            <option value="9500000"> 9,5 millones</option>
                            <option value="10000000"> 10 millones</option>
                            <option value="10500000"> 10,5 millones</option>
                            <option value="11000000"> 11 millones</option>
                            <option value="11500000"> 11,5 millones</option>
                            <option value="12000000"> 12 millones</option>
                            <option value="12500000"> 12,5 millones</option>
                            <option value="13000000"> 13 millones</option>
                            <option value="13500000"> 13,5 millones</option>
                            <option value="14000000"> 14 millones</option>
                            <option value="14500000"> 14,5 millones</option>
                            <option value="15000000"> 15 millones</option>
                            <option value="15500000"> 15,5 millones</option>
                            <option value="16000000"> 16 millones</option>
                            <option value="16500000"> 16,5 millones</option>
                            <option value="17000000"> 17 millones</option>
                            <option value="17500000"> 17,5 millones</option>
                            <option value="18000000"> 18 millones</option>
                            <option value="18500000"> 18,5 millones</option>
                            <option value="19000000"> 19 millones</option>
                            <option value="19500000"> 19,5 millones</option>
                            <option value="20000000"> 20 millones</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Maximo</label>
                        <select name="precioMax" class="form-control selectpicker">

                            <option value="20000000">Todos</option>
                            <option value="0"> 0 pesos</option>
                            <option value="500000"> 500 mil pesos</option>
                            <option value="1000000"> 1 millón</option>
                            <option value="1500000"> 1,5 millones</option>
                            <option value="2000000"> 2 millones</option>
                            <option value="2500000"> 2,5 millones</option>
                            <option value="3000000"> 3 millones</option>
                            <option value="3500000"> 3,5 millones</option>
                            <option value="4000000"> 4 millones</option>
                            <option value="4500000"> 4,5 millones</option>
                            <option value="5000000"> 5 millones</option>
                            <option value="5500000"> 5,5 millones</option>
                            <option value="6000000"> 6 millones</option>
                            <option value="6500000"> 6,5 millones</option>
                            <option value="7000000"> 7 millones</option>
                            <option value="7500000"> 7,5 millones</option>
                            <option value="8000000"> 8 millones</option>
                            <option value="8500000"> 8,5 millones</option>
                            <option value="9000000"> 9 millones</option>
                            <option value="9500000"> 9,5 millones</option>
                            <option value="10000000"> 10 millones</option>
                            <option value="10500000"> 10,5 millones</option>
                            <option value="11000000"> 11 millones</option>
                            <option value="11500000"> 11,5 millones</option>
                            <option value="12000000"> 12 millones</option>
                            <option value="12500000"> 12,5 millones</option>
                            <option value="13000000"> 13 millones</option>
                            <option value="13500000"> 13,5 millones</option>
                            <option value="14000000"> 14 millones</option>
                            <option value="14500000"> 14,5 millones</option>
                            <option value="15000000"> 15 millones</option>
                            <option value="15500000"> 15,5 millones</option>
                            <option value="16000000"> 16 millones</option>
                            <option value="16500000"> 16,5 millones</option>
                            <option value="17000000"> 17 millones</option>
                            <option value="17500000"> 17,5 millones</option>
                            <option value="18000000"> 18 millones</option>
                            <option value="18500000"> 18,5 millones</option>
                            <option value="19000000"> 19 millones</option>
                            <option value="19500000"> 19,5 millones</option>
                            <option value="20000000"> 20 millones</option>
                        </select>
                    </div>
                    <div  class="clearfix mb20"> </div>

                </div>
            </div><!-- /form-group -->

        </div><!-- /col-md-11 -->
        <div  class="mb20"> </div>
        <button type="submit" class="btn-primary btn-sm btn pull-right">Filtrar Anuncios</button>
        <div  class="mb20"> </div>
        <!-- Search Filters -->
    </div>
</form>