<?php 
require "funciones.php";
$obj= new Funciones();

$m = $obj->actualizarCarrito($_POST['ArtCant'],$_POST['ArtCod'], session_id());

echo $m;

 ?>