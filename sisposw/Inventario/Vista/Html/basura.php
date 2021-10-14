<!DOCTYPE html>
<!--
productos.php
-->
<?php
require_once 'Modelo/Conexion.php';

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
                    <a href="../Categorias/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/" class="activa"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>


                </nav>
            </div>
            <main>
                 <!--
                Contenido
                -->
                <div class="targes">
                    <table>
                        <tr>
                            <td><h3>Productos: &nbsp; &nbsp;</h3></td>
                            <td><a href="index.php?accion=productos">
                                    <img src="Vista/src/basura.png" width="30px" title="Activados" alt="">
                                </a></td>
                            

                        </tr>
                    </table>

                    <table cellspacing="0" cellpadding="0" class="tablaPrincipal">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Cantidad Disponible</th>
                                <th>Precio</th>
                                <th>Descripcion</th>
                                <th>Proveedor</th>
                                <th>Categoria</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $Conexion = new Conexion();
                            $Conexion->abrir();
                            $sql = "SELECT * FROM articulo";
                            $Conexion->consulta($sql);
                            $Producto = $Conexion->obtenerResult();
                            $Conexion->cerrar();
                            if ($Producto->num_rows > 0) {
                                while ($filaProducto = $Producto->fetch_object()) {
                                    if ($filaProducto->Estado == "Inactivo") {
                                        ?>
                                        <tr>
                                            <td><?php echo $filaProducto->ArtCod; ?></td>
                                            <td><?php echo $filaProducto->ArtCant; ?></td>
                                            <td><?php echo $filaProducto->ArtPre; ?></td>
                                            <td><?php echo $filaProducto->ArtDes; ?></td>
                                            <td>
                                                
                                                
                                                <?php  echo $filaProducto->ProNdo."-"; ?>
                                            
                                            <?php
                                            $conexion = new Conexion();
                                            $conexion->abrir();
                                            $sqlProveedor = "SELECT ProNom FROM `proveedores` WHERE ProNdo = $filaProducto->ProNdo";
                                            $conexion->consulta($sqlProveedor);
                                            $resultProveedor = $conexion->obtenerResult();
                                            $conexion->cerrar();
                                            while ($filaProveedor = $resultProveedor->fetch_object()) {
                                                echo $filaProveedor->ProNom;
                                            }
                                            ?>
                                            
                                            
                                            </td>
                                            <td>
                                                
                                                <?php echo $filaProducto->SLproId."-"; ?>
                                                
                                            
                                            <?php
                                            $conexion = new Conexion();
                                            $conexion->abrir();
                                            $sqlSubLineaProducto = "SELECT SlproDes FROM `sublineaproducto` WHERE SLproId = $filaProducto->SLproId";
                                            $conexion->consulta($sqlSubLineaProducto);
                                            $resultSubLineaProducto = $conexion->obtenerResult();
                                            $conexion->cerrar();
                                            while ($filaSubLineaProducto = $resultSubLineaProducto->fetch_object()) {
                                                echo $filaSubLineaProducto->SlproDes;
                                            }
                                            ?>
                                            
                                            
                                            </td>
                                            <td class="caja_btn">
                                                <a href="index.php?accion=activarProducto&id=<?php echo $filaProducto->ArtCod; ?>" class="botones activar_color">Activar</a>
                                            </td>
                                        </tr>




                                        <?php
                                    }
                                }
                            } else {
                                ?>
                            <td colspan="6">No hay datos Disponibles</td>
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