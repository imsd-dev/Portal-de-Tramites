<?php
/**
 * Página de éxito del Comercio
 * Esta página será invocada por Flow cuando la transacción resulte exitosa
 * y el usuario presione el botón para retornar al comercio desde Flow
 */
include 'flowAPI.php';

// Inicializa la clase de flowAPI
$flowAPI = new flowAPI();

try {
    // Lee los datos enviados por Flow
    $flowAPI->read_result();
} catch (Exception $e) {
    error_log($e->getMessage());
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Ha ocurrido un error interno', true, 500);
    return;
}

//Recupera los datos enviados por Flow
$ordenCompra = $flowAPI->getOrderNumber();
$monto = $flowAPI->getAmount();
$concepto = $flowAPI->getConcept();
$pagador = $flowAPI->getPayer();
$flowOrden = $flowAPI->getFlowNumber();

//Aprueba el plan

if ($concepto == "Plan Maquinaria") {

    require './controllers/Planes.php';
    $maquinariaController = new Planes();
} else if ($concepto == "Pago Plan Publicidad") {

    require './controllers/Publicidad.php';
    $publicidadController = new Publicidad();

    if ($ordenCompra != null) {
        $publicidadController->aprobar($ordenCompra);
    }
}
?>

<div class="panel panel-default"> 
    <div class="panel-heading">
        <h4> Tu  compra ha sido realizado con exito</h4>
    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-sm-6">

                <h4>Detalle de tranasacción</h4>
                <strong>Orden de Compra:</strong> <?php echo $ordenCompra ?><br />
                <strong> Monto:</strong> <?php echo $monto ?><br />
                <strong>Descripción:</strong> <?php echo $concepto ?><br />
                <strong>Pagador:</strong> <?php echo $pagador ?><br />
                <strong>Flow Orden N°:</strong> <?php echo $flowOrden ?><br />
                <br>
                Gracias por su compra

            </div>
            <div class="col-sm-6">

                <h4></h4>

                <button class="btn btn-success btn-icon">
                    <i class="fa-check"></i>
                    <span>Agregar Publicidad </span>
                </button>

                <button class="btn btn-success btn-icon">
                    <i class="fa-check"></i>
                    <span>Agregar Maquinaria</span>
                </button>
            </div>
            <div class="col-sm-6">


            </div>
        </div>


    </div><!-- /panel-body -->	
</div>