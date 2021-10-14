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
                <div class="ventanaProveedor">
                    <form action="index.php?proveedores=ingresarProveedor" method="post">
                        <div class="cerrarProveedor"><img src="Vista/src/cerrar.png" width="30px" title="Cerrar ventana" alt=""></div>
                        <h2>Nuevo Proveedor</h2>
                        <table border="0" cellspacing="0" cellspadding="0" id="tablaProveedor">

                            <tr>
                                <td class="verde">Documento Proveedor</td>
                                <td >
                                    <input class="campo" type="text" name="ProNdo" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Nit Proveedor</td>
                                <td >
                                    <input class="campo" type="text" name="ProNit" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Nombre Proveedor</td>
                                <td >
                                    <input class="campo" type="text" name="ProNom" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Ciudad</td>
                                <td>
                                    <?php
                                    $Conexion = new Conexion();
                                    $Conexion->abrir();
                                    $sql = "SELECT * FROM ciudad";
                                    $Conexion->consulta($sql);
                                    $resultCiudad = $Conexion->obtenerResult();
                                    $Conexion->cerrar();
                                    ?>
                                    <select name="CiuCod" class="campo">
                                        <?php
                                        if ($resultCiudad->num_rows > 0) {
                                            while ($filaCiudad = $resultCiudad->fetch_object()) {
                                                ?>
                                                <option value="<?php echo $filaCiudad->CiuCod; ?>"><?php echo $filaCiudad->CiuNom; ?></option>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <option value="0">No hay Datos</option>
                                        <?php } ?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Direccion Proveedor</td>
                                <td >
                                    <input class="campo" type="text" name="ProDir" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Email Proveedor</td>
                                <td >
                                    <input class="campo" type="email" name="ProEma" required autocomplete="off">

                                </td>
                            </tr><tr>
                            <td class="verde">Telefono Proveedor</td>
                            <td>
                                <div class="nuevoTelefono">
                                    <img src="Vista/src/nuevo.png" width="30px" title="Añadir Numero" alt="">
                                </div>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="borrarTelefono">
                                        <img src="Vista/src/eliminarIcono.png" width="30px" title="Eliminar Numero" alt="">
                                    </div>
                                </td>
                                <td>
                                    <input class="campo" type="text" name="TelProNum[]" required autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="borrarTelefono">
                                        <img src="Vista/src/eliminarIcono.png" width="30px" title="Eliminar Numero" alt="">
                                    </div>
                                </td>
                                <td>
                                    <input class="campo" type="text" name="TelProNum[]" required autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="borrarTelefono">
                                        <img src="Vista/src/eliminarIcono.png" width="30px" title="Eliminar Numero" alt="">
                                    </div>
                                </td>
                                <td>
                                    <input class="campo" type="text" name="TelProNum[]" required autocomplete="off">
                                </td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td colspan="2">

                                        <input class="boton" type="submit" name="enviar" value="Ingresar Proveedor">
                                    </td>

                                </tr>
                            </tfoot>
                        </table>

                    </form>
                </div>

                <!--
                Contenido
                -->
                <div class="targes">
                    <table>
                        <tr>
                            <td><h3>Proveedores: &nbsp; &nbsp;</h3></td>
                            <td><div class="nuevoProveedor">
                                    <img src="Vista/src/nuevo.png" width="30px" title="Añadir Proveedor" alt="">
                                </div></td>
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
                                    if ($filaProveedores->Estado == "Activo") {
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
                                                <a href="index.php?proveedores=editarProveedor&id=<?php echo $filaProveedores->ProNdo; ?>" class="botones editar_color">Editar</a>
                                                <a href="index.php?proveedores=eliminarProveedor&id=<?php echo $filaProveedores->ProNdo; ?>" class="botones eliminar_color">Eliminar</a>
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
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <td class="caja_btn" colspan="2" >


                                    <a href="index.php?proveedores=basura"   ><img src="Vista/src/basura.png" width="30px" title="Ver Eliminados" alt=""></a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>




                </div>  






            </main>
        </div>
    </body>
</html>