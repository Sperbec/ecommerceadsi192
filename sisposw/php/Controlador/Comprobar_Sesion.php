<?php


require '../php/Modelo/Conexion.php';
class Comprobar_Sesion extends Conexion {
    
    
    protected $sesion = null;
    
    protected  $conexion = null;


    public function __construct() {
        
        $this->conexion = Conexion::__construct("localhost", "root", "", "sisposw");
        
    }
    
    public function get_sesion($sesion){
        
        $this->sesion = $sesion;
        
        $r = mysqli_query($this->conexion, "SELECT Tipo FROM registro WHERE id = '$this->sesion'");
        
        $fila = mysqli_fetch_assoc($r);
        
        $modo = $fila['Tipo'];
        
        if ($modo == "1") {
            
           require '../php/Vista/Gestion/Gestion_vista_admin.php';
              
        }elseif($modo == "2"){
            
            require '../php/Vista/Gestion/Gestion_vista_empleado.php';
            
        }
        else{
            
            require '../php/Vista/Gestion/Gestion_vista_cliente.php';
            
        }
    }

    
}
