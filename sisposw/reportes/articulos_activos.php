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
<td style='border:0;' colspan='7' bgcolor='white'> <strong> <CENTER> TPS-79  <br> NIT: 123456789 <br> DIRECION: calle 1a N°:25-10 <hr>REPORTE DE TODOS LOS ARTICULOS: ACTIVOS <hr> </CENTER> </strong> </td>
</tr>
</tbody>
</table>
";
       $registros = mysqli_query($con, "SELECT  art.ArtCod as codi,
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
                                         sublineaproducto.LprID = lineaproducto.LprID") or
                die(mysqli_error($con));
   
      while ($dato = mysqli_fetch_array($registros)) {
    if($dato['estado']=="Activo"){
      $codigoHTML.='<style>
table {
   border-collapse: collapse;
   }
   </style>
<tbody>
<table width="60%"> 
    <tr>
        <th><strong>codigo del articulo</strong></th>
        <th><strong>Descripcion del articulo</strong></th>
        <th><strong>Precio unitario</strong></th>
        <th><strong>Cantidad disponible</strong></th>
        <th><strong>Nombre del proveedor</strong></th>
        <th><strong>Linea de producto</strong></th>
        <th><strong>Tipo de uso</strong></th>
       <th><strong>Estado</strong></th>

      </tr>
      <tr>
        <td>'.$dato['codi'].'</td>
        <td>'.$dato['descri'].'</td>
        <td>'.$dato['precio'].'</td>
        <td>'.$dato['cant'].'</td>
        <td>'.$dato['prono'].'</td>
        <td>'.$dato['subli'].'</td>
        <td>'.$dato['lineades'].'</td>
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
$mpdf->output('Articulos_activos.pdf','i');
$Mpdf->SetMargins(1,1,1,1,'in');       
?>