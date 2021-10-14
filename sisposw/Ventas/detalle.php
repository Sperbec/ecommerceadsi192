<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if (isset($_SESSION['sesion'])) {
    
    $sesion = $_SESSION['sesion'];
   
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
                     <form action="ingresar.php" method="POST">
                        
                         <input type="text" name="cod"><br>
                       <input type="text" name="nombre"><br>
                       <input type="text" name="cantidad"><br>
                      <input type="text" name="precio" ><br>
                       <input type="text" name="fecha" ><br>
                       <input type="submit" name="datos" value="Ingresar">
                     </form>
                    
                    <table width="100%" border="1">
                        <tr>
                            <td>Cod</td>
                            <td>Producto</td>
                            <td>Cantidad</td>
                            <td>Precio</td>
                            <td>Fecha</td>
                            <td>Opciones</td>
                        </tr>
                        
                        <?php
                        
                           $conexion = mysqli_connect("localhost", "root", "", "sisposw");
                           
                           $sql = "SELECT * FROM productos";
                           $r = mysqli_query($conexion, $sql);
                           
                           while ($fila = mysqli_fetch_assoc($r)){ ?>
                        
                        <tr>
                            <td><?php echo $fila['cod']; ?></td>
                            <td><?php echo $fila['prod']; ?></td>
                            <td><?php echo $fila['cantidad']; ?></td>
                             <td><?php echo $fila['precio']; ?></td>
                            <td><?php echo $fila['fecha']; ?></td>
                            <td>
                                <a href="editar.php?cod=<?php echo $fila['cod']; ?>">Editar</a>
                                <a href="eliminar.php?cod=<?php echo $fila['cod']; ?>">Eliminar</a>
                            </td>
                        </tr>
                        
                           <?php } ?>
                        
                    </table>
                </div>
            </main>
        </div>
    </body>
</html>