<?php


require("../php/Modelo/Empleados.php");
try {

if (!isset($_GET['numid'])) {
    throw new Exception("Error de variables");
}    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

require("../php/Vista/Empleado/editar.php");



?>
