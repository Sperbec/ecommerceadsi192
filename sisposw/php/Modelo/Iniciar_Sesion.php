<?php


require("Conexion.php");
class Iniciar_Sesion extends Conexion{
    
    
    protected $Conectar;
  
    public function __construct(){
        
        $this->Conectar = Parent::__construct("localhost", "root", "", "sisposw");
        
  
    }
   
   public function get_iniciar($user, $clave){
       
       try {
         
           $result = mysqli_query($this->Conectar,"SELECT * FROM registro WHERE Documento = '$user' AND Clave = '$clave'");
           
           $fila = mysqli_fetch_assoc($result);
           $num = mysqli_num_rows($result);
           
           if ($num > 0){
               
               session_start();
               $_SESSION['sesion'] = $fila['Id'];
               
               header("Location: ../../Gestion/");
               
           }else{
               return true;
           }
             
       } catch (Exception $ex) {
           
           $this->mensaje = "Error ".$ex->getMessage();
       }
       
       return $this->mensaje;
       
   }
   
   
   public function registrar_cliente($user, $name){
       
       try {
         
           $result = mysqli_query($this->Conectar,"SELECT * FROM registro WHERE Documento = '$user'");
           
           $num = mysqli_num_rows($result);
           
           if ($num > 0){
               
               $this->mensaje = "<div class='mensaje'><img src='src/error.png' width='35px'>El documento ya existe</div>";
               
               
           }else{
               
               $this->mensaje = "Hola todos insertado!";
               
               $clave = substr($user,0,5);
               
               $result = mysqli_query($this->Conectar,"INSERT INTO registro (Id, Documento, Clave, Nombre, Estado, Tipo) VALUES(DEFAULT, '$user', '$clave', '$name', 'Activo', '3')");
               
               $result2 = mysqli_query($this->Conectar,"SELECT Id FROM registro WHERE Documento = '$user' ORDER BY Id DESC LIMIT 1");
           
               $fila = mysqli_fetch_assoc($result2);
               
               session_start();
               $_SESSION['sesion'] = $fila['Id'];
               
               header("Location: Gestion/");
           }
             
       } catch (Exception $ex) {
           
           $this->mensaje = "Error ".$ex->getMessage();
       }
       
       return $this->mensaje;
       
   }
   
    
}
