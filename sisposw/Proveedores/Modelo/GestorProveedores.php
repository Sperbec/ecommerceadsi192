<?php

class GestorProveedores {

    public function ingresarProveedores(Proveedores $Proveedores) {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $ProNdo = $Proveedores->getProNdo();
        $ProNit = $Proveedores->getProNit();
        $ProNom = $Proveedores->getProNom();
        $CiuCod = $Proveedores->getCiuCod();
        $ProDir = $Proveedores->getProDir();
        $ProEma = $Proveedores->getProEma();
        $sql = "INSERT INTO `proveedores` (`ProNdo`, `ProNit`, `ProNom`, `CiuCod`, `ProDir`, `ProEma`, `Estado`) "
                . "VALUES ('$ProNdo', '$ProNit', '$ProNom', '$CiuCod', '$ProDir', '$ProEma', 'Activo')";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
        return $ProNdo;
    }
     public function  consultarProveedorPorNdo($Ndo){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="SELECT * FROM proveedores WHERE ProNdo = $Ndo";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    
    public function editarProveedor($ProNdo,$ProNom,$CiuCod,$ProDir,$ProEma){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE `proveedores` SET `ProNom` = '$ProNom', `CiuCod` = '$CiuCod', `ProDir` = '$ProDir', `ProEma` = '$ProEma' WHERE `proveedores`.`ProNdo` = '$ProNdo';";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
    }
    public function  eliminarProveedor($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE `proveedores` SET `Estado` = 'Inactivo' WHERE `proveedores`.`ProNdo` = '$id'";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        
    }
    public function  activarProveedor($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE `proveedores` SET `Estado` = 'Activo' WHERE `proveedores`.`ProNdo` = '$id'";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    

}
