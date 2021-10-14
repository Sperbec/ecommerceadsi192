<?php 

error_reporting(0);

  session_start();

  
  if($_GET["inicio"]=="si"){

?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registro de usuario, sispow">
        <link rel="icon" href="src/logo.png"/>
        <link rel="stylesheet" href="css/principal.css"/>
        <script>
        


function validar() {
    var documento, pass, nombre,expresionC, expresionLetras;
    documento = document.getElementById("documento").value;
    pass = document.getElementById("pass").value;
   // nombre=document.getElementById("nombre").value;
    expresionC=/\w+@+\w+\.+[a-z]/;
    expresionLetras=/[a-z]/;
    
    if (documento === "" || pass === "") {
        alert("El campo esta vacio");
        return false;

    }
    else if (pass.length > 20) {
        alert("Clave inválida");
        return false;
    }
    else if (documento.length > 11 ||isNaN(documento)) {
        alert(" Documento inválido ");
        return false;
    }
   /* else if (nombre === "") {
        alert("El nombre esta vacio");
        return false;

    }
    else if (nombre.length >20 || isNaN(documento)) {
        alert("El nombre invalido");
        return false;

    }
    else if(!expresionLetras.test(nombre)){
        alert("El nombre invalido");
        return false;
    }
    */




}


        </script>
        <title>FerreGas</title>
    </head>
    
    <body>
        <div class="contenedor">
            <header>
                <h2><a style="text-decoration: none; color:#fff; display: flex; align-items: center;" href="index.php"><img src='src/logo.png' width="25px" style="margin-right: .5em;">FERREGAS</a></h2>
            </header>
            <main>
                <div class="banner">
                    <div class="capa">
                       
                         <div class="texto">
                        <img src="src/banner.png" width="80%" alt="">
                        <p>SISTEMA DE INVENTARIO Y PUNTOS DE VENTA WEB</p>
                    </div>
                    <div class="login">
                        <form action="php/controlador/Controlador_Sesion.php" method="POST" onsubmit="return validar();">
                           
                            <table border="0" cellspacing="1">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                             <h2>Iniciar sesión</h2>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="espacio"><input id="documento" class="campo" type="text" name="documento" placeholder="&#128129; Documento de identidad"></td>
                                    </tr>
                                    <tr>
                                        <td class="espacio"><input id="pass" class="campo" type="password" name="pass" placeholder="&#128272; Contraseña"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="boton" type="submit" value="Ingresar"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="registrar.php">Regístrate</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            

                        </form>
                    </div>
                    </div>
                </div>
            </main>
            <footer>
                <div class="info">
                    
                    <address>Todos los derechos &copy; sispow <?php echo date("Y"); ?></address>
                </div>
            </footer>
        </div>
        
        
        
        
        
        
        
        
    </body>
</html>
  <?php } else{
      
  
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
        <link rel="icon" href="src/logo.png"/>
        <link rel="stylesheet" href="css/principal.css"/>
                <link rel="stylesheet" href="css/cliente.css"/>

<script src="js/jquery.js"></script>
  <script>
            $(document).ready(function(){
                   

        

                  abrir();
                  cerrar();


        $('.agregar').on('click', function (){

            var cantidad=$('.txtCantidad').val().trim();
            var producto_id=$(this).attr('data-productoID');

            $.ajax({
                type:"POST",
                url: "carrito/agregar.php",
                data:{
                    ArtCant:cantidad,
                    ArtCod:producto_id
                },  
                success: function(resp){
                   $(".resp").html(resp);
                    $(".ventana").css({
                                display: 'none'
                            });
                    setTimeout(function(){
                    window.location.href="index.php";
                    },1500);



                },
                error: function(){
                    alert("Error");
                }

            });
        });


         $('#buscar').on('keyup', function (){

            var prod =$('#buscar').val().trim();

            $.ajax({
                type:"POST",
                url: "carrito/buscar_prod.php",
                data:{
                    prod:prod
                },  
                success: function(resp){
                   $(".articulos").html(resp);

                },
                error: function(){
                    alert("Error");
                }

            });
        });
            });

                       function abrir(){
                     $(".abrir").on("click",function(){
                            $(".ventana").css({
                                display: 'block'
                            })

                             var producto_id=$(this).attr('data-productoID');
                             var cant=$(this).attr('datacan');

            $('.agregar').attr('data-productoID', producto_id);

             $('.txtCantidad').attr('max', cant);
                    });

                   }
                  

                  function cerrar(){
                      $("#cerrar").on("click",function(){
                            $(".ventana").css({
                                display: 'none'
                            })
                    });
                  }
        </script>
        <title>FerreGas</title>
    </head>
    
    <body>
        <div class="contenedor">
            <header>
                 <h2><a style="text-decoration: none; color:#fff; display: flex; align-items: center;" href="index.php"><img src='src/logo.png' width="25px" style="margin-right: .5em;">FERREGAS</a></h2>
            
                
                <div class="logo" style="display:flex;">
                <p style="color:#fff; margin-right:.5em;"> 
                        <?php


    $conexion = mysqli_connect("localhost", "root", "", "sisposw");
if (isset($_SESSION['sesion'])) {
   $session = $_SESSION['sesion'];




        $consulta = "SELECT * FROM registro WHERE Id = '$session'";
$r = mysqli_query($conexion, $consulta);
$filita = mysqli_fetch_assoc($r);

 echo "Bienvenido " .$filita['Nombre'];

?>
                </P>
                 <a style="margin-left:1em;" href="php/Modelo/destruir.php"><img width="20px" src="src/pagar.png"></a>
               
               <?php }else{ ?>
 <a style="margin-left:1em;" href="index.php?inicio=si"><img width="20px" src="src/nuevo.png"></a>
               

               <?php } ?>
                    <a href="carrito/carrito.php"><img src="src/carrito.png" width="30px">
                    <span class="san">
                        <?php 

                    
                        $sesion = session_id();

                         $sql_n = "SELECT * FROM carrito WHERE sesion_id =  '$sesion' AND estado = 0";

                         $r = mysqli_query($conexion, $sql_n);

                         $num = mysqli_num_rows($r);

                         echo $num;



                        ?>
                    </span>
                    </a>
                    </div>
            </header>
            <main>
             
                <div class="productos">
                        <h2 class="title">Catálogo de productos</h2>
                        <input style="width: 100%; padding: 1em;
                        border: 1px solid rgba(0,0,0,0.1); margin-bottom: 1em; background: #fafafa;" type="text" id="buscar" placeholder="Buscar producto" name="">
                        <div class="articulos">
                            <?php
                             
                             
                             $sql = "SELECT * FROM articulo WHERE Estado = 'Activo'";
                             $r = mysqli_query($conexion, $sql);
                             
                             while ($fila = mysqli_fetch_assoc($r)){
                            ?>
                            <div class="prod" id="tarjeta<?php echo $fila['ArtCod']; ?>">
                                <div class="img"><img src="Compras/img/<?php echo $fila['archivo']; ?>" alt=""></div>
                                <div class="name"><h3><?php echo $fila['ArtDes']; ?></h3></div>
                                <div class="papa">
                                    <div class="precio"><?php echo "$".number_format($fila['ArtPre'],0,',','.'); ?></div>
                                    <div id="abrir" class="btn abrir" datacan="<?php echo $fila['ArtCant']; ?>" data-productoID="<?php echo $fila['ArtCod'];?>"><p>Agregar</p></div>
                                </div>
                                
                            </div>
                            
                             <?php } ?>
                        </div>

                           <div class="ventana">
                    <div class="contenido_v">
                        <div class="header_v">
                           <h2>Agregar al carrito</h2> 
                        </div>
                        <div class="main_v">
                            <input type="number" value="1" min="1" class="txtCantidad campo" name="" placeholder="Cantidad">
                        </div>
                        <div class="pie_v">
                            <div class="botones">
                              <div class="cancelar" id="cerrar"><p> Cancelar</p></div>
                              <div class="agregar"><p> Agregar</p></div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </main>
            <footer>
                <div class="info">
                    
                    <address>Todos los derechos &copy; sispow <?php echo date("Y"); ?></address>
                </div>
            </footer>

         <div class="resp">
             
         </div>
        </div>


    </body>
</html>
  <?php } ?>