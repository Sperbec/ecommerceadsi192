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
<td style='border:0;' colspan='7' bgcolor='white'> <strong> <CENTER> TPS-79  <br> NIT: 123456789 <br> DIRECION: calle 1a N°:25-10 <hr>REPORTE DE TODOS LOS EMPLEADOS: INACTIVOS <hr> </CENTER> </strong> </td>
</tr>
</tbody>
</table>
";
       $registros = mysqli_query($con, "SELECT  emp.EmpNdo as docu3,
                                                       emp.EmpNom as nom3,
                                                       emp.Rolid as rol3,
                                                       emp.EmpGen as gene3,
                                                       emp.Tideid as iden3,
                                                       emp.EmpDir as dire3,
                                                       emp.Estado as esta3,
                                                       horariolaboral.Hlaini as ini,
                                                       horariolaboral.HlaFin as fin,
                                                       rol.RolNom as nomrol,
                                                       car.CarNom as car3
                                         from empleados as emp
                                         inner join horariolaboral on
                                         horariolaboral.Hlaid = emp.Hlaid
                                         inner join rol as rol on
                                         rol.Rolid = emp.Rolid
                                         inner join cargos as car on
                                         emp.Hlaid = car.Carid") or
                die(mysqli_error($con));
   
      while ($dato = mysqli_fetch_array($registros)) {
    if($dato['esta3']=="Inactivo"){
      $codigoHTML.='<style>
table {
   border-collapse: collapse;
   }
   </style>
<tbody>
<table width="60%"> 
    <tr>
        <th><strong>Numero de documento</strong></th>
        <th><strong>Nombre</strong></th>
        <th><strong>Rol</strong></th>
        <th><strong>Cargo</strong></th>
        <th><strong>Direcion</strong></th>
        <th><strong>Hora de inicio</strong></th>
        <th><strong>Hora de fin</strong></th>
       <th><strong>Estado</strong></th>

      </tr>
      <tr>
        <td>'.$dato['docu3'].'</td>
        <td>'.$dato['nom3'].'</td>
        <td>'.$dato['nomrol'].'</td>
        <td>'.$dato['car3'].'</td>
        <td>'.$dato['dire3'].'</td>
        <td>'.$dato['ini'].'</td>
        <td>'.$dato['fin'].'</td>
        <td>'.$dato['esta3'].'</td>
   
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
$mpdf->output('Empleados_inactivos.pdf','i');
$Mpdf->SetMargins(1,1,1,1,'in');       
?>