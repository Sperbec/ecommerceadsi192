<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if (isset($_POST['datos'])) {
    
    
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    $cod = $_POST['cod'];
    
    $conexion = mysqli_connect("localhost", "root", "", "sisposw");
    
    $sql = "INSERT INTO productos VALUES('$cod', '$nombre', '$cantidad', '$precio', '$fecha')";
    $r = mysqli_query($conexion, $sql);
    
    if ($r) {
        header("Location: detalle.php");
    }else{
        echo "error";
    }
    
   
}else{
    header("Location: ../");
}



?>

