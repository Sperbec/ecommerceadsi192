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
        <link rel="icon" href="Vista/src/logo.png"/>
        <link rel="stylesheet" href="Vista/css/gestion.css"/>
        <link rel="stylesheet" href="Vista/Css/proveedores.css">
        <script type="text/javascript" src="Vista/Js/jquery.js"></script>
        <script type="text/javascript" src="Vista/Js/proveedores.js"></script>
        <script type="text/javascript" src="Vista/Js/telefono.js"></script> 

        <title>SISPOW - INICIO</title>
    </head>

    <body>
        <div class="main"> 
            <header> 
                <h2>SISTEMA DE INVENTARIO</h2>
                <nav>
                    <a href="../php/Modelo/destruir.php"><img src="Vista/src/pagar.png" alt=""></a>
                </nav>
            </header>

            <div class="barra">
                <nav>
                    <h3>Menú</h3>
                    <a href="../Categorias/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/" class="activa"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>


                </nav>
            </div>
            <main>
                

                <!--
                Contenido
                -->
                <div class="targes">
                    <table>
                        <tr>
                            <td><h3>Proveedores: &nbsp; &nbsp;</h3></td>
                            <td><a href="index.php?proveedores=inicio">
                                    <img src="Vista/src/basura.png" width="30px" title="Activados" alt="">
                                </a></td>
                        </tr>
                    </table>

                    <table cellspacing="0" cellpadding="0" class="tablaPrincipal">
                        <thead>
                            <tr>

                                <th>Numero Documento</th>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Correo</th>
                                <th colspan="2" style="width: 250px;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $Conexion = new Conexion();
                            $Conexion->abrir();
                            $sql = "SELECT * FROM proveedores";
                            $Conexion->consulta($sql);
                            $Proveedores1 = $Conexion->obtenerResult();
                            $Conexion->cerrar();


                            if ($Proveedores1->num_rows > 0) {

                                while ($filaProveedores = $Proveedores1->fetch_object()) {
                                    if ($filaProveedores->Estado == "Inactivo") {
                                        ?>
                                        <tr>

                                            <td><?php echo $filaProveedores->ProNdo; ?></td>
                                            <td><?php echo $filaProveedores->ProNom; ?></td>
                                            
                                            <td>

                                                <?php echo $filaProveedores->CiuCod . "-"; ?>

                                                <?php
                                                $conexion = new Conexion();
                                                $conexion->abrir();
                                                $sqlCiudad = "SELECT CiuNom FROM `ciudad` WHERE CiuCod = $filaProveedores->CiuCod";
                                                $conexion->consulta($sqlCiudad);
                                                $resultCiudad = $conexion->obtenerResult();
                                                $conexion->cerrar();
                                                while ($filaCiudad = $resultCiudad->fetch_object()) {
                                                    echo $filaCiudad->CiuNom;
                                                }
                                                ?>

                                            </td>
                                            <td><?php echo $filaProveedores->ProEma; ?></td>

                                            <td class="caja_btn" colspan="2">
                                                <a href="index.php?proveedores=telefono&id=<?php echo $filaProveedores->ProNdo; ?>" class="botones" ><img src="Vista/src/telefono.png" width="30px" title="Telefono Proveedor" alt=""></a>
                                                <a href="index.php?proveedores=activarProveedor&id=<?php echo $filaProveedores->ProNdo; ?>" class="botones activar_color">Activar</a>
                                           
                                            </td>
                                        </tr>




                                        <?php
                                    }
                                }
                            } else {
                                ?>
                            <td colspan="5">No hay datos Disponibles</td>
                        <?php }
                        ?>






                        <?php /*
                         */ ?>
                        </tbody>
                        
                    </table>




                </div>  






            </main>
        </div>
    </body>
</html>