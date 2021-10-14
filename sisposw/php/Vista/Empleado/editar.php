<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 if (isset($_POST['editar'])) {
        $obj_empleado = new Empleados();
        $id = $_GET['numid'];
        $nombre = $_POST['nombre'];
        $documento = $_POST['documento'];
        
        
        $empleado = array($nombre, $documento);
    
     $msg = $obj_empleado->editar_empleado($id,$empleado);
    
     if ($msg == true) {
         header("Location: ../Empleado/");
     }
     
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
        <link rel="stylesheet" href="../css/mensajes.css"/>
        <title>SISPOW - EMPLEADO</title>
    </head>
    
    <body>
        <div class="main"> 
           <header> 
                <h2>SISTEMA DE INVENTARIOS</h2>
                <nav>
                    <a href="../php/Modelo/destruir.php">Cerrar sesión</a>
                </nav>
            </header>
            
            <div class="barra">
                <nav>
                    <h3>Menú</h3>
                    <a href="../Categorias/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/"><img src="../src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>
                    
                </nav>
            </div>
            <main>
                
                <div class="targes">
                    <form action="" method="post">
                    <table cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php
                              $objeto_traer = new Empleados();
                              
                              $id = $_GET['numid'];
                              
                              $data = $objeto_traer->datos_empleado("SELECT * FROM registro WHERE Id = '$id'");
                              
                               ?>
                                  <tr>
                                      <td><input type="text" name="nombre" value="<?php echo $data['Nombre']; ?>"></td>
                                <td><input type="text" name="documento" value="<?php echo $data['Documento']; ?>"></td>
                                 <td>
                                    <input type="submit" name="editar" value="Editar">
                                </td>
                    
                        </tbody>
                    </table>
 </form>
                </div>
            </main>
        </div>
    </body>
</html>