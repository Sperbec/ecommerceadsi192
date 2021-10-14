
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        <link rel="icon" href="../src/logo.png"/>
        <link rel="stylesheet" href="../css/gestion.css"/>
        <link rel="stylesheet" href="css/reportes.css"/>
        <script type="text/javascript"  src="Js/jquery.js"></script>
        <script type="text/javascript" src="Js/reportes.js"></script>
        

        <title>SISPOW - INICIO</title>
        
    </head>
    
    <body>




        <div class="main"> 
           <header> 
                <h2>SISTEMA DE INVENTARIO</h2>
                <nav>
                    <a href="../php/Modelo/destruir.php"><img src="../src/pagar.png" alt=""></a>
                </nav>
            </header>
            
            <div class="barra">
                <nav>
                    <h3>Menú</h3>
                    <a href="../Categorias/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Categorias</a>
                    <a href="../Empleado/"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Empleados</a>
                    <a href="../Compras" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Compras</a>
                    <a href="../Proveedores/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Proveedores</a>
                    <a href="../reportes/" class="activa"><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Reportes</a>
                    <a href="../Inventario/" ><img src="Vista/src/ventas.png" width="20px" height="20pz" alt="">Inventario</a>


                   
                </nav>
            </div>
            <main>
              <div class="ventanaReporte">
                    <form action="index.php" method="post">
                        <div class="cerrarReporte"><img src="../Productos/Vista/src/cerrar.png" width="40px" title="Cerrar ventana" alt=""></div>
                        <h2>Consultar Reporte</h2>
                        <table border="0" cellspacing="0" cellspadding="0">

                            <tr>
                                <td class="verde">Ingrese numero,nit o documento del reporte que desea consultar: </td>
                                <td>
                                    <input class="campo" type="text" name="numero" required autocomplete="off" placeholder="Número,Nit,Documento," >

                                </td>
                            </tr>
                            <tr>
                                <td class="verde">Seleccione el tipo de reporte para imprimir en pdf </td>
                                <td>
                                  <select class="campo" name ='opcion' required>
                 <option value=></option>
                 <option value="1">factura</option>
                 <option value="2">reporte: proveedores 'activos'</option>
                 <option value="3">reporte: proveedores 'inactivos'</option>
                 <option value="4">reporte: empleados 'activos'</option>
                 <option value="5">reporte: empleados 'inactivos'</option>
                 <option value="6">reporte: articulos 'activos'</option>
                 <option value="7">reporte: articulos 'inactivos'</option>
                 <option value="8">reporte: clientes 'activos'</option>
                 <option value="9">reporte: clientes 'inactivos'</option>
               </select>



                                    

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <input class="boton" type="submit" name="ok" value="Validar Datos">
                                </td>
                                
                            </tr>
                        </table>

                    </form>
                </div>



                <div class="targes">
                    <table>
                        <tr>
                            <td><h3>Consulta: &nbsp; &nbsp;</h3></td>
                            <td><div class="nuevoReporte">
                                    <img src="../Productos/Vista/src/nuevo.png" width="30px" title="Añadir Productos" alt="">
                                </div></td>
                            

                        </tr>
                    </table>
                   
       
        <?php
         $con=mysqli_connect("localhost","root","","sisposw") or 
      die("Problemas con la conexión a la base de datos".  mysqli_error());

        if (isset($_POST['ok'])&&($_REQUEST['opcion'])) {
            if ($_REQUEST['opcion'] == 1) {
                  $cons1 = mysqli_query($con, "SELECT  fac.FacCod as codigo,
                                         fac.FacFec as fecha,
                                         fac.FacHor as hora,
                                         fac.CajCod as caja,
                                         fac.CliNdo as clico,
                                         fac.Estado as estado,
                                         cliente.CliNom as nom,
                                         cliente.CliNdo as docu,
                                         cliente.CliFec as fech,
                                         empleados.EmpNom as empnom,
                                         detalleventa.DveCod as coddve,
                                         detalleventa.DveCan as canti,
                                         detalleventa.DveIva as iva,
                                         detalleventa.DveTot as total                     
                                         from factura as fac
                                         inner join detalleventa ON
                                         FacCod=detalleventa.DveId
                                         inner JOIN cliente ON
                                         fac.CliNdo=cliente.CliNdo
                                         inner join empleados on
                                         fac.EmpNdo = empleados.EmpNdo
                                       where fac.FacCod='$_REQUEST[numero]'") or
                    die(mysqli_error($con));

            if (($reg1 = mysqli_fetch_array($cons1))) {

                echo "<br> 
                <style>

               table {
             width: 40%;
             border-collapse: collapse;
             }

                </style>
 <table border='2'>
<tbody>
<tr>
<td><strong>Código de factura:</strong></td>
<td>$reg1[codigo]</td>
</tr>
<tr>
<td><strong>Fecha de factura:</strong></td>
<td>$reg1[fecha]</td>
</tr>
<tr>
<td><strong>hora de factura:</strong></td>
<td>$reg1[hora]</td>
</tr>
<tr>
<td><strong>codigo de caja:</strong></td>
<td>$reg1[caja]</td>
</tr>
<tr>
<td><strong>codigo de cliente:</strong></td>
<td>$reg1[clico]</td>
</tr>
<tr>
<td><strong>nombre del cliente:</strong></td>
<td>$reg1[nom]</td>
</tr>
<tr>
<td><strong>cedula del cliente:</strong></td>
<td>$reg1[docu]</td>
</tr>
<tr>
<td><strong>fecha del cliente:</strong></td>
<td>$reg1[fech]</td>
</tr>
<tr>
<td><strong>nombrre del empleado:</strong></td>
<td>$reg1[empnom]</td>
</tr>
<tr>
<td><strong>cantidad de la venta:</strong></td>
<td>$reg1[canti]</td>
</tr>
<tr>
<td><strong>iva de la venta:</strong></td>
<td>$reg1[iva]</td>
</tr>
<tr>
<td><strong><u>total de la venta:</u></strong></td>
<td>$reg1[total]</td>
</tr>
<tr>
<td><strong>Estado:</strong></td>
<td>$reg1[estado]</td>";  


echo  "<a class='botones mostrar_color' href='facturacion.php?numero=".$_REQUEST['numero']."'>Imprimir</a><br><br>";

                
            } else {
                echo "<br>La factura no existe";
            }
            }if ($_REQUEST['opcion'] == 2) {
                  $cons1 = mysqli_query($con, "SELECT  pro.ProNit as nit, 
                                         pro.ProNdo as codi,  
                                         pro.ProNom as nom2, 
                                         pro.ProDir as dir2, 
                                         pro.ProEma as ema2, 
                                         pro.Estado as est2,
                                         pro.CiuCod as ciup,
                                         tele.TelProNum as telep
                                         from proveedores as pro
                                         inner join telefonoproveedor as tele on
                                         pro.ProNdo = tele.ProNdo
                                       where pro.ProNit='$_REQUEST[numero]'") or
                    die(mysqli_error($con));

            if (($reg1 = mysqli_fetch_array($cons1))&&($reg1['est2']=="Activo")) {
                   echo "<br>
                <style>

               table {
             width: 40%;
             border-collapse: collapse;
             }

                </style>
                <table border='3'>
<tbody>
<tr>
<td><strong>NIT:</strong></td>
<td>$reg1[nit]</td>
</tr>
<tr>
<td><strong>estado del proveedor:</strong></td>
<td>$reg1[est2]</td>
</tr>
<tr>
<td><strong>nombre del prooveedor:</strong></td>
<td>$reg1[nom2]</td>
</tr>
<tr>
<td><strong>direcion del proveedor:</strong></td>
<td>$reg1[dir2]</td>
</tr>
<tr>
<td><strong>email del proveedor:</strong></td>
<td>$reg1[ema2]</td>
</tr>
<tr>
<td><strong>identificacion del proveedor:</strong></td>
<td>$reg1[codi]</td>
</tr>
<tr>
<td><strong>telefona del prooveedor:</strong></td>
<td>$reg1[telep]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='proveedores_activos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo </a><br><br>";
                
            } else {
                echo "<br>el proveedor no esta activado";
            }
            }


            if($_REQUEST['opcion'] == 3){
             $cons1 = mysqli_query($con, "SELECT  pro.ProNit as nit, 
                                         pro.ProNdo as codi,  
                                         pro.ProNom as nom2, 
                                         pro.ProDir as dir2, 
                                         pro.ProEma as ema2, 
                                         pro.Estado as est2,
                                         pro.CiuCod as ciup,
                                         tele.TelProNum as telep
                                         from proveedores as pro
                                         inner join telefonoproveedor as tele on
                                         pro.ProNdo = tele.ProNdo
                                       where pro.ProNit='$_REQUEST[numero]'") or
                    die(mysqli_error($con));

                    if(($reg1 = mysqli_fetch_array($cons1))&&($reg1['est2']=="Inactivo")){
                      echo "<br>
                <style>

               table {
             width: 40%;
             border-collapse: collapse;
             }

                </style>
                <table border='3'>
<tbody>
<tr>
<td><strong>NIT:</strong></td>
<td>$reg1[nit]</td>
</tr>
<tr>
<td><strong>estado del proveedor:</strong></td>
<td>$reg1[est2]</td>
</tr>
<tr>
<td><strong>nombre del prooveedor:</strong></td>
<td>$reg1[nom2]</td>
</tr>
<tr>
<td><strong>direcion del proveedor:</strong></td>
<td>$reg1[dir2]</td>
</tr>
<tr>
<td><strong>email del proveedor:</strong></td>
<td>$reg1[ema2]</td>
</tr>
<tr>
<td><strong>identificacion del proveedor:</strong></td>
<td>$reg1[codi]</td>
</tr>
<tr>
<td><strong>telefona del prooveedor:</strong></td>
<td>$reg1[telep]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='proveedores_inactivos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo </a><br><br>";


                    }else{
                     echo "<br>el proveedor debe estar activado o no existe";
                    }

            }

            if ($_REQUEST['opcion'] == 4) {
                 $cons1 = mysqli_query($con, "SELECT  emp.EmpNdo as docu3,
                                                       emp.EmpNom as nom3,
                                                       emp.Rolid as rol3,
                                                       emp.EmpGen as gene3,
                                                       emp.Carid as cargo3,
                                                       emp.CajCod as codi3,
                                                       emp.EmpDir as dire3,
                                                       emp.Estado as esta3,
                                                       horariolaboral.Hlaini as ini,
                                                       horariolaboral.HlaFin as fin,
                                                       rol.RolNom as nomrol,
                                                       tipoidentidad.TidDes as tipoCC,
                                                       car.CarNom as car3
                                         from empleados as emp
                                         inner join horariolaboral on
                                         horariolaboral.Hlaid = emp.Hlaid
                                         inner join rol as rol on
                                         rol.Rolid = emp.Rolid
                                         inner join cargos as car on
                                         emp.Hlaid = car.Carid
                                         inner join tipoidentidad on
                                         emp.Tideid = tipoidentidad.Tideid
                                       where emp.EmpNdo='$_REQUEST[numero]'") or
                    die(mysqli_error($con));

         if (($reg1 = mysqli_fetch_array($cons1))&&($reg1['esta3']=="Activo")) {
echo "<br>
<style>
               table {
             width: 40%;
             border-collapse: collapse;
             }
                </style>
<table border='2'>
<tbody>
<tr>
<td><strong>Documento del empleado:</strong></td>
<td>$reg1[docu3]</td>
</tr>
<tr>
<td><strong>Nombre del empleado:</strong></td>
<td>$reg1[nom3]</td>
</tr>
<tr>
<td><strong>Cargo:</strong></td>
<td>$reg1[car3]</td>
</tr>
<tr>
<td><strong>Rol:</strong></td>
<td>$reg1[nomrol]</td>
</tr>
<tr>
<td><strong>Empleado Id:</strong></td>
<td>$reg1[codi3]</td>
</tr>
<tr>
<td><strong>Genero del empleado:</strong></td>
<td>$reg1[gene3]</td>
</tr>
<tr>
<td><strong>tipo de identidad:</strong></td>
<td>$reg1[tipoCC]</td>
</tr>
<tr>
<td><strong>direcion del empleado:</strong></td>
<td>$reg1[dire3]</td>
</tr>
<tr>
<td><strong>Estado del empleado:</strong></td>
<td>$reg1[esta3]</td>
</tr>
<tr>
<td><strong>hora de entrada :</strong></td>
<td>$reg1[ini]</td>
</tr>
<tr>
<td><strong>hora de salida:</strong></td>
<td>$reg1[fin]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='empleados_activos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo</a><br><br>";
             
         }else{
          echo "<br>El empleado no esta activado o no existe";
         }


            }


            if($_REQUEST['opcion'] == 5){
               $cons1 = mysqli_query($con, "SELECT  emp.EmpNdo as docu3,
                                                       emp.EmpNom as nom3,
                                                       emp.Rolid as rol3,
                                                       emp.EmpGen as gene3,
                                                       emp.Carid as cargo3,
                                                       emp.CajCod as codi3,
                                                       emp.EmpDir as dire3,
                                                       emp.Estado as esta3,
                                                       horariolaboral.Hlaini as ini,
                                                       horariolaboral.HlaFin as fin,
                                                       rol.RolNom as nomrol,
                                                       tipoidentidad.TidDes as tipoCC,
                                                       car.CarNom as car3
                                         from empleados as emp
                                         inner join horariolaboral on
                                         horariolaboral.Hlaid = emp.Hlaid
                                         inner join rol as rol on
                                         rol.Rolid = emp.Rolid
                                         inner join cargos as car on
                                         emp.Hlaid = car.Carid
                                         inner join tipoidentidad on
                                         emp.Tideid = tipoidentidad.Tideid
                                       where emp.EmpNdo='$_REQUEST[numero]'") or
                    die(mysqli_error($con));
                    if(($reg1 = mysqli_fetch_array($cons1))&&($reg1['esta3']=="Inactivo")){
   echo "<br>
<style>
               table {
             width: 40%;
             border-collapse: collapse;
             }
                </style>
<table border='2'>
<tbody>
<tr>
<td><strong>Documento del empleado:</strong></td>
<td>$reg1[docu3]</td>
</tr>
<tr>
<td><strong>Nombre del empleado:</strong></td>
<td>$reg1[nom3]</td>
</tr>
<tr>
<td><strong>Cargo:</strong></td>
<td>$reg1[car3]</td>
</tr>
<tr>
<td><strong>Rol:</strong></td>
<td>$reg1[nomrol]</td>
</tr>
<tr>
<td><strong>Empleado Id:</strong></td>
<td>$reg1[codi3]</td>
</tr>
<tr>
<td><strong>Genero del empleado:</strong></td>
<td>$reg1[gene3]</td>
</tr>
<tr>
<td><strong>tipo de identidad:</strong></td>
<td>$reg1[tipoCC]</td>
</tr>
<tr>
<td><strong>direcion del empleado:</strong></td>
<td>$reg1[dire3]</td>
</tr>
<tr>
<td><strong>Estado del empleado:</strong></td>
<td>$reg1[esta3]</td>
</tr>
<tr>
<td><strong>hora de entrada :</strong></td>
<td>$reg1[ini]</td>
</tr>
<tr>
<td><strong>hora de salida:</strong></td>
<td>$reg1[fin]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='empleados_inactivos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo</a><br><br>";
                    }else{
          echo "<br>El empleado esta activado o no existe";
         }
            }


      if($_REQUEST['opcion'] == 6){
         $cons1 = mysqli_query($con, "SELECT  art.ArtCod as codi,
                                                   art.ArtCant as cant,
                                                   art.ArtPre as precio,
                                                   art.ArtDes as descri,
                                                   art.Estado as estado,    
                                                   proveedores.ProNom as prono,
                                                   sublineaproducto.SlproDes as subli,
                                                   lineaproducto.LprDes as lineades
                                         from articulo as art
                                         inner join proveedores on
                                         art.ProNdo = proveedores.ProNdo
                                         inner join sublineaproducto on
                                         art.SLproId = sublineaproducto.SLproId
                                         inner join lineaproducto on
                                         sublineaproducto.LprID = lineaproducto.LprID
                                       where art.ArtCod='$_REQUEST[numero]'") or
                    die(mysqli_error($con));

                    if(($reg1 = mysqli_fetch_array($cons1))&&($reg1['estado']=="Activo")){
                      echo "<br>
<style>
               table {
             width: 40%;
             border-collapse: collapse;
             }
                </style>
<table border='2'>
<tbody>
<tr>
<td><strong>Codigo del articulo:</strong></td>
<td>$reg1[codi]</td>
</tr>
<tr>
<td><strong>Descripcion del articulo:</strong></td>
<td>$reg1[descri]</td>
</tr>
<tr>
<td><strong>precio unitario:</strong></td>
<td>$reg1[precio]</td>
</tr>
<tr>
<td><strong>Cantidad de articulos:</strong></td>
<td>$reg1[cant]</td>
</tr>
<tr>
<td><strong>Estado:</strong></td>
<td>$reg1[estado]</td>
</tr>
<tr>
<td><strong>Nombre del proveedor:</strong></td>
<td>$reg1[prono]</td>
</tr>
<tr>
<td><strong>tipo de Producto:</strong></td>
<td>$reg1[subli]</td>
</tr>
<tr>
<td><strong>tipo de uso:</strong></td>
<td>$reg1[lineades]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='articulos_activos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo</a><br><br>";
            }else{

        echo "<br>el articulo no esta activado o no existe";

             
              }

      }

      if($_REQUEST['opcion'] == 7){
        $cons1 = mysqli_query($con, "SELECT  art.ArtCod as codi,
                                                   art.ArtCant as cant,
                                                   art.ArtPre as precio,
                                                   art.ArtDes as descri,
                                                   art.Estado as estado,    
                                                   proveedores.ProNom as prono,
                                                   sublineaproducto.SlproDes as subli,
                                                   lineaproducto.LprDes as lineades
                                         from articulo as art
                                         inner join proveedores on
                                         art.ProNdo = proveedores.ProNdo
                                         inner join sublineaproducto on
                                         art.SLproId = sublineaproducto.SLproId
                                         inner join lineaproducto on
                                         sublineaproducto.LprID = lineaproducto.LprID
                                       where art.ArtCod='$_REQUEST[numero]'") or
                    die(mysqli_error($con));

      if(($reg1 = mysqli_fetch_array($cons1))&&($reg1['estado']=="Inactivo")){
echo "<br>
<style>
               table {
             width: 40%;
             border-collapse: collapse;
             }
                </style>
<table border='2'>
<tbody>
<tr>
<td><strong>Codigo del articulo:</strong></td>
<td>$reg1[codi]</td>
</tr>
<tr>
<td><strong>Descripcion del articulo:</strong></td>
<td>$reg1[descri]</td>
</tr>
<tr>
<td><strong>precio unitario:</strong></td>
<td>$reg1[precio]</td>
</tr>
<tr>
<td><strong>Cantidad de articulos:</strong></td>
<td>$reg1[cant]</td>
</tr>
<tr>
<td><strong>Estado:</strong></td>
<td>$reg1[estado]</td>
</tr>
<tr>
<td><strong>Nombre del proveedor:</strong></td>
<td>$reg1[prono]</td>
</tr>
<tr>
<td><strong>tipo de Producto:</strong></td>
<td>$reg1[subli]</td>
</tr>
<tr>
<td><strong>tipo de uso:</strong></td>
<td>$reg1[lineades]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='articulos_inactivos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo</a><br><br>";

      }else{
      echo "<br>El articulo esta activado o no existe";  
      }
      } 
      if($_REQUEST['opcion'] == 8){
         $cons1 = mysqli_query($con, "SELECT  cli.CliNdo as codi,
                                                   cli.CliNom as nombre,
                                                   cli.CliApe as apelli,
                                                   cli.CliGen as genero,
                                                   cli.CliFec as fecha, 
                                                   cli.CliDir as direc,
                                                   cli.CliEma as email,
                                                   cli.Estado as estado,
                                                   tipoidentidad.TidDes as identi,
                                                   rol.RolNom as rolnom,
                                                   barrio.BarNom as nombarrio,
                                                   ciudad.CiuNom as nomciuda
                                         from cliente as cli
                                         inner join tipoidentidad on
                                         cli.TideId = tipoidentidad.TideId
                                         inner join rol on
                                         cli.Rolid = rol.Rolid
                                         inner join barrio on
                                         cli.BarId = barrio.BarId
                                         inner join ciudad on
                                         cli.CiuCod = ciudad.Ciucod
                                       where cli.CliNdo ='$_REQUEST[numero]'") or
                    die(mysqli_error($con));
        if(($reg1 = mysqli_fetch_array($cons1))&&($reg1['estado']=="Activo")){
          echo "<br>
<style>
               table {
             width: 40%;
             border-collapse: collapse;
             }
                </style>
<table border='2'>
<tbody>
<tr>
<td><strong>Codigo del cliente:</strong></td>
<td>$reg1[codi]</td>
</tr>
<tr>
<td><strong>Nombre completo del cliente:</strong></td>
<td>$reg1[nombre] $reg1[apelli]</td>
</tr>
<tr>
<td><strong>Genero del cliente:</strong></td>
<td>$reg1[genero]</td>
</tr>
<tr>
<td><strong>fecha de antoguedad:</strong></td>
<td>$reg1[fecha]</td>
</tr>
<tr>
<td><strong>Direcion del cliente:</strong></td>
<td>$reg1[direc]</td>
</tr>
<tr>
<td><strong>Email del cliente:</strong></td>
<td>$reg1[email]</td>
</tr>
<tr>
<td><strong>tipo de identidad:</strong></td>
<td>$reg1[identi]</td>
</tr>
<tr>
<td><strong>Nombre del barrio:</strong></td>
<td>$reg1[nombarrio]</td>
</tr>
<tr>
<td><strong>Nombre de la ciudad:</strong></td>
<td>$reg1[nomciuda]</td>
</tr>
<tr>
<td><strong>Estado:</strong></td>
<td>$reg1[estado]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='clientes_activos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo</a><br><br>";

        }else{
           echo "<br>EL cliente no esta activado o no existe";
        }
      }
      if($_REQUEST['opcion'] == 9){
        $cons1 = mysqli_query($con, "SELECT  cli.CliNdo as codi,
                                                   cli.CliNom as nombre,
                                                   cli.CliApe as apelli,
                                                   cli.CliGen as genero,
                                                   cli.CliFec as fecha, 
                                                   cli.CliDir as direc,
                                                   cli.CliEma as email,
                                                   cli.Estado as estado,
                                                   tipoidentidad.TidDes as identi,
                                                   rol.RolNom as rolnom,
                                                   barrio.BarNom as nombarrio,
                                                   ciudad.CiuNom as nomciuda
                                         from cliente as cli
                                         inner join tipoidentidad on
                                         cli.TideId = tipoidentidad.TideId
                                         inner join rol on
                                         cli.Rolid = rol.Rolid
                                         inner join barrio on
                                         cli.BarId = barrio.BarId
                                         inner join ciudad on
                                         cli.CiuCod = ciudad.Ciucod
                                       where cli.CliNdo ='$_REQUEST[numero]'") or
                    die(mysqli_error($con));

                    if(($reg1 = mysqli_fetch_array($cons1))&&($reg1['estado']=="Inactivo")){
echo "<br>
<style>
               table {
             width: 40%;
             border-collapse: collapse;
             }
                </style>
<table border='2'>
<tbody>
<tr>
<td><strong>Codigo del cliente:</strong></td>
<td>$reg1[codi]</td>
</tr>
<tr>
<td><strong>Nombre completo del cliente:</strong></td>
<td>$reg1[nombre] $reg1[apelli]</td>
</tr>
<tr>
<td><strong>Genero del cliente:</strong></td>
<td>$reg1[genero]</td>
</tr>
<tr>
<td><strong>fecha de antoguedad:</strong></td>
<td>$reg1[fecha]</td>
</tr>
<tr>
<td><strong>Direcion del cliente:</strong></td>
<td>$reg1[direc]</td>
</tr>
<tr>
<td><strong>Email del cliente:</strong></td>
<td>$reg1[email]</td>
</tr>
<tr>
<td><strong>tipo de identidad:</strong></td>
<td>$reg1[identi]</td>
</tr>
<tr>
<td><strong>Nombre del barrio:</strong></td>
<td>$reg1[nombarrio]</td>
</tr>
<tr>
<td><strong>Nombre de la ciudad:</strong></td>
<td>$reg1[nomciuda]</td>
</tr>
<tr>
<td><strong>Estado:</strong></td>
<td>$reg1[estado]</td>
</tr>";

echo  "<a class='botones mostrar_color' href='clientes_inactivos.php?numero=".$_REQUEST['numero']."'>Imprimir reporte completo</a><br><br>";
          }else{
            echo "<br>El cliente esta activado o no existe";
          }


      }




        }else{
            echo "<br>La factura no existe";
        }
    
        ?>  
    </body>
    <footer>
        <?php
        ?>
    </footer>





                </div>
               
            </main>
        </div>
    </body>
</html>
