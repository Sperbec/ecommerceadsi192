<?php


class GestorSubLineaProducto {
   
    public function ingresarSubLineaProducto(SubLineaProducto $SubLineaProducto){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $SlproDes=$SubLineaProducto->getSlproDes();
        $LprID=$SubLineaProducto->getLprID();
        $sql="INSERT INTO `sublineaproducto` (`SLproId`, `SlproDes`, `LprID`) VALUES (NULL, '$SlproDes', '$LprID');";
        $Conexion->consulta($sql);
        $SubLineaProductoId=$Conexion->obtenerProductoId();
        $Conexion->cerrar();
        return $SubLineaProductoId;
    }
    
    
    public function  consultarSubLineaProductoPorId($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="SELECT * FROM `sublineaproducto` WHERE SLproId = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    
     public function mostrarSubLineaProducto(){
        $Conexion=new Conexion();
        $Conexion->abrir();
        $sql="SELECT * FROM sublineaproducto";
        $Conexion->consulta($sql);
        $result=$Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
     public function editarSubLineaProducto($SLproId,$SlproDes,$LprID){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE `sublineaproducto` SET `SlproDes` = '$SlproDes', `LprID` = '$LprID' WHERE `sublineaproducto`.`SLproId` = $SLproId";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
    }
    public function eliminarSubLineaProducto($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="DELETE FROM `sublineaproducto` WHERE `sublineaproducto`.`SLproId` = $id";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
    }
    
}
