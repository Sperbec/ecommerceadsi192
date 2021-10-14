<?php

require_once 'Controlador/Controlador.php';
require_once 'Modelo/conexion.php';
require_once 'Modelo/GestorProveedores.php';
require_once 'Modelo/GestorTelefonoProveedor.php';
require_once 'Modelo/Proveedores.php';
require_once 'Modelo/TelefonoProveedor.php';

$controlador = new Controlador();
if (isset($_GET["proveedores"])) {
    if ($_GET["proveedores"] == "inicio") {
        $controlador->verPagina("Vista/Html/proveedores.php");
    }
    if ($_GET["proveedores"] == "ingresarProveedor") {
        $Ndo = $_POST["ProNdo"];
        $num = $_POST["TelProNum"];
        $controlador->ingresarProveedor($Ndo, $_POST["ProNit"], $_POST["ProNom"], $_POST["CiuCod"], $_POST["ProDir"], $_POST["ProEma"]);
        foreach ($num as $c) {
            $controlador->ingresarTelefono($Ndo, $c);
        }
        $controlador->verPagina("Vista/Html/proveedores.php");
    }

    if ($_GET["proveedores"] == "editarProveedor" && (isset($_GET["id"]))) {
        $controlador->editarProveedorPorId($_GET["id"]);
    }
    if ($_GET["proveedores"] == "editarProveedores1") {
        $controlador->editarProveedor($_POST["ProNdo"], $_POST["ProNom"], $_POST["CiuCod"], $_POST["ProDir"], $_POST["ProEma"]);
    }
    if ($_GET["proveedores"] == "eliminarProveedor" && (isset($_GET["id"]))) {
        $controlador->eliminarProveedor($_GET["id"]);
    }
    if ($_GET["proveedores"] == "basura") {
        $controlador->verPagina("Vista/Html/basuraProveedor.php");
    }
    if ($_GET["proveedores"] == "activarProveedor" && (isset($_GET["id"]))) {
        $controlador->activarProveedor($_GET["id"]);
    }
    if ($_GET["proveedores"] == "telefono" && (isset($_GET["id"]))) {
        $controlador->mostrarTelefono($_GET["id"]);
    }
    if($_GET["proveedores"] =="ingresarTelefono1" && (isset($_GET["id"]))){
        
        $Ndo =$_GET["id"];
        $num = $_POST["TelProNum"];
        foreach ($num as $c) {
            $controlador->ingresarTelefono($Ndo, $c);
        }
        $controlador->mostrarTelefono($Ndo);
    }
    
    if($_GET["proveedores"] =="telefonoEliminar" && (isset($_GET["TelProNum"])) && (isset($_GET["id"]))){
        $controlador->eliminarTelefono($_GET["TelProNum"]);
        $controlador->mostrarTelefono($_GET["id"]);
    }
    
} else {
    $controlador->verPagina("Vista/Html/proveedores.php");
}
