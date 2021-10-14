<!DOCTYPE html>
<!--
productos.php
-->
<?php
require_once 'Modelo/Conexion.php';
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT * FROM `lineaproducto`";
$conexion->consulta($sql);
$resultLineaProducto = $conexion->obtenerResult();
$conexion->cerrar();
?>

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
                    <a href=""><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="index.php?accion=productos" class="activa"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Productos</a>
                    <a href=""><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href=""><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href=""><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Ventas</a>
                    <a href=""><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Clientes</a>
                    <a href=""><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href=""><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>


                </nav>
            </div>
            <main>

                <div class="ventanaNuevoSubLineaProducto">
                    <form action="index.php?accion=ingresarSubLineaProducto" method="post">
                        <div class="cerrarNuevoSubLineaProducto"><img src="Vista/src/cerrar.png" width="30px" title="Cerrar ventana" alt=""></div>
                        <h2>Nueva Sub-Linea de Producto</h2>
                        <table border="0" cellspacing="0" cellspadding="0">

                            <tr>
                                <td class="verde">Nombre Sub-Linea de Producto</td>
                                <td>
                                    <input class="campo" type="text" name="SlproDes" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Categoria</td>
                                <td>
                                    <select name="LprID" class="campo">
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

                <!--
                Contenido
                -->
                <div class="targes">
                    <table>
                        <tr>
                            <td><h3>Productos: &nbsp; &nbsp;</h3></td>

                            <td><div class="nuevoSubLineaProducto">
                                    <img src="Vista/src/nuevo3.png" width="30px" title="Añadir Sub Linea Producto" alt="">
                                </div></td>
                        </tr>
                    </table>

                    <table cellspacing="0" cellpadding="0" class="tablaPrincipal">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Linea Producto</th>
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
                                            <?php echo $fila->SLproId; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->SlproDes; ?>
                                        </td>
                                        <td>



                                            <?php echo $fila->LprID."-"; ?>

                                            <?php
                                            $conexion = new Conexion();
                                            $conexion->abrir();
                                            $sqlDes = "SELECT LprDes FROM lineaproducto WHERE LprID = $fila->LprID";
                                            $conexion->consulta($sqlDes);
                                            $resultDes = $conexion->obtenerResult();
                                            $conexion->cerrar();
                                            while ($filaDes = $resultDes->fetch_object()) {
                                                echo $filaDes->LprDes;
                                            }
                                            ?>




                                        </td>
                                        <td class="caja_btn">

                                            <a href="index.php?accion=editarSubLineaProducto&id=<?php echo $fila->SLproId; ?>" class="botones editar_color">Editar</a>
                                            <a href="index.php?accion=eliminarSubLineaProducto&id=<?php echo $fila->SLproId; ?>" class="botones eliminar_color">Eliminar</a>
                                        </td>
                                    </tr>
    <?php
    }
} else {
    ?>
                                <tr>
                                    <td colspan="4"> <h2>No hay Datos Disponibles</h2></td>
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