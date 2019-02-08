<?php
require './models/TramitesModel.php';
require './models/CategoriasModel.php';

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        
        $tm = new TramitesModel();
        $cm = new CategoriasModel();
        
        //Listar Trámites destacados, nuevos y frecuentes.
        $this->view->tramites_dest = $tm->listarDestacados(5);
        $this->view->tramites_nvos = $tm->listarNuevos();
        $this->view->tramites_frec = $tm->listarFrecuentes(5);
        
        //Listar Tramites por categoria
        $this->view->tramites_pagos = $tm->listarPorCategoria(1);
        $this->view->tramites_certificados = $tm->listarPorCategoria(3);
        $this->view->tramites_becas = $tm->listarPorCategoria(2);
        
        $this->view->categorias = $cm->trae();
        
        $this->view->render($this, 'index');
    }

    function killItWithfire() {
        Session::destroy();
    }

}
