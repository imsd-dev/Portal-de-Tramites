<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);

/* Url de la aplicaciòn. Ejemplo: https://tramites.penalolen.cl/ */
define('URL', 'http://tramites.santodomingo.cl/');
define('TEMPLATE', 'public/templates/');
define('LIBS', 'libs/');

/* Path del archivo de tìtulos de la aplicaciòn (ruta absoluta) */
define('TITULOS', '/var/www/html/tramites/');
define('DOCUMENTOS', '/var/www/html/tramites/admin/public/documentos/');

//Sphinx Search
define('IP_SPHINX', '127.1.0.1');

define('DB_HOST', 'localhost');
define('DB_USER', 'santodomingo');
define('DB_PASS', 'Cabildo35'); 
define('DB_NAME', 'portal_de_tramites');

