<?php 
require_once ('mpdf/mpdf.php');
 $con=mysqli_connect("localhost","root","","sisposw") or 
      die("Problemas con la conexión a la base de datos".  mysqli_error());


$codigoHTML="
<head>  <style>
table {
   margin_auto;
   border-collapse: collapse;
   }
th, td {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
}
th {
   background: #eee;
}
</style> </head>
<br><table border='1'>
<tbody>
<tr>
<td style='border:0;' colspan='7'> <CENTER> <img src='logo.png' </CENTER>  width='100px' height='100px'></td>
</tr>
<tr>
<td style='border:0;' colspan='7' bgcolor='white'> <strong> <CENTER> TPS-79  <br> NIT: 123456789 <br> DIRECION: calle 1a N°:25-10 <hr>REPORTE DE TODOS LOS CLIENTES: INACTIVOS <hr> </CENTER> </strong> </td>
</tr>
</tbody>
</table>
";
       $registros = mysqli_query($con, "SELECT  cli.CliNdo as codi,
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
                                         cli.CiuCod = ciudad.Ciucod") or
                die(mysqli_error($con));
   
      while ($dato = mysqli_fetch_array($registros)) {
    if($dato['estado']=="Inactivo"){
      $codigoHTML.='<style>
table {
   border-collapse: collapse;
   }
   </style>
<tbody>
<table width="60%"> 
    <tr>
        <th><strong>Numero de documento</strong></th>
        <th><strong>Nombre y apellido</strong></th>
        <th><strong>Genero del cliente</strong></th>
        <th><strong>Fecha de antiguedad</strong></th>
        <th><strong>DIRECION</strong></th>
        <th><strong>Email</strong></th>
        <th><strong>Tipo de indentidad</strong></th>
        <th><strong>Barrio-Ciudad</strong></th>
        <th><strong>Estado</strong></th>
      </tr>
      <tr>
        <td>'.$dato['codi'].'</td>
        <td>'.$dato['nombre'].$dato['apelli'].'</td>
        <td>'.$dato['genero'].'</td>
        <td>'.$dato['fecha'].'</td>
        <td>'.$dato['direc'].'</td>
        <td>'.$dato['email'].'</td>
        <td>'.$dato['identi'].'</td>
        <td>'.$dato['nombarrio'].$dato['nomciuda'].'</td>
        <td>'.$dato['estado'].'</td>

      </tr>
      </tbody>
      </table>
      <hr color="black" size=3>';
    }

      }            
        
//el cliclo WHILE esta encerrando una tabla diferente de
//la tabla donde se esta impriendo el logo y en general la cabecera
//echo $codigoHTML;

$codigoHTML=($codigoHTML);
$mpdf=new mpdf('c','A4');
$mpdf->writehtml($codigoHTML);
$mpdf->output('Artciculos_inactivos.pdf','i');
$Mpdf->SetMargins(1,1,1,1,'in');       
?>