<?php
if (!isset($_SESSION['U_NOMBRES'])) {
    header('location: ' . URL);
}
?>
<!DOCTYPE html>
<!--
Creado por Ruth Escobar A. @2016
© Copyright - Municipalidad de Peñalolén
-->

<html class="fixed">
    <head>
        <?php require TEMPLATE . 'head.php'; ?>
    </head>
                
    <body>
    
    	<input type="hidden" id="urlRoot" value="<?php echo URL ?>">

        <section class="body">
            <!-- Start Site Header -->
            <?php include TEMPLATE . 'header.php'; ?>

            <div class="inner-wrapper">
                
                <?php include TEMPLATE . 'menu.php'; ?>
