<?php 
require_once ('mpdf/mpdf.php');
session_start();

$session = $_SESSION['sesion'];



 $con=mysqli_connect("localhost","root","","sisposw") or 
      die("Problemas con la conexión a la base de datos".  mysqli_error());
        $total1 = 0;
        $iva = 0;
        $final = 0;

        $consulta = "SELECT * FROM registro WHERE Id = '$session'";
$r = mysqli_query($con, $consulta);
$filita = mysqli_fetch_assoc($r);

$nombre_sesion = $filita['Nombre'];


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
<td style='border:0;' colspan='7' bgcolor='white'> <strong> <CENTER> TPS-79  <br> NIT: 123456789 <br> DIRECION: calle 1a N°:25-10 <hr>Factura de compra <hr> </CENTER> </strong> </td>
</tr>
</tbody>
</table>
";

$codigoHTML.="
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
<td style='border:0;' colspan='7'> <CENTER> NOMBRE DEL CLIENTE: </CENTER></td>
<td style='border:0;' colspan='7'> <CENTER>".$nombre_sesion."</CENTER></td>
</tr>
</tbody>
</table>
";



       $registros = mysqli_query($con, "SELECT  car.carrito_id as idprodu,
                                                   car.sesion_id as sesion,
                                                   car.producto_id as productoid,
                                                   car.cantidad as cantidad,
                                                   articulo.ArtPre as precio,
                                                   articulo.ArtDes as descripcion

                                         from carrito as car
                                         inner join articulo on
                                         car.producto_id = articulo.ArtCod") or
                die(mysqli_error($con));



$codigoHTML.='<style>
table {
   border-collapse: collapse;
   }
   </style>
<tbody>
<table width="80%"> 
    <tr>
        <th><strong>ID DEL PRODUCTO</strong></th>
        <th><strong>CODIGO DEL PRODUCTO</strong></th>
        <th><strong>CANTIDAD</strong></th>
        <th><strong>PRECIO</strong></th>
        <th><strong>SUBTOTAL</strong></th>
        <th><strong>IVA</strong></th>     
        <th><strong>DESCRIPCION</strong></th>
      </tr>
      </tbody>
      </table>';
      while ($dato = mysqli_fetch_array($registros)) {
        $total1 = $total1 + $dato['precio'] * $dato['cantidad'] ;
        $iva = $total1 * 0.19;
        $final = $iva + $total1;

        $codigoHTML.='<style>
table {
   border-collapse: collapse;
   }
   </style>
<tbody>
<table width="80%"> <tr>
        <td>'.$dato['idprodu'].'</td>
        <td>'.$dato['productoid'].'</td>
        <td>'.$dato['cantidad'].'</td>
        <td>'.$dato['precio'].'</td>
        <td>'.$total1.'</td>
        <td>'.$iva.'</td>
        <td>'.$dato['descripcion'].'</td>
      </tr>
      
      </tbody>
      </table>
     ';

      }
       $codigoHTML.='<style>
table {
   border-collapse: collapse;
   }
   </style>
<tbody>
<table width="80%"> 
    <tr>
        <td><strong>total de la compra:</strong></td>
       <td>'.$final.'</td>
      </tr>
      </tbody>
      </table>';
                    
        
//el cliclo WHILE esta encerrando una tabla diferente de
//la tabla donde se esta impriendo el logo y en general la cabecera
//echo $codigoHTML;

$codigoHTML=($codigoHTML);
$mpdf=new mpdf('c','A4');
$mpdf->writehtml($codigoHTML);
$mpdf->output('Artciculos_inactivos.pdf','i');
$Mpdf->SetMargins(1,1,1,1,'in');       
?>