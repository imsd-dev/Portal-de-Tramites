<!-- MENSAJES DE CONFIRMACIÓN / ERROR / ALERTAS -->

<?php if (isset($this->err)) { ?>
    <div class="alert alert-danger">
        <span class="title"><i class="fa fa-times-circle"></i> ERROR</span>
        <?php echo $this->err; ?>
    </div> 
    <?php
}

if (isset($this->msg)) {
    ?>
    <div class="alert alert-success">
        <span class="title"><i class="fa fa-check-square"></i> SUCCESS</span>
        <?php echo $this->msg; ?>
    </div>
    <?php
}

if (isset($this->info)) {
    ?>
    <div class="alert alert-info">
        <span class="title"><i class="fa fa-info-circle"></i> INFORMACIÓN</span>
        <?php echo $this->info; ?>
    </div>
    <?php
}

if (isset($this->warn)) {
    ?>
    <div class="alert alert-warning">
        <span class="title"><i class="fa fa-warning"></i> ALERTA</span>
        <?php echo $this->warn; ?>
    </div>
<?php }
?>

<!-- MENSAJES DE CONFIRMACIÓN / ERROR / ALERTAS -->



