<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        <link rel="stylesheet" href="../css/mensajes.css"/>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/Empleado.js"></script>
        <title>SISPOW - EMPLEADO</title>
    </head>
    
    <body>
        <div class="main"> 
           <header> 
                <h2>SISTEMA DE INVENTARIO</h2>
                <nav>
                    <a href="../php/Modelo/destruir.php"><img src="../src/pagar.png" alt=""></a>
                </nav>
            </header>
            
            <div class="barra">
                <nav>
                    <h3>Menú</h3>
                    <a href="../Categorias/" ><img src="../src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"  class="activa"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras" ><img src="../src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/" ><img src="../src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>
  
                </nav>
            </div>
            <main>
                <div class="ventana">
                   <form action="" method="post">
                        <div class="cerrar"><img src="../src/cerrar.png" width="30px" title="Cerrar ventana" alt=""></div>
                    
                        <h2>Nuevo empleado</h2>
                        <table border="0" cellspacing="0" cellspadding="0">
                                <tr>
                                    <td class="verde">Nombre</td>
                                    <td>
                                        <input class="campo" type="text" name="nombre" required autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="verde">Documento</td>
                                    <td>
                                        <input class="campo" type="text" name="documento" required autocomplete="off">
                        
                                    </td>
                                </tr>
                             
                                <tr>
                                    <td colspan="2">
                                        
                                        <input class="boton" type="submit" name="enviar" value="Ingresar Empleado">
                                    </td>
                                </tr>
                        </table>

                    </form>
                </div>
                <div class="targes">
                    <div class="nuevo">
                        <img src="../src/nuevo.png" width="30px" title="Añadir Empleado" alt="">
                    </div>
                    <table cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $objeto_traer = new Empleados();
                              
                              $data = $objeto_traer->consultar_empleado();
                              
                              if (is_array($data)) {
                              
                              foreach ($data as $fila){ ?>
                                  <tr>
                                <td><?php echo $fila['Nombre']; ?></td>
                                <td><?php echo $fila['Documento']; ?></td>
                                <td><?php echo $fila['Estado']; ?></td>
                                <td class="caja_btn">
                                    <a href="editar.php?numid=<?php echo $fila['Id']; ?>" class="botones editar_color">Editar</a>
                                    <a href="eliminar.php?numid=<?php echo $fila['Id']; ?>" class="botones eliminar_color">Eliminar</a>
                                </td>
                     
                              <?php } }else{echo $data; }?>
                        </tbody>
                    </table>

                </div>
            </main>
        </div>
    </body>
</html>