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
               

                
                <!--
                Contenido
                -->
                <div class="targes">
                    <table>
                        <tr>
                            <td><h3>Productos: &nbsp; &nbsp;</h3></td>
                            <td><div class="nuevoProducto">
                                    <img src="Vista/src/nuevo.png" width="30px" title="Añadir Productos" alt="">
                                </div></td>
                        </tr>
                    </table>
                    <form action="index.php?accion=editarProducto1" method="POST">


                    <table cellspacing="0" cellpadding="0" class="tablaPrincipal">
                        <thead>
                            <tr>
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
                            /*$Conexion = new Conexion();
                            $Conexion->abrir();
                            $sql = "SELECT * FROM articulo";
                            $Conexion->consulta($sql);
                            $Producto = $Conexion->obtenerResult();
                            $Conexion->cerrar();*/
                            if ($result->num_rows > 0) {
                                while ($filaProducto = $result->fetch_object()) {
                                    if ($filaProducto->Estado == "Activo") {
                                        ?>
                                        <tr>
                                                <input type="hidden" name="ArtCod" value="<?php echo $filaProducto->ArtCod; ?>">
                                            
                                            
                                            
                                            <td><input type="number" name="ArtCant" value="<?php echo $filaProducto->ArtCant; ?>" required min="0"></td>
                                            <td><input type="number" name="ArtPre" value="<?php echo $filaProducto->ArtPre; ?>" required min="0"></td>
                                            <td><input type="text" name="ArtDes" value="<?php echo $filaProducto->ArtDes; ?>" required></td>
                                            <td>
                                                
                                                <select name="ProNdo">
                                                    <option value="<?php echo $filaProducto->ProNdo; ?>"><?php echo $filaProducto->ProNdo; ?></option>
                                                </select>
                                            </td>
                                            <td>
                                                
                                                <?php
                                    $Conexion = new Conexion();
                                    $Conexion->abrir();
                                    $sql = "SELECT * FROM sublineaproducto";
                                    $Conexion->consulta($sql);
                                    $resultSubLineaProducto = $Conexion->obtenerResult();
                                    $Conexion->cerrar();
                                    ?>
                                    <select name="SLproId" class="campo">
                                        <?php
                                        if ($resultSubLineaProducto->num_rows > 0) {
                                            while ($filaSubLineaProducto = $resultSubLineaProducto->fetch_object()) {
                                                ?>
                                                <option value="<?php echo $filaSubLineaProducto->SLproId; ?>"><?php echo $filaSubLineaProducto->SlproDes; ?></option>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <option value="0">No hay Datos</option>
                                        <?php } ?>

                                    </select>
                                            </td>
                                            <td class="caja_btn">
                                                 <input type="submit" value="Editar" class="botones editar_color">

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
                    </form>



                </div>  






            </main>
        </div>
    </body>
</html>