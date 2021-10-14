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
                   <a href="../Categorias/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/" class="activa"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>


                </nav>
            </div>
            <main>
                <div class="ventanaNuevoProducto">
                    <form action="index.php?accion=ingresarProducto" method="post" enctype="multipart/form-data">
                        <div class="cerrarNuevoProducto"><img src="Vista/src/cerrar.png" width="30px" title="Cerrar ventana" alt=""></div>
                        <h2>Nuevo Producto</h2>
                        <table border="0" cellspacing="0" cellspadding="0">
                            <tr>
                                <td class="verde">Imagen Producto</td>
                                <td>
                                    <input class="campo" type="file" name="img" accept="image/jpg, image/png, image/jpeg" required>

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Nombre Producto</td>
                                <td>
                                    <input class="campo" type="text" name="ArtDes" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Cantidad</td>
                                <td>
                                    <input class="campo" type="number" name="ArtCant" autocomplete="off" required>

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Precio Fijo</td>
                                <td>
                                    <input class="campo" type="number" name="ArtPre" autocomplete="off" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Proveedor</td>
                                <td>
                                    <?php
                                    $Conexion = new Conexion();
                                    $Conexion->abrir();
                                    $sql = "SELECT * FROM proveedores";
                                    $Conexion->consulta($sql);
                                    $resultProveedores = $Conexion->obtenerResult();
                                    $Conexion->cerrar();
                                    ?>
                                    <select name="ProNdo" class="campo">
                                        <?php
                                        if ($resultProveedores->num_rows > 0) {
                                            while ($filaProveedores = $resultProveedores->fetch_object()) {
                                                ?>
                                                <option value="<?php echo $filaProveedores->ProNdo; ?>"><?php echo $filaProveedores->ProNom; ?></option>
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
                                <td class="verde">Categoria</td>
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

                            </tr>
                            <tr>
                                <td colspan="2">

                                    <input class="boton" type="submit" name="enviar" value="Ingresar Producto">
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
                            <td><a href="../Compras/">
                                    <img src="Vista/src/nuevo.png" width="30px" title="Comprar Productos" alt="">
                                </a></td>

                        </tr>
                    </table>

                    <table cellspacing="0" cellpadding="0" class="tablaPrincipal">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Cantidad Disponible</th>
                                <th>Precio</th>
                                <th>Descripcion</th>
                                <th colspan="2" style="width: 250px;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //style="background: #DE9794;"
                            $Conexion = new Conexion();
                            $Conexion->abrir();
                            $sql = "SELECT * FROM articulo";
                            $Conexion->consulta($sql);
                            $Producto = $Conexion->obtenerResult();
                            $Conexion->cerrar();
                            if ($resultProveedores->num_rows > 0) {
                                while ($filaProducto = $Producto->fetch_object()) {
                                    if ($filaProducto->Estado == "Activo") {
                                        ?>
                            <tr <?php if ($filaProducto->ArtCant <20){ echo 'style="background: #DE9794;"';} ?>>
                                            <td>
                                                <?php
                                                
                                                            if ($filaProducto->archivo == "") {?>
                                                <img src="img/error.png" width="50px" alt="">
                                                <?php
                                                                
                                                            }else{?>
                                                <img src="../Compras/img/<?php echo $filaProducto->archivo; ?>" width="50px" alt="">
                                                
                                                            <?php }?>
                                            </td>
                                            <td><?php echo $filaProducto->ArtCant; ?></td>
                                            <td><?php echo $filaProducto->ArtPre; ?></td>
                                            <td><?php echo $filaProducto->ArtDes; ?></td>
                                            
                                            
                                            
                                            
                                            
                                          
                                            <td class="caja_btn" colspan="2">
                                                <a href="index.php?accion=editarProducto&id=<?php echo $filaProducto->ArtCod; ?>" class="botones editar_color">Editar</a>
                                                <a href="index.php?accion=eliminarProducto&id=<?php echo $filaProducto->ArtCod; ?>" class="botones eliminar_color">Eliminar</a>
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


                                    <a href="index.php?accion=basura"   ><img src="Vista/src/basura.png" width="30px" title="Ver Eliminados" alt=""></a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>




                </div>  






            </main>
        </div>
    </body>
</html>