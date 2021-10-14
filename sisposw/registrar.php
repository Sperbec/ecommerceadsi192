<?php 

  session_start();
  
  if (isset($_SESSION['sesion'])) {
      header("Location: php/Vista/Gestion/");
  }
  
  if (isset($_POST['datos'])) {
     require("php/Modelo/Iniciar_Sesion.php");
   
   $objeto = new Iniciar_Sesion();
                    
   $obj = $objeto->registrar_cliente($_POST['documento'],$_POST['nombre']);
      
   echo $obj;
   
   $doc = $_POST['documento'];
   $name = $_POST['nombre'];
}else{
    $doc = "";
   $name = "";
}
?>
<!DOCTYPE html>
<!--template file, choose Tools | Templates
and open the templa-te in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registro de usuario, sispow">
        <link rel="icon" href="src/logo.png"/>
        <link rel="stylesheet" href="css/principal.css"/>
        <link rel="stylesheet" href="css/mensajes.css"/>
        <script>
            function validar() {
    
    
    var documento, pass, nombre,expresionC, expresionLetras;
    documento = document.getElementById("documento").value;
    nombre=document.getElementById("nombre").value;
    expresionC=/\w+@+\w+\.+[a-z]/;
    expresionLetras=/[a-z]/;
    if (documento === "" || nombre === "") {
        alert("El campo esta vacio");
        return false;

    }else 
         if (documento.length > 11 ||isNaN(documento)) {
        alert(" Documento Invalido ");
        return false;
    }else if((!expresionLetras.test(nombre))|| nombre.length>20){
        alert("El nombre invalido");
        return false;
    }
    




}
        </script>
        <script src="js/jquery.js"></script>
        
        

        
        <title>Registro</title>
    </head>
    
    <body>
        <div class="contenedor">
            <header>
                <h2>SISPOW</h2>
                
            </header>
            <main>
                <div class="banner">
                    <div class="capa">
                       
                         <div class="texto">
                        <img src="src/banner.png" width="80%" alt="">
                        <p>SISTEMA DE INVENTARIO Y PUNTOS DE VENTA WEB</p>
                    </div>
                    <div class="login">
                        <form action="" method="POST" onsubmit="return validar();" >
                           
                            <table border="0" cellspacing="1">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                             <h2>Registrate</h2>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="espacio"><input id="documento" class="campo" type="text" name="documento" placeholder="Documento de identidad" value="<?php echo $doc; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td class="espacio"><input id="nombre" class="campo" type="text" name="nombre" placeholder="Nombre completo" value="<?php echo $name; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td><input class="boton" type="submit" name="datos" value="Entrar a ferregas"></td>
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
