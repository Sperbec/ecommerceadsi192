<?php

class GestorProducto {

    public function ingresarProducto(Producto $Producto) {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $ArtCant = $Producto->getArtCant();
        $ArtPre = $Producto->getArtPre();
        $ArtDes = $Producto->getArtDes();
        $ProNdo = $Producto->getProNdo();
        $SLproId = $Producto->getSLproId();
        $imagen = $Producto->getimgname();
        $ruta = $Producto->getimgruta();
        
        $destino = "img/".$imagen;
        
        move_uploaded_file($ruta, $destino);
        $sql = "INSERT INTO `articulo` (`ArtCod`, `ArtCant`, `ArtPre`, `ArtDes`, `ProNdo`, `SLproId`, `Estado`,`archivo`) "
                . "VALUES (NULL, '$ArtCant', '$ArtPre', '$ArtDes', '$ProNdo', '$SLproId', 'Activo','$imagen')";
        $Conexion->consulta($sql);
        $ProductoId = $Conexion->obtenerProductoId();
        $Conexion->cerrar();
        return $ProductoId;
    }
     public function  consultarProductoPorId($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="SELECT * FROM `articulo` WHERE ArtCod = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function editarProducto($ArtCod,$ArtCant,$ArtPre,$ArtDes,$ProNdo,$SLproId){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE `articulo` SET `ArtCant` = '$ArtCant', `ArtPre` = '$ArtPre', `ArtDes` = '$ArtDes',`ProNdo` = '$ProNdo', `SLproId` = '$SLproId'  WHERE `articulo`.`ArtCod` = $ArtCod";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
    }
    public function  eliminarProducto($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE `articulo` SET `Estado` = 'Inactivo' WHERE `articulo`.`ArtCod` = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function  activarProducto($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE `articulo` SET `Estado` = 'Activo' WHERE `articulo`.`ArtCod` = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }

}
