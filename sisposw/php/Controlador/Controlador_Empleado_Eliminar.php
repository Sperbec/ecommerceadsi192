<?php




require("../php/Modelo/Empleados.php");
try {

if (!isset($_GET['numid'])) {
    throw new Exception("Error de variables");



}    

} catch (Exception $ex) {
    echo $ex->getMessage();
}

 $id = $_GET['numid'];

     $obj_empleado = new Empleados();

     $saber = $obj_empleado->eliminar($id);


require ("../php/Vista/Empleado/eliminar.php");

?>




























