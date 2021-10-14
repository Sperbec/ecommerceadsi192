<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if (isset($_SESSION['sesion'])) {
    
    $sesion = $_SESSION['sesion'];
    require '../php/Controlador/Comprobar_Sesion.php';

    $objeto = new Comprobar_Sesion();

    $objeto->get_sesion($sesion);
}else{
    header("Location: ../");
}



?>
