<?php

class View {

    /**
     * Función que carga una página en particular.
     * 
     * @param String $page Nombre de la página individual a cargar
     */
    function load_page($page) {
        require './views/pages/' . $page . '.php';
    }

    /**
     * Función que carga el contenido de un Modal.
     * 
     * @param String $controller Controlador a llamar
     * @param String $modal Página que se levantará dentro de una Pantalla Modal
     */
    function loadModal($controller, $modal) {
        $controller_nom = get_class($controller);
        require './views/' . $controller_nom . '/' . $modal . '.php';
    }

    /**
     * Funcion que deriva a la vista y controlador indicado.
     * 
     * @param type $controller Controlador requerido
     * @param type $view Vista requerida
     */
    function render($controller, $view) {

        $controller_nom = get_class($controller);

        require './public/templates/html1.php';
        require './views/' . $controller_nom . '/' . $view . '.php';
        require './public/templates/html2.php';
    }

    function render_404() {
        header('location: ' . URL . 'Paginas/ver/404');
    }

    /**
     * Funcion que deriva a la vista y controlador indicado, sin usar la funcion
     * "class", lo que permite mayor dinamismo con el controlador que se requiere.
     * 
     * @param type $controller Controlador requerido
     * @param type $view Vista requerida
     */
    function render_global($controller, $view) {
        require './public/templates/html1.php';
        require './views/' . $controller . '/' . $view . '.php';
        require './public/templates/html2.php';
    }

    function acortar_texto($cadena, $cant_caracteres) {

        if (strlen($cadena) < $cant_caracteres) {
            $string = $cadena;
        } else {
            $string = substr($cadena, 0, $cant_caracteres) . "...";
        }
        return $string;
    }

    /**
     * Transforma un String fecha de formato MySQL a formato dd/mm/yyy
     * 
     * @param String $fechadb String con fecha a formatear.
     * @return String $fecha Fecha formateada
     */
    function dateFormat_view($fechadb) {

        if ($fechadb != null) {
            $fecha = date("d/m/Y", strtotime(date($fechadb)));
            return $fecha;
        } else {
            return '';
        }
    }

}
