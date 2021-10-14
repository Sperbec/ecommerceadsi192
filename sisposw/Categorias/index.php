<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        require_once 'Controlador/Controlador.php';
        require_once 'Modelo/Conexion.php';
        require_once 'Modelo/GestorLineaProducto.php';

        require_once 'Modelo/GestorSubLineaProducto.php';
        require_once 'Modelo/LineaProducto.php';

        require_once 'Modelo/SubLineaProducto.php';
        $controlador = new Controlador();


        if (isset($_GET["accion"])) {
            
            if ($_GET["accion"] == "ingresarLineaProducto") {
                $controlador->ingresarLineaProducto($_POST["LprDes"]);
            }
            if ($_GET["accion"] == "mostrarLineaProducto") {
                $controlador->mostrarLineaProducto();
            }
            if ($_GET["accion"] == "editarLineaProducto" && (isset($_GET["id"]))) {
                $controlador->editarLineaProductoPorId($_GET["id"]);
            } else
            if ($_GET["accion"] == "editarLineaProducto1") {
                $controlador->editarLineaProducto($_POST["LprID"], $_POST["LprDes"]);
            }
            if ($_GET["accion"] == "eliminarLineaProducto" && (isset($_GET["id"]))) {
                $controlador->eliminarLineaProducto($_GET["id"]);
            }

            /* SUB LINEA DE PRODUCTO */
            if ($_GET["accion"] == "ingresarSubLineaProducto") {
                $controlador->ingresarSubLineaProducto($_POST["SlproDes"], $_POST["LprID"]);
            }
            if ($_GET["accion"] == "mostrarSubLineaProducto") {
                $controlador->mostrarSubLineaProducto();
            }
            if ($_GET["accion"] == "editarSubLineaProducto" && (isset($_GET["id"]))) {
                $controlador->editarSubLineaProductoPorId($_GET["id"]);
            }
            if ($_GET["accion"] == "editarSubLineaProducto1") {
                $controlador->editarSubLineaProducto($_POST["SLproId"], $_POST["SlproDes"], $_POST["LprID"]);
            }
            if ($_GET["accion"] == "eliminarSubLineaProducto" && (isset($_GET["id"]))) {
                $controlador->eliminarSubLineaProducto($_GET["id"]);
            }
            /*  PRODUCTO  */


            if ($_GET["accion"] == "destruir") {
                header("Location: ../php/Modelo/destruir.php");
            }
            if ($_GET["accion"] == "Empleados") {
                
            }
            if ($_GET["accion"] == "salir") {
                
            }
        } else {

            $controlador->mostrarLineaProducto();
        }
        ?>
    </body>
</html>
