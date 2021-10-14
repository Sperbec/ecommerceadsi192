<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorLineaProducto
 *
 * @author user
 */
class GestorLineaProducto {
    //put your code here
    
    public function ingresarLineaProducto(LineaProducto $LineaProducto){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $LprDes=$LineaProducto->getLprDes();
        $sql="INSERT INTO lineaproducto VALUES (null,'".$LprDes."')";
        echo $sql;
        $Conexion->consulta($sql);
        $LineaProductoId=$Conexion->obtenerProductoId();
        $Conexion->cerrar();
        return $LineaProductoId;
    }
    
    public function  consultarLineaProductoPorId($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="SELECT * FROM lineaproducto WHERE LprID = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function mostrarLineaProducto(){
        $Conexion=new Conexion();
        $Conexion->abrir();
        $sql="SELECT * FROM lineaproducto";
        $Conexion->consulta($sql);
        $result=$Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function editarLineaProducto($LprID, $LprDes){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="UPDATE lineaproducto SET `LprDes` = '$LprDes' WHERE `lineaproducto`.`LprID` = $LprID";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
    }
    public function eliminarLineaProducto($id){
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql="DELETE FROM `lineaproducto` WHERE `lineaproducto`.`LprID` = $id";
        $Conexion->consulta($sql);
        $Conexion->cerrar();
    }
}
