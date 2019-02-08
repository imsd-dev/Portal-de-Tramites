<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);

/* Url de la aplicaciòn. Ejemplo: https://tramites.santodomingo.cl/ */
define('URL', 'http://tramites.santodomingo.cl/admin/');
define('TEMPLATE', 'public/templates/');
define('LIBS', 'libs/');

/* Path del archivo de tìtulos de la aplicaciòn (ruta absoluta) */
define('TITULOS', '/var/www/html/tramites/');
define('TITULOS_FIS', '/var/www/html/tramites/titulos.php');

define('DB_HOST', 'localhost');
define('DB_USER', 'santodomingo');
define('DB_PASS', 'Cabildo35'); 
define('DB_NAME', 'portal_de_tramites');


