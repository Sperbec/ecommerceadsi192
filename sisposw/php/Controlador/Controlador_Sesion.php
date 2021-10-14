<?php



   require("../Modelo/Iniciar_Sesion.php");
   
   $objeto = new Iniciar_Sesion();
                    
   $d = $objeto->get_iniciar($_POST['documento'],$_POST['pass']);
   
   
           if($d){
               header("Location: ../Modelo/destruir.php");
           }         
                    
?>