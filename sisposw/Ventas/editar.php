<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if (isset($_SESSION['sesion']) && isset($_GET['cod'])) {
    
    $sesion = $_SESSION['sesion'];
    
    $cod = $_GET['cod'];
   
}else{
    header("Location: ../");
}



?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registro de usuario, sispow">
        <link rel="icon" href="../src/logo.png"/>
        <link rel="stylesheet" href="../css/gestion.css"/>
        <title>SISPOW - INICIO</title>
    </head>
    
    <body>
        <div class="main"> 
           <header> 
                <h2>SISTEMA DE INVENTARIO</h2>
                <nav>
                    <a href="../php/Modelo/destruir.php">Cerrar sesión</a>
                </nav>
            </header>
            
            <div class="barra">
                <nav>
                    <h3>Menú</h3>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Productos</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Ventas</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Clientes</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href=""><img src="../src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>
                    
                   
                </nav>
            </div>
            <main>
                <div class="targes">
                    <h3>Contenido del target de compras </h3>
                    <table width="800px" border="0">
                        <form action="cambiar.php" method="POST">
                        
                        <?php
                        
                        
                           $conexion = mysqli_connect("localhost", "root", "", "sisposw");
                           
                           $sql = "SELECT * FROM productos WHERE cod = '$cod'";
                           $r = mysqli_query($conexion, $sql);
                           
                           $fila = mysqli_fetch_assoc($r); ?>
                         <input type="hidden" name="cod" value="<?php echo $fila['cod']; ?>">
                      
                        <tr>
                         
                            <td>Producto</td>
                            <td><input type="text" name="nombre" value="<?php echo $fila['prod']; ?>"></td>
                       <td>Cantidad</td>
                            <td><input type="text" name="cantidad" value="<?php echo $fila['cantidad']; ?>"></td>
                        </tr>
                        <tr>
                             <td>Precio</td>
                            <td><input type="text" name="precio" value="<?php echo $fila['precio']; ?>"></td>
                       
                            <td>Fecha</td>
                            <td><input type="text" name="fecha" value="<?php echo $fila['fecha']; ?>"></td>
                            
                        </tr>
                        <tr>
                           <td>Acción</td>
                           <td><input type="submit" name="datos" value="Editar"></td>
                            
                        </tr>
                        </form>
                    </table>
                </div>
            </main>
        </div>
    </body>
</html>