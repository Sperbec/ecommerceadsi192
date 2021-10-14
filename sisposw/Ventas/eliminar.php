<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if (isset($_GET['cod'])) {
    
    $cod  = $_GET['cod'];
   
     $conexion = mysqli_connect("localhost", "root", "", "sisposw");
    
    $sql = "DELETE FROM productos WHERE cod = '$cod'";
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
