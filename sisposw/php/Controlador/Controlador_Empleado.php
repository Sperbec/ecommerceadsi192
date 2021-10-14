<?php



require("../php/Modelo/Empleados.php");
try {

if (isset($_POST['enviar'])) {
    
   
   
    $obj_empleado = new Empleados();
    
    $clave = substr($_POST['documento'],0,5);
    
    $empleado = array($_POST['nombre'], $_POST['documento'],$clave);
    echo $obj_empleado->ingresar_Empleado($empleado);
    
    
    
}else{
    throw new Exception("Error de variables");
}    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

require ("../php/Vista/Empleado/Empleados.php");

?>
