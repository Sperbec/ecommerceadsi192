<?php



class Conexion {
   
    
    protected $host;

        protected  $base;

        protected  $usuario;

        protected $clave;

        protected  $conexion;

        protected $mensaje;


        public function __construct($host, $usuario, $clave, $based){

            try {


                $this->host = $host;

                $this->usuario = $usuario;

                $this->clave = $clave;

                $this->base = $based;

                $this->conexion = mysqli_connect($this->host, $this->usuario, $this->clave, $this->base);

                if (mysqli_connect_errno($this->conexion)) {

                    $this->mensaje = "Error en la conexión" . " " . mysqli_connect_error($this->conexion);

                    throw new Exception($this->mensaje);

                } else {

                    mysqli_set_charset($this->conexion, "utf-8");

                    date_default_timezone_set('America/Bogota');
                    
                    return $this->conexion;

                }

            }catch (Exception $e){

                echo $e->getMessage();
            }


        }
        
        

    
}
