<!DOCTYPE html>
<!--
productos.php
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registro de usuario, sispow">
        <link rel="icon" href="Vista/src/logo.png"/>
        <link rel="stylesheet" href="Vista/css/gestion.css"/>
        <link rel="stylesheet" href="Vista/Css/productos.css">
        <script type="text/javascript" src="Vista/Js/jquery.js"></script>
        <script type="text/javascript" src="Vista/Js/productos.js"></script>
        <script>
            function validar() {
                var LprDes, expresionC, expresionLetras;
                LprDes = document.getElementById("LprDes").value;
                expresionC = /\w+@+\w+\.+[a-z]/;
                expresionLetras = /[a-z]/;

                if (LprDes === "") {
                    alert("El campo esta vacio");
                    return false;

                } else
                if ((!expresionLetras.test(LprDes)) || LprDes.length > 80) {
                    alert("El campo invalido");
                    return false;
                }





            }
            function validar1() {
                var SlproDes, expresionC, expresionLetras;
                SlproDes = document.getElementById("SlproDes").value;
                expresionC = /\w+@+\w+\.+[a-z]/;
                expresionLetras = /[a-z]/;

                if (SlproDes === "") {
                    alert("El campo esta vacio");
                    return false;

                } else
                if ((!expresionLetras.test(SlproDes)) || SlproDes.length > 70) {
                    alert("El campo invalido");
                    return false;
                }





            }
            
        </script>
        <title>SISPOW - INICIO</title>
    </head>

    <body>
        <div class="main"> 
            <header> 
                <h2>SISTEMA DE INVENTARIO</h2>
                <nav>
                    <a href="index.php?accion=destruir"><img src="Vista/src/pagar.png" alt=""></a>
                </nav>
            </header>

            <div class="barra">
                <nav>
                    <h3>Menú</h3>
                    <a href="../Categorias/" class="activa"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>


                </nav>
            </div>
            <main>
                <div class="ventanaNuevoSubLineaProducto">
                    <form action="index.php?accion=ingresarSubLineaProducto" method="post" onsubmit="return validar1();">
                        <div class="cerrarNuevoSubLineaProducto"><img src="Vista/src/cerrar.png" width="30px" title="Cerrar ventana" alt=""></div>
                        <h2>Nueva Sub-Linea de Producto</h2>
                        <table border="0" cellspacing="0" cellspadding="0">

                            <tr>
                                <td class="verde">Nombre Sub-Linea de Producto</td>
                                <td>
                                    <input class="campo" id="SlproDes" type="text" name="SlproDes" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Categoria</td>
                                <td>
                                    <select name="LprID" class="campo">
                                        <?php
                                        require_once 'Modelo/Conexion.php';
                                        $conexion = new Conexion();
                                        $conexion->abrir();
                                        $sql = "SELECT * FROM `lineaproducto`";
                                        $conexion->consulta($sql);
                                        $resultLineaProducto = $conexion->obtenerResult();
                                        $conexion->cerrar();
                                        ?>
                                        <?php
                                        if ($resultLineaProducto->num_rows > 0) {
                                            while ($filaLineaProducto = $resultLineaProducto->fetch_object()) {
                                                ?>
                                                <option value="<?php echo $filaLineaProducto->LprID; ?>"><?php echo $filaLineaProducto->LprDes; ?></option>
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
                                <td>

                                    <input class="boton" type="submit" name="enviar" value="Ingresar Datos">
                                </td>
                                <td>
                                    <a href="index.php?accion=mostrarSubLineaProducto" class="botones mostrar_color">Mostar Datos</a>
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>

                <div class="ventanaNuevoLineaProducto">
                    <form action="index.php?accion=ingresarLineaProducto" method="post" onsubmit="return validar();">
                        <div class="cerrarNuevoLineaProducto"><img src="Vista/src/cerrar.png" width="30px" title="Cerrar ventana" alt=""></div>
                        <h2>Nueva Linea de Producto</h2>
                        <table border="0" cellspacing="0" cellspadding="0">

                            <tr>
                                <td class="verde">Nombre Linea de Producto</td>
                                <td>
                                    <input id="LprDes"  class="campo" type="text" name="LprDes" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <input class="boton" type="submit" name="enviar" value="Ingresar Datos">
                                </td>

                            </tr>
                        </table>

                    </form>
                </div>
                <!--
                  Contenido
                -->
                <div class="targes">
                    <table>
                        <tr>
                            <td><h3>Linea de Productos: &nbsp; &nbsp;</h3></td>
                            <td><div class="nuevoSubLineaProducto">
                                    <img src="Vista/src/nuevo3.png" width="30px" title="Añadir Sub Linea Producto" alt="">
                                </div></td>
                            <td><div class="nuevoLineaProducto">
                                    <img src="Vista/src/nuevo2.png" width="30px" title="Añadir Linea Producto" alt="">
                                </div></td>

                        </tr>
                    </table>

                    <table cellspacing="0" cellpadding="0" class="tablaPrincipal">
                        <thead>
                            <tr>
                                <th>Linea ID</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($result->num_rows > 0) {
                                ?>
                                <?php while ($fila = $result->fetch_object()) {
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $fila->LprID; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->LprDes; ?>
                                        </td>
                                        <td class="caja_btn">
                                            <a href="index.php?accion=editarLineaProducto&id=<?php echo $fila->LprID; ?>" class="botones editar_color">Editar</a>
                                            <a href="index.php?accion=eliminarLineaProducto&id=<?php echo $fila->LprID; ?>" class="botones eliminar_color">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="2"> <h2>No hay Datos Disponibles</h2></td>
                                </tr>
<?php } ?>


                            <?php /*
                             */ ?>



                        </tbody>
                    </table>




                </div>  
            </main>
        </div>
    </body>
</html>