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
<td style='border:0;' colspan='7' bgcolor='white'> <strong> <CENTER> TPS-79  <br> NIT: 123456789 <br> DIRECION: calle 1a N°:25-10 <hr>REPORTE DE TODOS LOS PROVEEDORES: ACTIVOS <hr> </CENTER> </strong> </td>
</tr>
</tbody>
</table>
";
       $registros = mysqli_query($con, "SELECT  pro.ProNit as nit, 
                                         pro.ProNdo as codi,  
                                         pro.ProNom as nom2, 
                                         pro.ProDir as dir2, 
                                         pro.ProEma as ema2, 
                                         pro.Estado as est2,
                                         pro.CiuCod as ciup
                                         from proveedores as pro") or
                die(mysqli_error($con));
   
      while ($dato = mysqli_fetch_array($registros)) {
    if($dato['est2']=="Activo"){
      $codigoHTML.='<style>
table {
   border-collapse: collapse;
   }
   </style>
<tbody>
<table width="70%"> 
    <tr>
        <th><strong>nit</strong></th>
        <th><strong>codigo</strong></th>
        <th><strong>nombre</strong></th>
        <th><strong>direcion</strong></th>
        <th><strong>email</strong></th>
        <th><strong>estado</strong></th>
        <th><strong>ciudad</strong></th>
      </tr>
      <tr>
        <td>'.$dato['nit'].'</td>
        <td>'.$dato['codi'].'</td>
        <td>'.$dato['nom2'].'</td>
        <td>'.$dato['dir2'].'</td>
        <td>'.$dato['ema2'].'</td>
        <td>'.$dato['est2'].'</td>
        <td>'.$dato['ciup'].'</td>
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
$mpdf->output('Proveedores_activos.pdf','i');
$Mpdf->SetMargins(1,1,1,1,'in');       
?>