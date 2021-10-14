<?php 
require "funciones.php";
$obj= new Funciones();

$m = $obj->agregar($_POST['ArtCant'],$_POST['ArtCod'], session_id());


echo $m;

 ?>