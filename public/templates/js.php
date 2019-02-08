<!-- Vendor -->
<script src="<?php echo URL ?>public/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL ?>public/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?php echo URL ?>public/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo URL ?>public/vendor/jquery-cookie/jquery-cookie.min.js"></script>
<script src="<?php echo URL ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL ?>public/vendor/common/common.min.js"></script>
<script src="<?php echo URL ?>public/vendor/jquery.validation/jquery.validation.min.js"></script>

<script src="<?php echo URL ?>public/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="<?php echo URL ?>public/admin/assets/javascripts/theme.admin.extension.js"></script>

<script src="<?php echo URL ?>public/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="<?php echo URL ?>public/js/custom.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo URL ?>public/js/theme.js"></script>
<?php 
if(!empty($this->tramite)){ ?>
	<script src="<?php echo URL ?>public/js/qrcode/qrcode.js"></script>
	<script>
	var qrcode = new QRCode(document.getElementById("qrcode"), {
		width: 132,
		height: 132
	});

	function makeCode() {
		var elText = document.getElementById("text");

		if (!elText.value) {
			alert("Input a text");
			elText.focus();
			return;
		}

		qrcode.makeCode(elText.value);
	}

	makeCode();

	$("#text").
			on("blur", function () {
				makeCode();
			}).
			on("keydown", function (e) {
				if (e.keyCode == 13) {
					makeCode();
				}
	});
	
	
		   
	</script>
<?php } ?>


<!-- Theme Custom -->
<script src="<?php echo URL ?>public/js/custom.js"></script>
<script src="<?php echo URL ?>public/js/typeahead.bundle.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo URL ?>public/js/theme.init.js"></script>
<script src="<?php echo URL ?>public/js/valida.js"></script>
<script src="<?php echo URL ?>public/js/form-register.js"></script>


<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=142135979212695";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<?php 
//$direcciones = "'Secretaria Municipal','Gerencia de Personas','Gerencia de Comunidad y Familia','Juzgado de Policía Local','Gerencia de Vivienda','Direccion de Seguridad Ciudadana','Direccion de Transito y Transporte Público','Direccion de Operaciones','Direccion de Obras Municipales','Dirección de Asesoria Juridica','Gerencia de Desarrollo Economico Y Productivo','Direccion de Desarrollo Comunitario (Dideco)','Direccion de Administracion y Finanzas','Direccion de Control','Centro Civico Cultural San Luis','Comunicaciones','Administrador Municipal'";

//$unidades = "'Desarrollo Empresarial','Transparencia e Informacion Pública','Unidad de Jovenes','Contro de Gestion','Quiero mi Barrio','Pueblos Originarios','Kintun','Departamento de Vehiculos','Centro De Atencion De La Familia','Unidad De Inclusion Y No Discriminacion','Unidad De Bibliotecas','Adulto Mayor','Gestión Comunitaria','Forma de Pago','Departamento De Permisos De Circulación','Departamento De Licencias De Conducir','Unidad Técnica','Departamento De Zoonosis E Higiene Ambiental','Departamento De Inspeccion','Departamento De Emergencia','Departamento De Ornato','Departamento De Aseo','Permisos de Edificacion y Urbanizacion','Oficina Convenio Municipal Con El Servicio De Impuestos Internos','Unidad De Atencion De Publico','Departamento De Infraestructura','Departamento De Inspeccion De Obras','Departamento De Urbanizacion','Departamento De Edificación','Centro de Emprendimiento','Departamento De Capacitacion Y Otec Municipal','Oficina Municipal De Intermediacion Laboral','Desarrollo Social','Unidad De Discapacidad','Programa Becas','Estratificación Social','Emergencia Social','Atención Social','Aparcadero Municipal','Departamento De Tesorería','Departamento Contabilidad Antecedentes de Pago','Departamento De Rentas Y Finanzas','Relaciones Publicas'";

//$sucursales = "'Edificio Yunus','Polideportivo Sergio Livingstone','Kintun','Centro de Atención a la Familia','Piscina Municipal','Centro de Atencion al Vecino','Centro Cultural y deportivo Chimkowe','Edificio Municipal Orientales','Centro Civico y Cultural San Luis','Edificio Consistorial'";
?>

<script type="text/javascript">
    $(document).on('ready', function () {
		
			boton01.style.display = 'inline';
                boton02.style.display = 'none';


        var substringMatcher = function (strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function (i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        var tramites = [<?php include TITULOS . 'titulos.php'; ?>, <?php echo $direcciones .",". $unidades .",". $sucursales ?>];

        $('.input-search .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'tramites',
            source: substringMatcher(tramites)
        });
		
	//cambio color
 
                
                $("#boton01").click(function () {
                    $("#html").addClass("dark");
                    boton01.style.display = 'none';
                    boton02.style.display = 'inline';
                });
                $("#boton02").click(function () {
                    $("#html").removeClass("dark");
                    boton01.style.display = 'inline';
                    boton02.style.display = 'none';
                });
				
				
				
				var fontSize = 1.4;

	// funcion para aumentar la fuente
	
	
	                $("#zoomIn").click(function (){
						fontSize += 0.1;
						document.body.style.fontSize = fontSize + "em";
	                });

	// funcion para disminuir la fuente
			  $("#zoomOut").click(function (){
			
				fontSize -= 0.1;
				document.body.style.fontSize = fontSize + "em";
				});
	
	// funcion para disminuir la fuente
				$("#reset").click(function (){
	
				document.body.style.fontSize = "1.4em";
				});

    })
 
</script>

<script type="text/javascript">
    $('a[rel="external"]').attr('target', '_blank');
		   
</script>

<script type="text/javascript">
	var fontSize = 1.4;

	// funcion para aumentar la fuente
	function zoomIn() {
		fontSize += 0.1;
		document.body.style.fontSize = fontSize + "em";
	}

	// funcion para disminuir la fuente
	function zoomOut() {
		fontSize -= 0.1;
		document.body.style.fontSize = fontSize + "em";
	}
	
	// funcion para disminuir la fuente
	function reset() {
		document.body.style.fontSize = "1.4em";
	}
	
	
	/* 
	function boton02() {
		$("#html").removeClass("dark");
                    boton01.style.display = 'inline';
                    boton02.style.display = 'none';
	}
	
	function boton01() {
		$("#html").addClass("dark");
                    boton01.style.display = 'none';
                    boton02.style.display = 'inline';
	}
	
	*/

</script>

 