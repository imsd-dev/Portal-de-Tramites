<?php
/*
 * Creado por Ruth Escobar A. @2016.
 * UI/UX Alan Pereda N. 
 * © Copyright - Municipalidad de Peñalolén
 */
?>
<div role="main" class="main">

	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					
				 <h1>Directorio Telefónico </h1>
				
				</div>
			 
				<div class="col-md-6 col-xs-12">
					<ul class="breadcrumb">
						<li><a href="#" style="color: #fff;">Inicio</a></li>
						 <li class="active" style="color: #fff;">Directorio Telefónico </li>

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
                        <button type="submit" class="btn btn-red mb-md btn-lg fix-btn-gruop"><i class="fa fa-search"></i> Buscar Trámite</button>
                    </span>
                </div>

            </div>
            <div class="clearfix"></div>
            <hr class="tall30">

        </div>

        <div class="row">

            <div class="col-md-9 mb30">
			
				<div class="row">
                    <div class="col-md-8">
                        <h2 class="mb-none"><strong>Nuestro</strong> Directorio Teléfonico</h2>
                        <!--p>Buscar entre los direcciones municipales.</p-->
                    </div> 
                </div>

				

                <div class="col-md-11">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="300">Unidades Municipales</th>
                                <th width="400">Número de Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Central de Comunicaciones</td>
                                <td>35 2200 610</td>
                            </tr>
                            <tr>
                                <td>Alcaldía</td>
                                <td>2 2486 80 54</td>
                            </tr>
                            <tr>
                                <td>Secretaría municipal</td>
                                <td>2 2486 81 80</td>
                            </tr>
                            <tr>
                                <td>Administración municipal</td>
                                <td>2 2486 80 53</td>
                            </tr>
                            <tr>
                                <td>Gabinete municipal</td>
                                <td>2 2486 80 54</td>
                            </tr>
                            <tr>
                                <td>Comunicaciones</td>
                                <td>2 2486 81 54</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="300">Emergencias</th>
                                <th width="400">Número de Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Seguridad Ciudadana</td>
                                <td>133</td>
                            </tr>
                            <tr>
                                <td>43º Comisaria de Carabineros de Peñalolén</td>
                                <td>(02) 2922 34 30</td>
                            </tr>
                            <tr>
                                <td>Bomberos</td>
                                <td>(02) 2204 00 52</td>
                            </tr>
                            <tr>
                                <td>Inspección municipal</td>
                                <td>(02)2486 82 56</td>
                            </tr>
                            <tr>
                                <td>Depto. de Emergencia</td>
                                <td>(02) 2486 82 58</td>
                            </tr>
                            <tr>
                                <td>Consultorio Cardenal Silva Henríquez</td>
                                <td>(02)&nbsp;29397511</td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- row -->
            </div>

            <?php include TEMPLATE . 'sidebar.php'; ?>´
        </div><!-- /row -->

    </div><!-- container-->

    <div class="clearfix"></div>

    <?php // include './public/templates/votaciones.php'; ?>

</div> <!-- /MAIN -->	