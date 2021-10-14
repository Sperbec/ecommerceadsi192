<?php 
session_start();
try{

	$pdo= new PDO("mysql:host=localhost; dbname=sisposw", "root","");

} catch(PDOException $e){
	exit('Error en la conexión a la base de datos');
}
 ?>

