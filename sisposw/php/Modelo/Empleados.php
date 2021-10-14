<?php


require 'Conexion.php';

class Empleados extends Conexion {
   
    
    protected  $conexion = null;
    
    protected $nomnbre = null;
    
    protected  $documento = null;
    
    protected $sexo = null;
    
    protected  $edad = null;
    
    protected $mensaje = null;


    public function __construct() {
        
        $this->conexion = Conexion::__construct("localhost","root", "", "sisposw");
        
    }
    
    
    public function ingresar_Empleado($empleado){
        
        try {
            $this->nomnbre = $empleado[0];
            $this->documento = $empleado[1];
            $this->clave = $empleado[2];
            
            // comprobar si el usuario ya existe, esto lo hacemos con una consulta
            
            $traer = mysqli_query($this->conexion, "SELECT Documento FROM registro WHERE Documento = '$this->documento'");
            $n_traer = mysqli_num_rows($traer);
            
            if ($n_traer > 0) {
                throw new Exception("Ya existe un empleado con este documento.");
            }else{
                $result = mysqli_query($this->conexion, "INSERT INTO registro (Id, Documento, Clave, Nombre, Estado, Tipo) VALUES(DEFAULT, '$this->documento', '$this->clave', '$this->nomnbre', 'Activo','2')");
        
            if ($result == false) {
              throw new Exception("Problemas al ingresar el empleado");
            } else{
                
                $this->mensaje = "El empleado ". $this->nomnbre." se ingresó correctamente";
                return "<div class='mensaje'><img src='../src/bien.png' width='35px'>".$this->mensaje."</div>";
                
            }
            }
        
            
            
            
        } catch (Exception $ex) {
            
            $this->mensaje = "Error: ".$ex->getMessage();
            
            return "<div class='mensaje'><img src='../src/error.png' width='35px'>".$this->mensaje."</div>";
        }
        
    }
    
    public function consultar_empleado(){
        
        try {
            $dato = null;
        
        $result = mysqli_query($this->conexion, "SELECT * FROM registro WHERE Tipo = '2'");
        $n = mysqli_num_rows($result);
        
        if ($n > 0) {
            while ($fila = mysqli_fetch_assoc($result)){
            
            $dato[] = $fila;
            
            }
        }else{
            throw new Exception("<tr><td colspan='6'><h3>No existen empleados en la base de datos</h3></td></tr>");
        }
        
        
        return $dato;
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
            return $this->mensaje;
        }
    }
    
    
    
    
    public function editar_empleado($id,$empleado){
        
        try {
            
            $nom = $empleado[0];
            $doc = $empleado[1];
            
            $result = mysqli_query($this->conexion, "UPDATE registro SET  Documento = '$doc', Nombre = '$nom' WHERE Id= '$id'");
            
            if ($result) {
                $msg = true;
                return $msg;
            }
            
            
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
            
            return $this->mensaje;
        }
        
    }


     public function eliminar($id){
        
        try {
            
            $result = mysqli_query($this->conexion, "DELETE FROM registro WHERE Id= '$id'");
            
            if ($result) {
                $msg = true;
                return $msg;
            }
            
            
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
            
            return $this->mensaje;
        }
        
    }
    
    public function datos_empleado($sql){
        
        try {
            
            $dato = null;
            
            $result = mysqli_query($this->conexion, $sql);
            
             $fila = mysqli_fetch_assoc($result);
            
            return $fila;
            
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
            
            return $this->mensaje;
        }
        
    }
    
}
