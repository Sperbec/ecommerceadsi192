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
        require_once 'Modelo/GestorProducto.php';
        require_once 'Modelo/Producto.php';
        $controlador = new Controlador();


        if (isset($_GET["accion"])) {
            if ($_GET["accion"] == "productos") {
                $controlador->verPagina("Vista/Html/productos.php");
            }
            /*  PRODUCTO  */
            if ($_GET["accion"] == "ingresarProducto") {
                $name = $_FILES['img']['name'];
                $ruta = $_FILES['img']['tmp_name'];
                echo $name;
                $controlador->ingresarProducto($name, $ruta,$_POST["ArtCant"], $_POST["ArtPre"], $_POST["ArtDes"], $_POST["ProNdo"], $_POST["SLproId"]);
            }
            if ($_GET["accion"] == "editarProducto" && (isset($_GET["id"]))) {
                $controlador->editarProductoPorId($_GET["id"]);
            }
            if ($_GET["accion"] == "editarProducto1") {
                $controlador->editarProducto($_POST["ArtCod"], $_POST["ArtCant"], $_POST["ArtPre"], $_POST["ArtDes"], $_POST["ProNdo"], $_POST["SLproId"]);
            }
            
            
            
            if ($_GET["accion"] == "ingresarCantidad" && (isset($_GET["id"])) && (isset($_GET["old"]))) {
                $new= $_POST["ArtCant"]+$_GET["old"];
                /*echo $new. "  codigo ".$_GET["id"];
                                $controlador->verPagina("Vista/Html/prueba.php");*/

                
               $controlador->ingresarCantidad1($_GET["id"], $new);
                
                
            }
            
            if($_GET["accion"]=="destruir"){
                header("Location: ../php/Modelo/destruir.php");
            }
            
            
            } else {

            $controlador->verPagina("Vista/Html/productos.php");
        }
        ?>
    </body>
</html>
