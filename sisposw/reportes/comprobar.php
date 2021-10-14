<?php

session_start();
if (isset($_SESSION['sesion'])) {
	header("Location: facturacion_final.php");
}else{
    header("Location: ../index.php?inicio=si");
}


?>