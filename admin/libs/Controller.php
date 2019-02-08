<?php

class Controller {

    function __construct() {
        Session::init();
        $this->view = new View();
        $this->loadModel();
    }

    /**
     * Carga el Modelo por defecto de su controlador.
     */
    function loadModel() {

        $model = get_class($this) . 'Model';
        $path = 'models/' . $model . '.php';

        if (file_exists($path)) {
            require $path;
            $this->model = new $model();
        }
    }

    /**
     * Carga un Modelo distinto de su controlador para
     * poder usar sus métodos.
     * 
     * @param String $model Nombre del Modelo a cargar.
     * @return Object Modelo a cargar
     */
    function loadModelExt($model) {

        $path = 'models/' . $model . '.php';

        if (file_exists($path)) {
            require $path;
            $this->model = new $model();

            return $this->model;
        }
    }

    /**
     * Comprueba si las variables contenidas 
     * en el array son nulas.
     * 
     * @param Array<String> $array Objeto contenedor de variables
     * @return boolean $isNull true / false
     */
    function field_required($array) {

        $isNull = false;

        foreach ($array as $value) {
            if (!isset($value)) {
                $isNull = true;
                break;
            }
        }

        return $isNull;
    }

    /**
     * Comprueba que al menos haya una variable no nula.
     * 
     * @param Array<String> $array
     * @return boolean $isNull true / false
     */
    function allFieldNotNull($array) {

        $isNull = true;

        foreach ($array as $value) {
            if ($value != null) {
                $isNull = false;
            }
        }

        return $isNull;
    }

    /**
     * Transforma un String fecha a formato MySQL yyyy-mm-dd
     * 
     * @param String $fechadb String con fecha a formatear.
     * @return String $fecha Fecha formateada

      function dateFormat_mysql($fechadb) {

      if ($fechadb != null) {

      list($dd, $mm, $yy) = explode("/", $fechadb);
      $fecha = new DateTime();
      $fecha->setDate($yy, $mm, $dd);

      return $fecha->format('Y-m-d');
      } else {
      return '';
      }
      }
     */
    function dateFormat_mysql($fechadb) {

        if ($fechadb != null) {
            $date = DateTime::createFromFormat('d/m/Y', $fechadb);
            return $date->format('Y-m-d');
        } else {
            return '';
        }
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function setVarGlobal() {

        $model = 'GlobalModel';
        $path = 'models/' . $model . '.php';

        if (file_exists($path)) {
            require $path;
            $this->global = new $model();
        }

        $this->view->tramites_linea = $this->global->traeTramitesLinea();
        $this->view->votaciones = $this->global->listarMasVotados();
        $this->global = null;
    }

    /**
     * Función para convertir un string en una url amigable para fines de SEO
     * @param String $string texto o frase a sanear 
     * @return String texto saneado
     */
    function seo_url($string) {
        $string = str_replace('°', '', $string);
        $string = str_replace('¿', '', $string);
        $string = str_replace('¡', '', $string);

        $string = utf8_decode($string);
        $string = str_replace(' ', '-', $string);
        $string = str_replace('?', '', $string);
        $string = str_replace('+', '', $string);
        $string = str_replace(':', '', $string);
        $string = str_replace('??', '', $string);
        $string = str_replace('`', '', $string);
        $string = str_replace('!', '', $string);
        $string = str_replace(',', '', $string);
        $string = str_replace('.', '', $string);
        $string = str_replace('”', '', $string);
        $string = str_replace('/', '-', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $originales = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??°';
        $modificadas = 'abcdefghijklmnnopqrstuvwxyzaaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $url = strtr($string, utf8_decode($originales), $modificadas);

        return $url;
    }

}
