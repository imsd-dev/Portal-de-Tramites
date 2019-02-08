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
                    <h1>Directorio Telefónico</h1>
                </div>

                <div class="col-md-6 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL ?>" style="color: #fff;">Inicio</a></li>
                        <li class="active" style="color: #fff;">Directorio Telefónico  </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <div class="container mt30">
        <div class="row hidden-md visible-xs">

            <div class="col-md-12 align-right">
                <?php include TEMPLATE . 'buscador-mobile.php'; ?>
            </div>
            <div class="clearfix"></div>
            <hr class="tall30">

        </div>

        <div class="row">
			<!-- ID  LEER -->
			<div id="leer"> 
				<div class="col-md-9 mb30">

					<div class="row">
						<div class="col-md-8">
							<h2 class="mb-none"><strong>Nuestro</strong> Directorio Teléfonico</h2>
							<p>Buscar entre los direcciones municipales.</p>
						</div> 
					</div>

					<div class="col-md-11">
						<?php
						$str_muni = null;
						$str_emer = null;
						$str_otros = null;

						if (empty($this->telefonos)) {
							
						} else {
							$count = count($this->telefonos);

							for ($i = 0; $i < $count; $i++) {

								$telefono = (object) $this->telefonos[$i];
								switch ($telefono->categoriaTelefono) {
									case 'Municipal':
										$str_muni .= "<tr>
														<td>" . $telefono->nombreTelefono . "</td>
														<td><a href='tel:" . $telefono->numeroTelefono . "'>" . $telefono->numeroTelefono . "</a></td>
													</tr>";
										break;
									case 'Emergencia':
										$str_emer .= "<tr>
														<td>" . $telefono->nombreTelefono . "</td>
														<td><a href='tel:" . $telefono->numeroTelefono . "'>" . $telefono->numeroTelefono . "</a></td>
													</tr>";
										break;
									case 'Otros':
										$str_otros .= "<tr>
														<td>" . $telefono->nombreTelefono . "</td>
														<td><a href='tel:" . $telefono->numeroTelefono . "'>" . $telefono->numeroTelefono . "</a></td>
													</tr>";
										break;
								}
							}
						}
						?>

						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="500">Unidades Municipales</th>
									<th width="400">Número de Teléfono</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $str_muni; ?>
							</tbody>
						</table>
						<br>
						<br>
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="500">Emergencias</th>
									<th width="400">Número de Teléfono</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $str_emer; ?>
							</tbody>
						</table>
						<br>
						<br>
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="500">Otros Teléfonos</th>
									<th width="400">Número de Teléfono</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $str_otros; ?>
							</tbody>
						</table>       
					</div><!-- /row -->
				
				
				</div><!-- container-->
			</div><!-- /ID  LEER -->
            <?php include TEMPLATE . 'sidebar.php'; ?>´
        </div><!-- container-->
    </div><!-- container-->

    <div class="clearfix"></div>

    <?php include './public/templates/votaciones.php'; ?>
</div>