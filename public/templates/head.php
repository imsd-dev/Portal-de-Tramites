 <!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
$title = "";
if(!empty($this->tramite)){
	echo '<title>' .  $this->tramite->tituloTramite . '</title>';
}else{
	
	$title = $this->title;
	
	switch($title){
		case "categorias":
			$titulo = "Categorias de Trámites";
			break;
		case 'direcciones':
			$titulo = "Direcciones Municipales";
			break;
		case "glosario":
			$titulo = "Glosario de Trámites";
			break;
		case "paginas":
			$titulo = $this->tituloPagina;
			break;
		case "preguntas":
			$titulo = "Preguntas Frecuentes";
			break;
		case "sucursales":
			$titulo = "Edificios Municipales";
			break;
		case "telefonos":
			$titulo = "Directorio Telefónico";
			break;
		case "unidades":
			$titulo = "Unidades Municipales";
			break;
		default:
			$titulo = "Trámites Municipalidad de Santo Domingo";
			break;
	}
	
	echo '<title>'.$titulo.'</title>';
}

?>

<meta name="description" content="Trámites Municipales, Municipalidad de Santo Domingo ">
<meta name="author" content="Municipalidad de Santo Domingo">

<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#155980">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#155980">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#155980">

<link rel="icon" sizes="192x192"  href="<?php echo URL ?>public/img/loguito.png">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo URL ?>public/img/loguito.png" type="image/png" />
<link rel="apple-touch-icon" href="<?php echo URL ?>public/img/loguito.png">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0">
<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
<!-- Vendor CSS -->
<link rel="stylesheet" href="<?php echo URL ?>public/vendor/bootstrap/css/bootstrap.min.css">
 
<link rel="stylesheet" href="<?php echo URL ?>public/vendor/font-awesome/css/font-awesome.css">

<!-- Theme CSS -->
<link rel="stylesheet" href="<?php echo URL ?>public/css/theme.css">
<link rel="stylesheet" href="<?php echo URL ?>public/css/theme-elements.css">
<!--link rel="stylesheet" href="<?php //echo URL ?>public/css/theme-animate.css"-->

<!-- Skin CSS -->
<link rel="stylesheet" href="<?php echo URL ?>public/css/skins/default.css">
<link rel="stylesheet" href="<?php echo URL ?>public/css/print.css" media="print">
<!-- Theme Custom CSS -->
<link rel="stylesheet" href="<?php echo URL ?>public/css/custom.css">

<!-- Head Libs -->
<script src="<?php echo URL ?>public/vendor/modernizr/modernizr.min.js"></script>

<!-- READSPEARKER -->
<script src="//f1-na.readspeaker.com/script/8023/ReadSpeaker.js?pids=embhl"></script>

<!-- Global site tag (gtag.js) - Google Analytics  -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107136310-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107136310-1');
</script>
	

<?php
if (!empty($this->tramite)) {
    ?>
    <meta name="keywords" content="<?php echo $this->tramite->tagTramites ?>" />
    <meta property="og:type" content="article"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Trámites Municipalidad Santo Domingo"/>
    <meta property="og:locale" content="es_LA"/>
    <meta property="og:url" content="<?php echo URL ?>Tramites/ver/<?php echo $this->tramite->tituloUrlTramite ?>"/>
    <meta property="og:image" content="<?php echo URL . 'public/' . $this->tramite->imagenDireccion ?>"/>
    <meta property="og:title" content="<?php echo $this->tramite->tituloTramite ?>"/>
    <meta property="og:description" content="<?php echo $this->tramite->descripcionBreveTramite ?>"/>

    <!-- tag -->
    <?php
        
    $tag = explode(',', $this->tramite->tagTramites);
    $count = count($tag);

    for ($i = 0; $i < $count; $i++) {
        echo '<meta property="article:tag" content="' . str_replace(' ', '', $tag[$i]) . '" />';
    }
}else{
    echo '<meta name="keywords" content="Trámites Municipales, Municipalidad de Santo Domingo" />';
}
