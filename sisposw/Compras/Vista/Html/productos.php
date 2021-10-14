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
        <script>
            function validar() {
                var  jpg,png,jpeg,ArtDes, expresionLetras,ArtCant,ArtPre;
                
               
                ArtDes= document.getElementById("ArtDes").value;
                ArtCant= document.getElementById("ArtCant").value;
                ArtPre= document.getElementById("ArtPre").value;
                jpg=/[a-z]+\.+jpg/;
                png=/[a-z]+\.+png/;
                jpeg=/[a-z]+\.+jpeg/;
                
                expresionLetras = /[a-z]/;
                
                






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
                    <a href="../Categorias/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras" class="activa"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>


                </nav>
            </div>
            <main>
                <div class="ventanaNuevoProducto">
                    <form action="index.php?accion=ingresarProducto" method="post" enctype="multipart/form-data" onsubmit="return validar();">
                        <div class="cerrarNuevoProducto"><img src="Vista/src/cerrar.png" width="30px" title="Cerrar ventana" alt=""></div>
                        <h2>Nuevo Producto</h2>
                        <table border="0" cellspacing="0" cellspadding="0">
                            <tr>
                                <td class="verde">Imagen Producto</td>
                                <td>
                                    <input class="campo" type="file" id="img" name="img" accept="image/jpg, image/png, image/jpeg" required>

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Nombre Producto</td>
                                <td>
                                    <input class="campo" type="text" id="ArtDes" name="ArtDes" required autocomplete="off">

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Cantidad</td>
                                <td>
                                    <input class="campo" type="number" id="ArtCant" name="ArtCant" autocomplete="off" required>

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Precio Fijo</td>
                                <td>
                                    <input class="campo" type="number" id="ArtPre" name="ArtPre" autocomplete="off" required>
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
                            <td><div class="nuevoProducto">
                                    <img src="Vista/src/nuevo.png" width="30px" title="Añadir Productos" alt="">
                                </div></td>


                        </tr>
                    </table>

                    <table cellspacing="0" cellpadding="0" class="tablaPrincipal">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Codigo</th>
                                <th>Cantidad Disponible</th>
                                <th>Precio</th>
                                <th>Descripcion</th>
                                <th>Proveedor</th>
                                <th>Categoria</th>
                                <th>Añadir</th>


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
                            if ($resultProveedores->num_rows > 0) {
                                while ($filaProducto = $Producto->fetch_object()) {
                                    if ($filaProducto->Estado == "Activo" && $filaProducto->ArtCant < 20) {
                                        ?>
                        <tbody>
                                        <tr  style=" background: #DE9794;">
                                            <td>
                                                <?php if ($filaProducto->archivo == "") { ?>
                                                    <img src="img/error.png" width="50px" alt="">
                                                <?php } else {
                                                    ?>
                                                    <img src="img/<?php echo $filaProducto->archivo; ?>" width="50px" alt="">

                                                <?php } ?>
                                            </td>
                                            <td><?php echo $filaProducto->ArtCod; ?></td>

                                            <td><?php echo $filaProducto->ArtCant; ?></td>
                                            <td><?php echo $filaProducto->ArtPre; ?></td>
                                            <td><?php echo $filaProducto->ArtDes; ?></td>



                                            <td>


                                                <?php echo $filaProducto->ProNdo . "-"; ?>

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

                                                <?php echo $filaProducto->SLproId . "-"; ?>


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
                                            <td>
                                                <form action="index.php?accion=ingresarCantidad&id=<?php echo $filaProducto->ArtCod; ?>&old=<?php echo $filaProducto->ArtCant; ?>" method="post" >
                                                    <input style="width: 50%;
                                                           padding: .5em;
                                                           border: 1px solid rgba(0,0,0,0.1);
                                                           outline-color: transparent;
                                                           background: #f3f3f3;" name="ArtCant" type="number" required min="0">
                                                    <input class="botones activar_color"  type="submit" name="enviar" value="Ingresar Producto">

                                                </form>
                                            </td>

                                        </tr>
                        </tbody>





                                        <?php
                                    } 
                                } 
                                
                                $Conexion->abrir();
                            $sql = "SELECT * FROM articulo";
                            $Conexion->consulta($sql);
                            $Producto = $Conexion->obtenerResult();
                            $Conexion->cerrar();
                                while ($filaProducto = $Producto->fetch_object()) {
                                    if ($filaProducto->Estado == "Activo" && $filaProducto->ArtCant >= 20) {
                                        ?>
                        <tfoot>
                                        <tr  style="">
                                            <td>
                                                <?php if ($filaProducto->archivo == "") { ?>
                                                    <img src="img/error.png" width="50px" alt="">
                                                <?php } else {
                                                    ?>
                                                    <img src="img/<?php echo $filaProducto->archivo; ?>" width="50px" alt="">

                                                <?php } ?>
                                            </td>
                                            <td><?php echo $filaProducto->ArtCod; ?></td>

                                            <td><?php echo $filaProducto->ArtCant; ?></td>
                                            <td><?php echo $filaProducto->ArtPre; ?></td>
                                            <td><?php echo $filaProducto->ArtDes; ?></td>



                                            <td>


                                                <?php echo $filaProducto->ProNdo . "-"; ?>

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

                                                <?php echo $filaProducto->SLproId . "-"; ?>


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
                                            <td>
                                                <form action="index.php?accion=ingresarCantidad&id=<?php echo $filaProducto->ArtCod; ?>&old=<?php echo $filaProducto->ArtCant; ?>" method="post" >
                                                    <input style="width: 50%;
                                                           padding: .5em;
                                                           border: 1px solid rgba(0,0,0,0.1);
                                                           outline-color: transparent;
                                                           background: #f3f3f3;" name="ArtCant" type="number" required min="0">
                                                    <input class="botones activar_color"  type="submit" name="enviar" value="Ingresar Producto">

                                                </form>
                                            </td>

                                        </tr>
                        </tfoot>




                                        <?php }
                                    ?> 

                                    <?php
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