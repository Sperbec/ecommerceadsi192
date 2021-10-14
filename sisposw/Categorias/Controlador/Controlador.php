<?php

/*
Controlador.php
 */
class Controlador {
    public function verPagina($ruta){
        require_once $ruta;
    }
    
    
    public function ingresarLineaProducto($LprDes){
        $LineaProducto = new LineaProducto($LprDes);
        $GestorLineaProducto=new GestorLineaProducto();
        $id = $GestorLineaProducto->ingresarLineaProducto($LineaProducto);
        $result = $GestorLineaProducto->consultarLineaProductoPorId($id);
        $controlador = new Controlador();
        $controlador->mostrarLineaProducto();
    }
    public function mostrarLineaProducto(){
        $GestionLineaProducto = new GestorLineaProducto();
        $result = $GestionLineaProducto->mostrarLineaProducto();
        require_once 'Vista/Html/mostrarLineaProducto.php';
    }
    public function editarLineaProductoPorId($id){
        $GestorLineaProducto= new GestorLineaProducto();
        $result = $GestorLineaProducto->consultarLineaProductoPorId($id);
        require_once 'Vista/Html/editarLineaProducto.php';
    }
    public function editarLineaProducto($LprID, $LprDes){
        $GestorLineaProducto = new GestorLineaProducto();
        $GestorLineaProducto->editarLineaProducto($LprID, $LprDes);
        $Controlador = new Controlador();
        $Controlador->mostrarLineaProducto();
    }
    public function eliminarLineaProducto($id){
        $GestorLineaProducto = new GestorLineaProducto();
        $GestorLineaProducto->eliminarLineaProducto($id);
        $Controlador = new Controlador();
        $Controlador->mostrarLineaProducto();
    }
    /* SUB LINEA PRODUCTO*/
    public function ingresarSubLineaProducto($SlproDes, $LprID){
        $SubLineaProducto=new SubLineaProducto($SlproDes, $LprID);
        $GestorSubLineaProducto= new GestorSubLineaProducto();
        $id = $GestorSubLineaProducto->ingresarSubLineaProducto($SubLineaProducto);
        $result = $GestorSubLineaProducto->consultarSubLineaProductoPorId($id);
        $controlador = new Controlador();
        $controlador->mostrarSubLineaProducto();
    }
    
    public function mostrarSubLineaProducto(){
        $GestorSubLineaProducto = new GestorSubLineaProducto();
        $result = $GestorSubLineaProducto->mostrarSubLineaProducto();
        require_once 'Vista/Html/mostrarSubLineaProducto.php';
    }
    public function editarSubLineaProductoPorId($id){
        $GestorSubLineaProducto= new GestorSubLineaProducto();
        $result = $GestorSubLineaProducto->consultarSubLineaProductoPorId($id);
        require_once 'Vista/Html/editarSubLineaProducto.php';
    }
    public function editarSubLineaProducto($SLproId, $SlproDes, $LprID){
        $GestorSubLineaProducto = new GestorSubLineaProducto();
        $GestorSubLineaProducto->editarSubLineaProducto($SLproId, $SlproDes, $LprID);
        $Controlador = new Controlador();
        $Controlador->mostrarSubLineaProducto();
    }
    public function eliminarSubLineaProducto($id){
        $GestorSubLineaProducto = new GestorSubLineaProducto();
        $GestorSubLineaProducto->eliminarSubLineaProducto($id);
        $Controlador = new Controlador();
        $Controlador->mostrarSubLineaProducto();
    }
        
}
