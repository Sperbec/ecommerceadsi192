<?php


                        $conexion = mysqli_connect("localhost", "root", "", "sisposw");


if (isset($_POST['prod'])) {
	$prod = $_POST['prod'];
	 $sql = "SELECT * FROM articulo WHERE Estado = 'Activo' AND ArtDes LIKE '%$prod%'";
                             $r = mysqli_query($conexion, $sql);
                             
                             while ($fila = mysqli_fetch_assoc($r)){
                            ?>
                            <div class="prod" id="tarjeta<?php echo $fila['ArtCod']; ?>">
                                <div class="img"><img src="Productos/img/<?php echo $fila['archivo']; ?>" alt=""></div>
                                <div class="name"><h3><?php echo $fila['ArtDes']; ?></h3></div>
                                <div class="papa">
                                    <div class="precio"><?php echo "$".number_format($fila['ArtPre'],0,',','.'); ?></div>
                                    <div  onclick="abrir()" class="btn abrir"  datacan="<?php echo $fila['ArtCant']; ?>" data-productoID="<?php echo $fila['ArtCod'];?>"><p>Agregar</p></div>
                                </div>
                                
                            </div>
                            
                             <?php }
}

?>             
                             
                            

