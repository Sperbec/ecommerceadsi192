<?php

class Controlador {

    public function verPagina($ruta) {
        require_once $ruta;
    }

    public function ingresarProveedor($ProNdo, $ProNit, $ProNom, $CiuCod, $ProDir, $ProEma) {
        $Proveedores = new Proveedores($ProNdo, $ProNit, $ProNom, $CiuCod, $ProDir, $ProEma);
        $GestorProveedores = new GestorProveedores();
        $id = $GestorProveedores->ingresarProveedores($Proveedores);
        $result = $GestorProveedores->consultarProveedorPorNdo($id);
    }

    public function ingresarTelefono($ProNdo, $TelProNum) {
        $TelefonoProveedor = new TelefonoProveedor($ProNdo, $TelProNum);
        $GestorTelefonoProveedor = new GestorTelefonoProveedor();
        $id = $GestorTelefonoProveedor->ingresarTelefonoProveedor($TelefonoProveedor);
        $resultTelefono = $GestorTelefonoProveedor->consultarProveedorPorNdo($id);
    }

    public function editarProveedorPorId($id) {
        $GestorProveedores = new GestorProveedores();
        $result = $GestorProveedores->consultarProveedorPorNdo($id);
        require_once 'Vista/Html/editarProveedores.php';
    }

    public function editarProveedor($ProNdo, $ProNom, $CiuCod, $ProDir, $ProEma) {
        $GestorProveedores = new GestorProveedores();
        $GestorProveedores->editarProveedor($ProNdo, $ProNom, $CiuCod, $ProDir, $ProEma);
        
        require_once 'Vista/Html/Proveedores.php';
    }
    public function eliminarProveedor($id){
        $GestorProveedores = new GestorProveedores();
        $GestorProveedores->eliminarProveedor($id);
       
        require_once 'Vista/Html/Proveedores.php';
    }
    public function activarProveedor($id){
        $GestorProveedor = new GestorProveedores();
        $GestorProveedor->activarProveedor($id);
        require_once 'Vista/Html/basuraProveedor.php';
    }
    
    public function mostrarTelefono($id) {
        $GestorTelefonoProveedor = new GestorTelefonoProveedor();
        $result = $GestorTelefonoProveedor->consultarProveedorPorNdo($id);
        require_once 'Vista/Html/mostrarTelefono.php';
    }
    public function eliminarTelefono($TelProNum){
        $GestorTelefonoProveedor = new GestorTelefonoProveedor();
        $GestorTelefonoProveedor->eliminarTelefono($TelProNum);
    }

}
