<?php
require './models/TramitesModel.php';
/*
 * Creado por Ruth Escobar A. @2015
 * Municipalidad de Peñalolén
 */

/**
 * Description of Unidades
 *
 * @author Ruth Escobar A.
 */
class Unidades extends Controller {

    function __construct() {
		parent::__construct();
		$this->view->title = 'unidades';
    }
    
    function index() {
        $this->view->render_404();
    }
    
    function ver($nombreUnidad){
        
        if($nombreUnidad == null){
            header('location: ' . URL . 'Paginas/ver/404');
        }else{
            
            $unidad = $this->model->trae($nombreUnidad);
            
            if(empty($unidad)){
                header('location: ' . URL . 'Paginas/ver/404');
            }else{
                $this->view->sucursales = $this->model->traeSucursalesPorUnidad($unidad->unidadID);
                $this->view->unidad = $unidad;
                
                $tm = new TramitesModel();
                $this->view->tramites = $tm->listarPorUnidad($unidad->unidadID);
            }
        }
        
        $this->view->render($this, 'ver');
    }
}
