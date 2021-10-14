<?php 
require "funciones.php";
$obj= new Funciones();

$m = $obj->eliminarProducto($_POST['ArtCod'],$_POST['ArtCant'],session_id());

echo $m;

 ?>