<?php

class GestorTelefonoProveedor {

    public function ingresarTelefonoProveedor(TelefonoProveedor $TelefonoProveedor) {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $ProNdo = $TelefonoProveedor->getProId();
        $TelProNum = $TelefonoProveedor->getTelProNum();
        $sql = "INSERT INTO `telefonoproveedor` (`TelProNum`, `ProNdo`) VALUES ('$TelProNum','$ProNdo')";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
        return $ProNdo;
    }

    public function consultarProveedorPorNdo($Ndo) {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql = "SELECT * FROM `telefonoproveedor` WHERE ProNdo = '".$Ndo."'";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function eliminarTelefono($TelProNum) {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql = "DELETE FROM `telefonoproveedor` WHERE `telefonoproveedor`.`TelProNum` = '$TelProNum'";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    

}
