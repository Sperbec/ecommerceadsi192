<html> <center>
<?php 

require_once ('mpdf/mpdf.php');
 $con=mysqli_connect("localhost","root","","sisposw") or 
      die("Problemas con la conexión a la base de datos".  mysqli_error());
$numero =$_REQUEST['numero'];
$cons1 = mysqli_query($con, "SELECT  fac.FacCod as codigo,
                                         fac.FacFec as fecha,
                                         fac.FacHor as hora,
                                         caja.CajDes as caja,
                                         fac.EmpNdo as empi,
                                         fac.Estado as estado,
                                         empleados.EmpNom as ID,
                                         cliente.CliNom as nom,
                                         cliente.CliApe as apell,
                                         telefonocliente.TelCliNum as clienum,
                                         cliente.Estado as esta,
                                         cliente.CliGen as gene,
                                         cliente.CliDir as dire,
                                         cliente.CliEma as email,
                                         cliente.CliNdo as docu,
                                         cliente.CliFec as fech,
                                         detalleventa.DveCod as coddve,
                                         detalleventa.DveCan as canti,
                                         detalleventa.DveIva as iva,
                                         detalleventa.DveTot as total                     
                                         from factura as fac
                                         inner join detalleventa ON
                                         FacCod=detalleventa.DveId
                                         inner JOIN cliente ON
                                         FacCod=cliente.Tideid
                                         inner join telefonocliente on
                                         cliente.CliNdo = telefonocliente.CliNdo
                                         inner join caja on
                                         fac.CajCod = caja.CajCod
                                         inner join empleados on
                                         fac.EmpNdo = empleados.EmpNdo
                                       where fac.FacCod='$numero'") or
                    die(mysqli_error($con));

            if (($reg1 = mysqli_fetch_array($cons1))) {

                $codigoHTML= "<head>  <style>
table {
   width: 80%;
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
   color: #fff;
   background: #000;
}
table th {background-color: yellow; }

table tr:nth-child(odd) {background-color: white;}

table tr:nth-child(even) {background-color: #d8d8d8;}
</style> </head><br><table border='1'>
<tbody>
<tr>
<td style='border:0;' colspan='2'> <CENTER> <img src='logo.png' </CENTER>  width='100px' height='100px'></td>
</tr>
<tr>
<td style='border:0;' colspan='2' bgcolor='white'> <strong> <CENTER> TPS-79  <br> NIT: 123456789 <br> DIRECION: calle 1a N°:25-10 <hr> FACTURA NUMERO: $reg1[codigo]<hr> </CENTER> </strong> </td>
</tr>
<tr>
<td style='border:0;'><strong>Número de factura: </strong> $reg1[codigo] </td>
<td style='border:0;'><strong>Fecha emisión:: </strong> $reg1[fecha] </td>
</tr>
<tr>
<td style='border:0;'><strong>Caja: </strong> $reg1[caja]</td>
<td style='border:0;'><strong>Hora de Facturacion: </strong> $reg1[hora]</td>
</tr>
<tr>
<td style='border:0;'><strong>Documento del Empleado: </strong> $reg1[empi]</td>
<hr>
<td style='border:0;'><strong>Nombre del empleado:</strong> $reg1[ID] </td>
<hr>
</tr>
<tr>
<td style='border:0;' colspan='2' bgcolor='white' > <CENTER> <strong>DATOS DEL CLIENTE: </strong> </CENTER></td>
</tr>
<tr>
<td style='border:0;' colspan='2'> <CENTER> <strong> </strong> </CENTER></td>
</tr>
<tr>
<td style='border:0;'><strong> Nombre del Cliente:</strong> $reg1[nom] </td>
<td style='border:0;'><strong> Documento del Cliente:</strong> $reg1[docu]</td></tr>"
                        . "<tr>
<td style='border:0;'><strong>Direcion:</strong> $reg1[dire]</td>
<td style='border:0;'><strong>Telefono del cliente:</strong> $reg1[clienum]</td></tr>"
                        . "<tr>
<td style='border:0;'><strong>Correo del cliente:</strong> $reg1[email]</td>
<td style='border:0;'><strong>Apellido del cliente:</strong> hernandez</td></tr>"
                        . "<tr>
<td style='border:0;'><strong>Genero del cliente:</strong> $reg1[gene] <hr></td>
<td style='border:0;'><strong>estado del cliente:</strong> $reg1[esta] <hr></td></tr>";
                $cons2 = mysqli_query($con, "SELECT art.ArtCod as codigoA,
                                         art.ArtCant as cantidad,
                                         art.ArtPre as precio,
                                         art.ArtDes as descri
                                         FROM articulo as art
                                         WHERE art.ArtCod = '$reg1[codigo]'") or
                        die(mysqli_error($con));
         if (($reg2 = mysqli_fetch_array($cons2))) {
                $codigoHTML1= "<tr>
                    <td style='border:0;'><strong><h4>codigo de articulo:</h4></strong></td>
                    <td style='border:0;'><strong><h4>$reg2[codigoA]</h4></strong></td>
                    </tr>
                    <tr>
                    <td style='border:0;'><strong><h4>cantidad de articulos:</h4></strong></td>
                    <td style='border:0;'><strong><h4>$reg2[cantidad]</h4></strong></td>
                    </tr>
                    <tr>
                    <td style='border:0;'><strong><h4>Descripcion del producto:</h4></strong></td>
                    <td style='border:0;'><strong><h4>$$reg2[descri]</h4></strong></td>
                    </tr>
                    <tr>
                    <td style='border:0;'><strong><h4>precio del producto: </h4></strong></td>
                    <td style='border:0;'><strong><h4>$reg2[precio]</h4></strong></td>
                    </tr>
                    <tr>
                    <td style='border:0;'><strong><h4>IVA:</h4></strong></td>
                    <td style='border:0;'><strong><h4>$$reg1[iva]</h4></strong></td>
                    </tr>
                    <tr>
                    <td style='border:0;'><strong><h4>total:</h4></strong></td>
                    <td style='border:0;'><strong><h4>$$reg1[total]</h4></strong></td>
                    </tr>
                    <tr>
                    <td style='border:0;'><strong>SELLO O FIRMA: <br><br><br> <br> <hr> </strong></td>
                   
                    <td style='border:0;'></td>
                     </tr>

</tbody>
</table>";
}
}
$codigoHTML=($codigoHTML.$codigoHTML1);
$mpdf=new mpdf('c','A4');
$mpdf->writehtml($codigoHTML);
$mpdf->output('Factura.pdf','i');
$Mpdf->SetMargins(1,1,1,1,'in');              // márgenes de 1 pulgada por los cuatro lados



//echo $codigoHTML.$codigoHTML2.$codigoHTML1;
?>
</html>